<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Mce extends CI_Controller{	
	function __construct()
	{
		parent::__construct();
	}
	function index(){
		$this->load->view('mce_upload');
	}
	function tinymce_upload(){
		$config['upload_path']='./upload/';
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
			->set_output(json_encode(['location' => base_url().'upload/'.$file['file_name']]))
			->_display();
			exit;
		}
	}
	function tmp(){
		//delete images in article 
		if($_POST){
			$page_content=$_POST['post_content'];
			$page_content=str_replace(array('"','>','<'),' ', $page_content);
			$content=explode(" ",$page_content);
			echo "<pre>";
			print_r($content);
			echo "</pre>";
			foreach ($content as $key){
				if(strpos($key,'http://') !== false){
					echo "found</br>";
					$url=base_url();
					$key=str_replace($url,'', $key);
					if(file_exists($key)){
						echo "file as been deleted <br> ";
						unlink($key);
					}
				}
			}
		}
	}
}
?>















