<?php
class m_covernote extends CI_Model
{
	var $table='covernote';
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
	$this->db->where('COVERNOTEID',$id);	
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
	
	
	function updateData($id,$data)
	{
		$this->db->where('COVERNOTEID', $id);
		$this->db->update($this->table, $data); 
	
	}
	
	
	function add_date($givendate,$day,$month,$year) 
	{
		 $cd = strtotime($givendate);
		$newdate = date('Y-m-d h:i:s', mktime(date('h',$cd),
		date('i',$cd), date('s',$cd), date('m',$cd)+$month,
		date('d',$cd)+$day, date('Y',$cd)+$year));
		return $newdate;
     }


	
}

?>