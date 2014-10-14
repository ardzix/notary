<?php
class m_satuanwaktustd extends CI_Model
{
	var $table='satuanwaktustd';
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
		$this->db->where('SATWAKTUSTDID',$id);	
		$hasil=$this->db->get($this->table)->row();
		return $hasil;
	}
	
	function getDataByTranID($id)
	{
		$this->db->where('SATWAKTUSTDID',$id);
		$hasil=$this->db->get($this->table)->result();
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