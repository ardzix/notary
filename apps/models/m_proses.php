<?php
class m_proses extends CI_Model
{
	var $table='proses';
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
	$this->db->where('PROSESID',$id);	
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
	$this->db->order_by('PROSESID','DESC');
	$hasil=$this->db->get($this->table,$page,$url)->result();
	return $hasil;
	}
	
	function getDataByAktaId($id)
	{
		$hasil=$this->db->query('select * from proses join prosesakta on proses.PROSESID = prosesakta.PROSESID where prosesakta.AKTAID ='. $id .' order by prosesakta.NOMORURUT ASC')->result();
		return $hasil;
	}
	function getJmlData()
	{	
	$hasil=$this->db->get($this->table)->num_rows();
	return $hasil;
	}
	
	function getNullAktaProses($id)
	{
		$query = $this->db->query('SELECT proses.PROSESID, proses.PROSESDESC FROM proses left join prosesakta on proses.PROSESID=prosesakta.PROSESID where proses.PROSESID not in (select prosesakta.PROSESID from prosesakta where prosesakta.AKTAID='. $id .') order by proses.PROSESDESC asc');
		$hasil = $query->result();
		return $hasil;
	}
        
        function getDataProsesAkta($id){
            
                $this->db->where('AKTAID', $id);
                $this->db->order_by('NOMORURUT', 'ASC');
                $hasil=$this->db->get('prosesakta')->result();
                return $hasil;
        }
        
        
	function deleteData($id)
	{
		$this->db->where('PROSESID',$id);
		$this->db->delete('proses');
	}
	
	function update($id,$data)
	{
		$this->db->where('PROSESID',$id);
		$this->db->update($this->table,$data);
	}
        
        function insertToprosesakta($data){
                
                $qry = $this->db->insert('prosesakta', $data);
                if($qry){
                    return TRUE;
                }else{
                    return FALSE;
                }
        }
	
        function deleteProsesAkta($prosesid, $aktaid)
        {
            $this->db->where('PROSESID',$prosesid);
            $this->db->where('AKTAID',$aktaid);
            $qry = $this->db->delete('prosesakta');
                    
            if($qry){
                return TRUE;
            }
        }
        
        function getSatuanWktById($id){
            $this->db->where('PROSESID', $id);
            $this->db->select('SATWAKTUSTDID');
            $hasil = $this->db->get('proses')->row_array();
            
            return $hasil;
        }
        
        function getDefWktById($id){
            $this->db->where('PROSESID', $id);
            $this->db->select('DEFWAKTUSTD');
            $hasil = $this->db->get('proses')->row_array();
            
            return $hasil;
        }
}

?>