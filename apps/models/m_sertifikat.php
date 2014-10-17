<?php
class m_sertifikat extends CI_Model
{
	var $table='sertifikat';
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
		$this->db->where('SERTIFIKATID',$id);	
		$hasil=$this->db->get($this->table)->row();
		return $hasil;
	}
	
	function getData()
	{
		$hasil=$this->db->get($this->table)->result();
		return $hasil;
	}

	function updateData($id, $data) {
        $this->db->where('SERTIFIKATID', $id);
        $this->db->update($this->table, $data);
    }

	function getSertifikatByTransaksi($transaksiId){
		$hasil = $this->db->query('SELECT sertifikat.* FROM transaksipra '.
			'JOIN aktatran ON aktatran.TRANSAKSIPRAID = transaksipra.TRANSAKSIPRAID '.
			'JOIN sertifikat ON sertifikat.AKTATRANID = aktatran.AKTATRANID '.
			'where transaksipra.TRANSAKSIPRAID = '.$transaksiId)->result();
		return $hasil;
	}

	function delete($SERTIFIKATID){
        $this->db->where('SERTIFIKATID', $SERTIFIKATID);
        $this->db->delete($this->table); 
    }
	
}

?>