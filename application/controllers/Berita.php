<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	function __construct(){
		parent::__construct();
    $this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('Pagging');
    $this->load->model('Model');
  }
  function index(){
    $limit=2;
    $start=0;
    $data_berita=$this->Pagging->get_article('Berita Alumni',$limit,$start);
    $data_lowongan=$this->Pagging->get_article('Lowongan Pekerjaan',$limit,$start);
    $this->load->view('index/header')
    ->view('index/navigation')
    ->view('index/content',array(
      'data_berita'=>$data_berita,
      'data_lowongan'=>$data_lowongan 
    ))
    ->view('index/right_navigation')
    ->view('index/footer');
  }
  function lowongan(){
    $where='Lowongan Pekerjaan';
    $data['jenis']='Lowongan Pekerjaan';
    $config['base_url']=base_url()."index.php/berita/lowongan";
    $config['total_rows']=$this->Pagging->total_rows($where);
    $config['per_page']=4;
    $choice=$config['total_rows']/$config['per_page'];
    $config['num_links']=floor($choice);
    $config['uri_segment']=3;
    $config['first_link']='First';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
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
    $this->pagination->initialize($config);
    $data['page'] = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    $limit=$config['per_page'];
    $start=$data['page'];
    $data['data']=$this->Pagging->get_article($where,$limit,$start);
    $data['pagination'] = $this->pagination->create_links();
    $this->load->view('index/header')
    ->view('index/navigation')
    ->view('index/sub_content',$data)
    ->view('index/right_navigation')
    ->view('index/footer');
  }
  function alumni(){
    $where='Berita Alumni';
    $data['jenis']='Berita Alumni';
    $config['base_url']=base_url()."index.php/berita/event";
    $config['total_rows']=$this->Pagging->total_rows($where);
    $config['per_page']=8;
    $choice=$config['total_rows']/$config['per_page'];
    $config['num_links']=floor($choice);
    $config['uri_segment']=3;
    $config['first_link']='First';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
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
    $this->pagination->initialize($config);
    $data['page'] =  ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    $limit=$config['per_page'];
    $start=$data['page'];
    $data['data']=$this->Pagging->get_article($where,$limit,$start);
    $data['pagination'] = $this->pagination->create_links();
    $this->load->view('index/header')
    ->view('index/navigation')
    ->view('index/sub_content',$data)
    ->view('index/right_navigation')
    ->view('index/footer');	
  }
  function detail($id=0){
    if($id==0){
     redirect('Berita');
   }else{
     $data=$this->Pagging->get_detail_article($id);
     if(empty($data))
      $this->load->view('error_404');
    else{
      $item=$data[0];
      $komentar=$this->Model->getComments($id);
      $nama=$this->Model->get_name($item['author']);
      if(empty($nama[0]['nama']))
        $nama[0]['nama']="";
      $this->load->view('index/header')
      ->view('index/navigation')
      ->view('index/detail_content',array('item'=>$item,
        'nama'=>$nama[0]['nama'],
        'komentar'=>$komentar))
      ->view('index/right_navigation')
      ->view('index/footer');        
    }
  }
}
function detail_berita(){
  $id=$this->input->post('id_berita');  
   $data=$this->Pagging->get_detail_article($id);
   $item=$data[0];
    $komentar=sizeof($this->Model->getComments($id));
  // $komentar=$this->Model->getComments($id);
  $nama=$this->Model->get_name($item['author']);
  $data=array('data'=>$item,'author'=>$nama[0]['nama'],'jumlah_komentar'=>$komentar);
  echo json_encode($data);
}
function komentar($id=0){
  $is_login=$this->session->userdata('user');
  if(empty($is_login)){
    $status=array('keterangan'=>'<div class="alert alert-warning">silahkan login </div>');
    echo json_encode($status);
    
  }
  else{
    $komentar=$this->input->post('komentar');
    $id_parent_comment=$this->input->post('id_parent_comment');
    $waktu=date("Y-m-d H:i:s");
    $data=array(
      'id'=>'',
      'id_berita'=>$id,
      'author'=>$is_login,
      'waktu'=> $waktu,
      'isi'=>$komentar,
      'id_parent_comment'=>$id_parent_comment
    );
    $this->Model->insert_data('komentar',$data);
    $status=array('keterangan'=>'berhasil');
    echo json_encode($status);
  }
}
function cek_komentar($id=0){
  $data=$this->Model->getComments($id);
  // echo json_encode($data);
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}
function get_komentar($id_berita){  
  $data=$this->Model->getComments($id_berita);
  echo json_encode($data);
}
function short_comment($id_berita){
  $data=$this->Model->getComments($id_berita);
  $dataKomentar=array();
  for ($i=0; $i <sizeof($data) ; $i++) { 
    if($data[$i]['id_parent_comment']==null){
      array_push($dataKomentar, $data[$i]);
      for($j=0;$j<sizeof($data);$j++){
        if($data[$i]['id']==$data[$j]['id_parent_comment']){
          array_push($dataKomentar, $data[$j]);
        }
      }
    }
  }
  echo json_encode($dataKomentar);
}
function get_parent_comments($id_berita,$id_parent_comment){
 $data=$this->Model->getParentComments($id_berita,$id_parent_comment);
 echo json_encode($data); 
}
function cari(){
  $data['jenis']="cari berita";
  $data['pagination']="";
  $cari=$this->input->post('cari');
  $data['data']=$this->Model->cari($cari);
    $this->load->view('index/header')
    ->view('index/navigation')
    ->view('index/sub_content',$data)
    ->view('index/right_navigation')
    ->view('index/footer'); 
}
function cari_berita(){
  $cari=$this->input->post('cari');
  $data=$this->Model->cari($cari);
  echo json_encode($data);
}
function hapus_komentar(){
  $data['id']=$this->input->post('id_komentar');
  $this->Model->delete($data,'komentar');
  $parent['id_parent_comment']=$data['id'];
  $this->Model->delete($parent,'komentar');
}
function arsip_berita(){
  $waktu=$this->input->post('waktu');
  $data=$this->Model->getArsip($waktu);
  echo json_encode($data);
}
function loadRecord($rowno=0){
  $rowperpage=6;
  //row position
  if($rowno!=0){
    $rowno=($rowno-1)*$rowperpage;
  }
  //all record
  $allcount=$this->Pagging->getRowCount();
    //get record
  //interface conf
  $config['first_link']='First';
    $config['prev_link']        = '«';
    $config['next_link']        = '»';
    $config['full_tag_open']    = '<div class="pagination text-center"><nav><ul class="pagination justify-content-center">';
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
  $user_record=$this->Pagging->getData($rowno,$rowperpage);
  $config['base_url']=base_url().'Berita/loadRecord';
  $config['use_page_numbers']=true;
  $config['total_rows']=$allcount;
  $config['per_page']=$rowperpage;
  $this->pagination->initialize($config);
  //init data
  $data['pagination']=$this->pagination->create_links();
  $data['result']=$user_record;
  $data['row']=$rowno;
  echo json_encode($data);
}

}
?>