<?php
class m_aktaproses extends CI_Model
{
	var $table='aktaproses';
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
		$this->db->where('AKTAID',$id);	
		$hasil=$this->db->get($this->table)->row();
		return $hasil;
	}
	
	function getDataByAktaID($id)
	{
		$this->db->where('AKTAID',$id);
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
	
	function getDataTransaksipraCovernote()
	{
		$hasil = $this->db->query('SELECT * FROM covernote RIGHT JOIN transaksipra ON transaksipra.TRANSAKSIPRAID = covernote.TRANSAKSIPRAID')->result();
		return $hasil;
	}
	
}

?>