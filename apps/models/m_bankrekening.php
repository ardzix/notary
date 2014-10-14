<?php
class m_bankrekening extends CI_Model
{
	var $table='bankrekening';
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
	$this->db->where('BANKREKID',$id);	
	$hasil=$this->db->get($this->table)->row();
	return $hasil;
	}
	
	
	
	
	function getData()
	{
	$hasil=$this->db->get($this->table)->result();
	return $hasil;
	}
	
	
	
	function getJmlData()
	{	
	$hasil=$this->db->get($this->table)->num_rows();
	return $hasil;
	}
	
	
}

?>