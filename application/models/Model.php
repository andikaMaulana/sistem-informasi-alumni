<?php if(!defined('BASEPATH')) exit('No Direct Script Address Allowed');
class Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function login($where,$table,$data){
		$username=$data['username'];
		$this->db->where($where,$username);
		$this->db->from($table);
		$data=$this->db->get();
		return $data->result_array();
	}
	function getAlumni($nama){
		$data=$this->db->query('select * from alumni where nama like %'.$nama.'%');
		return $data->result_array();
	}
	function get_email($nim){
		$this->db->select('alumni.email');
		$this->db->select('alumni.nama');
		$this->db->where('nim',$nim);
		$this->db->from('alumni');
		$data=$this->db->get();
		return $data->result_array();
	}
	function getTemanSatuJurusan(){
		$nim=$this->session->userdata('user');
		$data=$this->db->query('select * from alumni where nim='.$nim);
		$data=$data->result_array();
		$angkatan=$data[0]['angkatan'];
		$program_studi=$data[0]['program_studi'];
		$this->db->select('alumni.nim AS nim');
		$this->db->select('alumni.nama AS nama');
		$this->db->select('alumni.tahun_lulus AS tahun_lulus');
		$this->db->select('alumni.alamat AS alamat');
		$this->db->select('alumni.email AS email');
		$this->db->select('alumni.foto AS foto');
		$this->db->select('alumni.tempat_kerja AS tempat_kerja');
		$this->db->select('alumni.telepon AS telepon');
		$this->db->from('alumni');
		$this->db->where('angkatan',$angkatan);
		$this->db->where('program_studi',$program_studi);
		$dataAlumni=$this->db->get();
		return $dataAlumni;
	}
	public function logout($where){
		$nim=$where['nim'];
		$this->db->query('delete from user_online where id_session="'.$nim.'"');
	}
	public function getData($table,$where,$value){
		$this->db->where($where,$value);
		$this->db->from($table);
		$data=$this->db->get();
		return $data->result_array();
	}
	public function getTable($table){
		$data=$this->db->query('select * from '.$table);
		return $data->result_array();
	}
	public function getBerita(){
		$this->db->select('id_berita,judul,author,waktu,kategori,alumni.nama');
		$this->db->from('berita');
		$this->db->join('alumni','alumni.nim=berita.author');
		$data=$this->db->get();
		return $data->result_array();	
	}
	public function getArsip($where){
		$qry='SELECT berita.id_berita as id, berita.judul as judul FROM berita WHERE DATE_FORMAT(waktu,\'%M %Y\') LIKE \''.$where.'\'';
		$data=$this->db->query($qry);
		return $data->result_array();
	}
	public function getDataAlumni($nim,$nama,$id_prodi,$id_fakultas,$angkatan){
		$this->db->select('alumni.nim AS nim');
		$this->db->select('alumni.nama AS nama');
		$this->db->select('program_studi.nama AS program_studi');
		$this->db->select('fakultas.nama AS fakultas');
		$this->db->select('alumni.angkatan AS angkatan');
		$this->db->select('alumni.tahun_lulus AS tahun_lulus');
		$this->db->select('alumni.alamat AS alamat');
		$this->db->select('alumni.email AS email');
		$this->db->select('alumni.foto AS foto');
		$this->db->select('alumni.tempat_kerja AS tempat_kerja');
		$this->db->select('alumni.telepon AS telepon');
		$this->db->from('alumni');
		$this->db->join('program_studi','alumni.program_studi=program_studi.id');
		$this->db->join('fakultas','program_studi.id_fakultas=fakultas.id');
		$this->db->like('alumni.nim',$nim,'both');		
		$this->db->like('alumni.nama',$nama, 'both');		
		$this->db->like('program_studi.id',$id_prodi, 'both');
		$this->db->like('fakultas.id',$id_fakultas, 'both');
		$this->db->like('alumni.angkatan',$angkatan, 'both');
		return $this->db->get();
	}
	public function fetch_details($nim,$nama,$id_prodi,$id_fakultas,$angkatan,$limit, $start)
	{
		$output = '';
		$this->db->select('alumni.nim AS nim');
		$this->db->select('alumni.nama AS nama');
		$this->db->select('program_studi.nama AS program_studi');
		$this->db->select('fakultas.nama AS fakultas');
		$this->db->select('alumni.angkatan AS angkatan');
		$this->db->select('alumni.tahun_lulus AS tahun_lulus');
		$this->db->from('alumni');
		$this->db->join('program_studi','alumni.program_studi=program_studi.id');
		$this->db->join('fakultas','program_studi.id_fakultas=fakultas.id');
		$this->db->like('alumni.nim',$nim,'both');	
		$this->db->like('alumni.nama',$nama, 'both');		
		$this->db->like('program_studi.id',$id_prodi, 'both');
		$this->db->like('fakultas.id',$id_fakultas, 'both');
		$this->db->like('alumni.angkatan',$angkatan, 'both');
		$this->db->order_by("nim", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-sm table-bordered" style="font-size:14px;">
		<thead class="table-active">
		<tr><td scope="col">No</td><td scope="col">Nama</td><td scope="col">Program Studi</td><td scope="col">Fakultas</td><td scope="col">Angkatan</td><td scope="col">Tahun Lulus</td></tr>
		</thead><tbody>';
		$no=1;
		foreach($query->result() as $row)
		{
			$output .= '
			<tr>
			<td>'.$no.'</td>
			<td><a href="'.base_url().'Alumni/detail/'.$row->nim.'">'.$row->nama.'</a></td>
			<td>'.$row->program_studi.'</td>
			<td>'.$row->fakultas.'</td>
			<td>'.$row->angkatan.'</td>
			<td>'.$row->tahun_lulus.'</td>
			</tr>
			';
			$no++;
		}
		$output .= '</tbody></table>';
		return $output;
	}
	public function getComments($where){
		$this->db->select('komentar.id AS id');
		$this->db->select('komentar.author as author');
		$this->db->select('komentar.isi as isi');
		$this->db->select('komentar.waktu AS waktu');
		$this->db->select('komentar.id_parent_comment AS id_parent_comment');
		$this->db->select('alumni.foto AS foto');
		$this->db->select('alumni.nama AS nama');
		$this->db->from('komentar');
		$this->db->join('alumni','komentar.author = alumni.nim');
		$this->db->where('id_berita',$where);
		$data=$this->db->get();
		$this->db->select('komentar.id AS id');
		$this->db->select('komentar.author as author');
		$this->db->select('komentar.isi as isi');
		$this->db->select('komentar.waktu AS waktu');
		$this->db->select('komentar.id_parent_comment AS id_parent_comment');
		$this->db->select('admin.foto AS foto');
		$this->db->select('admin.nama AS nama');
		$this->db->from('komentar');
		$this->db->join('admin','komentar.author = admin.username');
		$this->db->where('id_berita',$where);
		$data1=$this->db->get();
		$komentar=array_merge($data1->result_array(),$data->result_array());
		//shorting data komentar
		if(empty($komentar)){
		}
		else{
			foreach($komentar as $c=>$key) {
				$waktu[] = $key['waktu'];
			}
			array_multisort($waktu,SORT_ASC,SORT_STRING,$komentar);
		}
		return $komentar;
	}
	public function cari($data){
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->like('berita.judul',$data, 'both');
		$data=$this->db->get();
		return $data->result();
	}
	public function insert_data($database,$item){
		$res=$this->db->insert($database,$item);
		return $res;
	}

	public function get_all_post(){
		$isi=$this->db->query('select * from berita');
		return $isi->result_array();
	}
	function delete($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function get_name($value){
		if(is_numeric($value)){
			$where='nim';
			$table='alumni';			
		}else{
			$where='username';
			$table='admin';
		}
		$data= $this->db->select('nama')
		->from($table)
		->where($where,$value)
		->get();
		return $data->result_array();
	}	
	function get_arsip_berita(){
		$waktu_post=$this->db->query('SELECT DISTINCT DATE_FORMAT(waktu, \'%M %Y\') AS waktu FROM berita')->result_array();
		$jumlah_post=$this->db->query('SELECT COUNT(id_berita) AS jumlah FROM berita WHERE waktu GROUP BY MONTH(waktu),YEAR(waktu)')->result_array();	
		$i=0;
		foreach ($waktu_post as $item){
			$jumlah_post[$i]['waktu']=$waktu_post[$i]['waktu'];
			$i++;			
		}
		return array_reverse($jumlah_post);
	}	
	function get_jumlah_komentar(){
		$table=$this->session->userdata('status');
		$where=$this->session->userdata('where');
		$val=$this->session->userdata('user');
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join('berita','berita.author='.$table.'.'.$where);
		$this->db->join('komentar','komentar.id_berita=berita.id_berita');
		$this->db->where('berita.author',$val);
		return $this->db->get()->num_rows();
	}
	function get_jumlah_berita($where){
		$val=$this->session->userdata('user');
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('berita.author',$val);
		$this->db->where('berita.kategori',$where);
		return $this->db->get()->num_rows();
	}
}