<?php
class m_transaksipra extends CI_Model
{
	var $table='transaksipra';
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
	$this->db->where('TRANSAKSIPRAID',$id);	
	$hasil=$this->db->get($this->table)->row();
	return $hasil;
	}
	
	function getData()
	{
	$this->db->order_by("TRANSAKSIPRAID", "desc"); 
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
	
	function getDataTransaksipraCovernote()
	{
		$hasil = $this->db->query('SELECT * FROM covernote RIGHT JOIN transaksipra ON transaksipra.TRANSAKSIPRAID = covernote.TRANSAKSIPRAID')->result();
		return $hasil;
	}

	function getData_update_proses()
	{
		$hasil = $this->db->query('SELECT * FROM covernote JOIN transaksipra ON transaksipra.TRANSAKSIPRAID = covernote.TRANSAKSIPRAID  GROUP BY transaksipra.TRANSAKSIPRAID')->result();
		return $hasil;
	}

	//detail update proses
	function getData_akta($id)
	{
		return $hasil = $this->db->query("SELECT akta.*, proses.*, prosestran.PROSESTRANID, aktatran.* from transaksipra JOIN aktatran ON aktatran.TRANSAKSIPRAID = transaksipra.TRANSAKSIPRAID
									JOIN akta ON akta.AKTAID = aktatran.AKTAID JOIN prosestran ON prosestran.PROSESTRANID = aktatran.CURRENTPROSES
									JOIN proses ON proses.PROSESID = prosestran.PROSESID
									where transaksipra.TRANSAKSIPRAID = ?", array($id))->result();
	}

	function get_no_covernote_by_trans_id($id)
	{
		$hasil = $this->db->query('SELECT * FROM covernote JOIN transaksipra ON transaksipra.TRANSAKSIPRAID = covernote.TRANSAKSIPRAID where transaksipra.TRANSAKSIPRAID = ?', array($id))->result();
		return $hasil;
	}

	function update_proses_akta($id_akta, $idprosestran)
	{
		$this->db->query("update prosestran SET STATUSPROSES = 2 where PROSESTRANID = $idprosestran");
		//$akta = $this->db->query("select * from akta where AKTAID = $id")->row();
		$proses = $this->db->query('SELECT MIN(NOMORURUT), PROSESID, PROSESTRANID, AKTATRANID from prosestran '
                . 'WHERE prosestran.aktatranid=' .$id_akta. ' and prosestran.STATUSPROSES=1')->row();
		
                if($proses->PROSESTRANID != NULL){
//                    echo "ada";
                    $this->db->query("update aktatran SET CURRENTPROSES = $proses->PROSESTRANID WHERE AKTATRANID = $proses->AKTATRANID");
                }else{
//                    echo "gak ada";
                    $this->db->query("update aktatran SET STATUSAKTAID = 2 WHERE AKTATRANID = (SELECT AKTATRANID FROM prosestran WHERE PROSESTRANID=" . $idprosestran . ")");
                }
                
	}
	
}

?>