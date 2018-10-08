<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alumni extends CI_Controller{
	function __construct(){
		parent::__construct();
		   $this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('Pagging');
		$this->load->model('Model');
	}
	function index(){
		echo "it's works";
	}
	function cari_alumni(){
		$fakultas=$this->Model->getTable('fakultas');
		$program_studi=$this->Model->getTable('program_studi');
		$this->load->view('index/header')
		->view('index/navigation')
		->view('index/cari_alumni',array('fakultas'=>$fakultas,
			'program_studi'=>$program_studi))
		->view('index/right_navigation')
		->view('index/footer');
	}
	function detail($id=0){
		if($id==0){
			redirect('Berita');
		}else{
			$data=$this->Model->getDataAlumni($id,'','','','');
			$data_table=$this->Model->getData('berita','author',$id);
			if(empty($data))
				$this->load->view('error_404');
			else{
				$data=$data->result_array();
				$item=$data[0];
				$data_['item']=$item;
				$data_['berita']=$data_table;
				$this->load->view('index/header')
				->view('index/navigation')
				->view('index/detail_alumni',$data_)
				->view('index/right_navigation')
				->view('index/footer');        
			}

		}
	}
	function cari(){
		$nim=$this->input->post('nim');
		$nama=$this->input->post('nama');
		$program_studi=$this->input->post('program_studi');
		$fakultas=$this->input->post('fakultas');
		$angkatan=$this->input->post('angkatan');
		$data=$this->Model->getDataAlumni($nim,$nama,$program_studi,$fakultas,$angkatan);
		echo json_encode($data->result());

	}
	function pagination(){
		//
		$nim=$this->input->post('nim');
		$nama=$this->input->post('nama');
		$program_studi=$this->input->post('program_studi');
		$fakultas=$this->input->post('fakultas');
		$angkatan=$this->input->post('angkatan');
		$data=$this->Model->getDataAlumni($nim,$nama,$program_studi,$fakultas,$angkatan);
		$total_rows=$data->num_rows();

		//
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $total_rows;
		$config["per_page"] = 4;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li>';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config['prev_link']        = '«';
    	$config['next_link']        = '»';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		//
		$config["num_links"] = 1;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];
		$output = array(
			'pagination_link'  => $this->pagination->create_links(),
			'alumni_table'   => $this->Model->fetch_details($nim,$nama,$program_studi,$fakultas,$angkatan,$config["per_page"], $start)
		);
		echo json_encode($output);
	}
}
?>