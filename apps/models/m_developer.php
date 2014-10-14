<?php
class m_developer extends CI_Model
{
	var $table='developer';
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
	$this->db->where('DEVELOPERID',$id);	
	$hasil=$this->db->get($this->table)->row();
	return $hasil;
	}
	function getDataByTranId($id)
	{
	$this->db->where('TRANSAKSIPRAID',$id);	
	$hasil=$this->db->get($this->table)->row();
	return $hasil;
	}
	
	function getDataCovFromTranId($id)
	{
		$this->db->where('TRANSAKSIPRAID',$id);
		$hasil=$this->db->get($this->table)->result();
		return $hasil;
		
	}
	
	function getData()
	{
		$hasil=$this->db->get($this->table)->result();
		return $hasil;
	}
	
	function getAllData($page,$url)
	{
	$this->db->order_by('model_id','DESC');
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