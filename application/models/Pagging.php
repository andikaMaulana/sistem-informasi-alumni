<?php if(!defined('BASEPATH')) exit('No Direct Script Address Allowed');
class Pagging extends CI_Model{
	function __construct(){
		parent::__construct();
	}	
	function get_article($where,$limit,$start){
		 $query = $this->db->select('*')
                ->from('berita')
                ->where('kategori',$where)
                ->limit($limit,$start)
                ->order_by("waktu","desc")
                ->get();
        return $query->result();
	}
	function total_rows($where){
		$this->db->where('kategori',$where);
		$this->db->from('berita');
		$data=$this->db->get();
		return $data->num_rows();
	}
	function get_detail_article($id){
		$id=array('id_berita'=>$id);
		$isi=$this->db->get_where("berita",$id);
		return $isi->result_array();
	}
	function getData($rowno, $rowperpage){
		$this->db->select('DISTINCT DATE_FORMAT(waktu,\'%M %Y\') AS waktu_');
		$this->db->select('(SELECT COUNT(id_berita) AS jumlah FROM berita
 WHERE DATE_FORMAT(waktu, \'%M %Y\')=waktu_) AS jumlah_post');
		$this->db->from('berita');
		$this->db->order_by('year(waktu)','desc');
		$this->db->order_by('month(waktu)','desc');
		$this->db->limit($rowperpage, $rowno);
		$data=$this->db->get();
		return $data->result_array();
	}
	function getRowCount(){
		$this->db->select('DISTINCT DATE_FORMAT(waktu,\'%M %Y\') AS waktu');
		$this->db->from('berita');
		$data=$this->db->get();
		return $data->num_rows();
	}
}

?>