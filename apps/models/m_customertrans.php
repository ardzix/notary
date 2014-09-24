<?php
class m_customertrans extends CI_Model
{
	var $table='customertrans';
	function __construct()
	{
	parent::__construct();
	$this->load->database();
	}
	
	function insertData($data)
	{
	$this->db->insert($this->table,$data);
	
	
	}
	function getCustIdFromTransId($id)
	{
		$this->db->where('TRANSAKSIPRAID',$id);
		$hasil=$this->db->get($this->table)->result();
		return $hasil;
	}
			
	function getDataById($id)
	{
	$this->db->where('TRANSAKSIPRAID',$id);	
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
	
	function getDataTransaksipraCovernote()
	{
		$hasil = $this->db->query('SELECT * FROM covernote RIGHT JOIN transaksipra ON transaksipra.TRANSAKSIPRAID = covernote.TRANSAKSIPRAID')->result();
		return $hasil;
	}
	
}

?>