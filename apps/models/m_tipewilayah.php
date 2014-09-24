<?php
class m_tipewilayah extends CI_Model
{
	var $table='tipewilayah';
	function __construct()
	{
	parent::__construct();
	$this->load->database();
	}
	
	function insertData($data)
	{
	$this->db->insert($this->table,$data);
	
	
	}
	
			
	function getDataById($id)
	{
	$this->db->where('TIPEWILAYAHID',$id);	
	$hasil=$this->db->get($this->table)->row();
	return $hasil;
	}
	
	function getData()
	{
	$hasil=$this->db->get($this->table)->result();
	return $hasil;
	}
	
	function getAllData($page,$url)
	{
	$this->db->order_by('TIPEWILAYAHID','DESC');
	$hasil=$this->db->get($this->table,$page,$url)->result();
	return $hasil;
	}
	
	function getJmlData()
	{	
	$hasil=$this->db->get($this->table)->num_rows();
	return $hasil;
	}
	
	
}

?>