<?php defined('BASEPATH') OR exit('NO REDIRECT SCRIPT ALLOWED');

/**
* 
*/
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','date'));
		$this->load->library('encryption');

	}
	function update_berita(){
		$data=$this->input->post(array('id_berita','judul','kategori','isi','thumbnail','waktu_berakhir'),TRUE);
		$where=array(
			'id_berita'=>$data['id_berita']
		);
		$date=date_create($data['waktu_berakhir']);
			$waktu_berakhir=date_format($date,"Y-m-d");
		$berita=array(
			'judul'=>$data['judul'],
			'isi'=>$data['isi'],
			'kategori'=>$data['kategori'],
			'thumbnail'=>$data['thumbnail'],
			'waktu_berakhir'=>$waktu_berakhir
		);
		$this->Model->update_data($where,$berita,'berita');
		REDIRECT('dashboard/berita');
	}
	function upload(){
		$config['upload_path']='./upload/berita/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 0;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file')) {
			$this->output->set_header('HTTP/1.0 500 Server Error');
			exit;
		} else {
			$file = $this->upload->data();
			$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode(['location' => base_url().'upload/berita/'.$file['file_name']]))
			->_display();
			exit;
		}
	}
	function tambah_berita(){
		$sesi=$this->session->userdata();
		$items=$this->input->post(array('judul','kategori','thumbnail','isi','waktu_berakhir'),true);
			$waktu=date("Y-m-d H:i:s");
			$waktu_berakhir=$items['waktu_berakhir'];
			$date=date_create($waktu_berakhir);
			$waktu_berakhir=date_format($date,"Y-m-d");
			$item=array(
				'id_berita' => '',
				'judul' => $items['judul'],
				'waktu' => $waktu,
				'kategori' => $items['kategori'],
				'isi' => $items['isi'],
				'waktu_berakhir'=>$waktu_berakhir,
				'thumbnail' => $items['thumbnail'],
				'author' => $sesi['user']
			);
			$this->Model->insert_data('berita',$item);
			REDIRECT('dashboard/berita');
	}
	function alumni(){
		$this->session->set_flashdata('berita','');
		$this->session->set_flashdata('galeri','');
		$this->session->set_flashdata('berita_alumni','');
		$this->session->set_flashdata('informasi','');
		$this->session->set_flashdata('daftar_berita','');
		$this->session->set_flashdata('alumni','active');
		$this->session->set_flashdata('daftar_alumni','active');
		$status=$this->session->userdata('status');
		if($status=='admin')
				$data_table=$this->Model->getDataAlumni("","","","","");
		else
			$data_table=$this->Model->getTemanSatuJurusan();
		$this->load->view('dashboard_v2/header')
		->view('dashboard_v2/navbar')
		->view('dashboard_v2/sidebar')
		->view('dashboard_v2/daftar_alumni',array('data_table'=>$data_table->result_array()))
		->view('dashboard_v2/footer');		
	}
	function berita_alumni(){
		$this->session->set_flashdata('galeri','');
		$this->session->set_flashdata('berita_alumni','active');
		$this->session->set_flashdata('informasi','');
		$this->session->set_flashdata('alumni','');
		$this->session->set_flashdata('daftar_alumni','');
		$this->session->set_flashdata('tambah_berita','');	
		$this->session->set_flashdata('berita','active');
		$this->session->set_flashdata('daftar_berita','');
			$data_table=$this->Model->getBerita();
		$this->load->view('dashboard_v2/header')
		->view('dashboard_v2/navbar')
		->view('dashboard_v2/sidebar')
		->view('dashboard_v2/berita_alumni',array('data_table'=>$data_table))
		->view('dashboard_v2/footer');		
	}
	function berita(){
		$this->session->set_flashdata('galeri','');
		$this->session->set_flashdata('berita_alumni','');
		$this->session->set_flashdata('informasi','');
		$this->session->set_flashdata('alumni','');
		$this->session->set_flashdata('daftar_alumni','');
		$this->session->set_flashdata('tambah_berita','');	
		$this->session->set_flashdata('berita','active');
		$this->session->set_flashdata('daftar_berita','active');
		$user=$this->session->userdata('user');
		$data_table=$this->Model->getData('berita','author',$user);
		$this->load->view('dashboard_v2/header')
		->view('dashboard_v2/navbar')
		->view('dashboard_v2/sidebar')
		->view('dashboard_v2/daftar_berita',array('data_table'=>$data_table))
		->view('dashboard_v2/footer');		
	}
	function index(){
				$this->session->set_flashdata('galeri','');
		$this->session->set_flashdata('berita_alumni','');
		$this->session->set_flashdata('informasi','');
		$this->session->set_flashdata('berita','');
		$this->session->set_flashdata('daftar_berita','');
		$this->session->set_flashdata('alumni','');
		$this->session->set_flashdata('daftar_alumni','');
		$this->session->set_flashdata('berita','');
		$this->session->set_flashdata('tambah_berita','');		
		$data['total_komentar']=$this->Model->get_jumlah_komentar();
		$data['jumlah_berita_lowongan']=$this->Model->get_jumlah_berita('Lowongan Pekerjaan');			
		$data['jumlah_berita_alumni']=$this->Model->get_jumlah_berita('Berita Alumni');
		$this->load->view('dashboard_v2/header')
		->view('dashboard_v2/navbar')
		->view('dashboard_v2/sidebar',$data)
		->view('dashboard_v2/content')
		->view('dashboard_v2/footer');	
	}
	function posting(){	
				$this->session->set_flashdata('galeri','');
		$this->session->set_flashdata('berita_alumni','');
		$this->session->set_flashdata('informasi','');
		$this->session->set_flashdata('berita','');
		$this->session->set_flashdata('daftar_berita','');
				$this->session->set_flashdata('alumni','');
		$this->session->set_flashdata('daftar_alumni','');
		$this->session->set_flashdata('berita','active');
		$this->session->set_flashdata('tambah_berita','active');	
		$this->load->view('dashboard_v2/header')
		->view('dashboard_v2/navbar')
		->view('dashboard_v2/sidebar')
		->view('dashboard_v2/tambah_berita')
		->view('dashboard_v2/footer');
	}
	function delete(){
		$id=$this->input->post('id_berita');
		$data['id_berita']=$id;
		$this->Model->delete($data,'berita');
		$status['status']='success';
		echo json_encode($status);
	}
	function update($id=0){
		$this->session->set_flashdata('galeri','');
		$this->session->set_flashdata('berita_alumni','');
		$this->session->set_flashdata('informasi','');
		$this->session->set_flashdata('berita','');
		$this->session->set_flashdata('daftar_berita','');
		$this->session->set_flashdata('alumni','');
		$this->session->set_flashdata('daftar_alumni','');
		$this->session->set_flashdata('berita','active');
		$id_berita=$this->input->get('id');
		$data_table=$this->Model->getData('berita','id_berita',$id_berita);
		$this->load->view('dashboard_v2/header')
		->view('dashboard_v2/navbar')
		->view('dashboard_v2/sidebar')
		->view('dashboard_v2/update',array('error'=>' ','berita'=>$data_table))
		->view('dashboard_v2/footer');		
	}
	function profil(){
		$this->session->set_flashdata('galeri','');
		$this->session->set_flashdata('berita_alumni','');
		$this->session->set_flashdata('informasi','');
		$this->session->set_flashdata('berita','');
		$this->session->set_flashdata('daftar_berita','');
		$this->session->set_flashdata('alumni','');
		$this->session->set_flashdata('daftar_alumni','');
		$this->session->set_flashdata('berita','');
		$user=$this->session->userdata('user');
		$table=$this->session->userdata('status');
		$where=$this->session->userdata('where');
		$item=$this->Model->getData($table,$where,$user);
		$data['data']=$item[0];
		$data['user']=$table;
		if($table=='admin')
			$role='dashboard_v2/profile_admin';
		else
			$role='dashboard_v2/profile_user';
		$this->load->view('dashboard_v2/header')
		->view('dashboard_v2/navbar')
		->view('dashboard_v2/sidebar')
		->view($role,$data)
		->view('dashboard_v2/footer');
	}
	function update_profile(){
		$table=$this->session->userdata('status');
		if($table=='alumni'){
			$data=$this->input->post(array('nama','alamat','tanggal_lahir','jenis_kelamin','email','telepon','tempat_kerja','password','tentang','foto'),true);
			$where['nim']=$this->session->userdata('user');
			$date=date_create($data['tanggal_lahir']);
			$data['tanggal_lahir']=date_format($date,"Y-m-d");
		}else{
			$data=$this->input->post(array('nama','foto','email','password'),true);
			$where['username']=$this->session->userdata('user');
		}
		if($data['password']=='')
			unset($data['password']);
		else
			$data['password']=$this->encryption->encrypt($data['password']);
		 $this->Model->update_data($where,$data,$table);
		 REDIRECT('Dashboard');	
	}
	function update_informasi(){
		$data=$this->input->post(array('nama_kampus','telepon','email','alamat','logo','link_facebook','link_instagram','link_twitter'),true);
		$this->Model->update_data('1=1',$data,'informasi');
		REDIRECT('Dashboard');
	}
	function update_password(){
		$data=$this->input->post(array('nim','password'),true);
		$where['nim']=$data['nim'];
		$data['password']=$this->encryption->encrypt($data['password']);
		unset($data['nim']);
		$this->Model->update_data($where,$data,'alumni');
		echo json_encode('sukses');
	}
	function galeri(){
				$this->session->set_flashdata('galeri','active');
		$this->session->set_flashdata('berita_alumni','');
		$this->session->set_flashdata('informasi','');
		$this->session->set_flashdata('berita','');
		$this->session->set_flashdata('daftar_berita','');
		$this->session->set_flashdata('alumni','');
		$this->session->set_flashdata('daftar_alumni','');
		$this->session->set_flashdata('berita','');
		$this->load->view('dashboard_v2/header')
		->view('dashboard_v2/navbar')
		->view('dashboard_v2/sidebar')
		->view('dashboard_v2/galeri')
		->view('dashboard_v2/footer');	
	}
	function informasi(){
				$this->session->set_flashdata('galeri','');
		$this->session->set_flashdata('berita_alumni','');
		$this->session->set_flashdata('informasi','active');
		$this->session->set_flashdata('berita','');
		$this->session->set_flashdata('daftar_berita','');
		$this->session->set_flashdata('alumni','');
		$this->session->set_flashdata('daftar_alumni','');
		$this->session->set_flashdata('berita','');
		$data['informasi']=$this->Model->getTable('informasi');
		$this->load->view('dashboard_v2/header')
		->view('dashboard_v2/navbar')
		->view('dashboard_v2/sidebar')
		->view('dashboard_v2/informasi',$data)
		->view('dashboard_v2/footer');	
	}
	function cek_pwd(){
		$pwd=$this->input->post('password');
		$user=$this->session->userdata('user');
		$table=$this->session->userdata('status');
		$where=$this->session->userdata('where');
		$data=$this->Model->getData($table,$where,$user);
		$data=$data[0];
		$password_db=$this->encryption->decrypt($data['password']);
		if($password_db==$pwd){
			$status['status']=true;
		}else{
			$status['status']=false;
		}
		echo json_encode($status);
	}
}