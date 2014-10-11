<?php

class m_prosestran extends CI_Model {

    var $table = 'prosestran';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertData($data) {
        $this->db->insert($this->table, $data);
    }

    function getDataById($id) {
        $this->db->where('PROSESTRANID', $id);
        $hasil = $this->db->get($this->table)->row();
        return $hasil;
    }

    function getData() {
        $hasil = $this->db->get($this->table)->result();
        return $hasil;
    }

    function getAllData($page, $url) {
        $this->db->order_by('PROSESTRANID', 'DESC');
        $hasil = $this->db->get($this->table, $page, $url)->result();
        return $hasil;
    }

    function getJmlData() {
        $hasil = $this->db->get($this->table)->num_rows();
        return $hasil;
    }

    function getDataByTransaksipraID($id) {
        $this->db->where('TRANSAKSIPRAID', $id);
        $hasil = $this->db->get($this->table)->result();
        return $hasil;
    }

    function getMinNomorUrut($id) {
        /* $this->db->select_min('NOMORURUT');
          $this->db->from('prosestran');
          $this->db->join('proses','prosestran.prosesid=proses.prosesid');
          $this->db->where('prosestran.aktatranid',$id);
          $hasil=$this->db->get();
          return $hasil; */
        $hasil = $this->db->query('SELECT PROSESTRANID, NOMORURUT, TGLMULAI, TGLSELESAI 
									FROM prosestran 
									JOIN proses on proses.PROSESID=prosestran.PROSESID 
									WHERE NOMORURUT=(select Min(NOMORURUT) 
															FROM prosestran 
															JOIN proses on proses.PROSESID=prosestran.PROSESID && prosestran.AKTATRANID=' . $id . ') 
											&& AKTATRANID=' . $id)->result();
        return $hasil;
    }

    function getCurrentProsesLama($id) {
        $hasil = $this->db->query('SELECT PROSESTRANID, prosesakta.aktaid, aktatran.aktaid as ak, '
                        . 'nomorurut from prosestran join prosesakta on prosestran.prosesid = prosesakta.prosesid '
                        . 'join aktatran on prosestran.aktatranid=aktatran.aktatranid'
                        . 'where prosesakta.aktaid = aktatran.aktaid '
                        . 'and prosestran.aktatranid = ' . $id . ' and nomorurut = (select min(nomorurut) from prosesakta, prosestran, aktatran '
                        . 'where aktatran.aktatranid=prosestran.aktatranid '
                        . 'and prosestran.prosesid=prosesakta.prosesid '
                        . 'and aktatran.aktaid=prosesakta.aktaid '
                        . 'and aktatran.aktatranid = ' . $id . ' '
                        . 'and prosestran.statusproses=1)')->result();

        return $hasil;
    }
    
    function getCurrentProses($id){
        $hasil = $this->db->query('SELECT MIN(NOMORURUT), PROSESID, PROSESTRANID from prosestran '
                . 'WHERE prosestran.aktatranid=' .$id. ' and prosestran.STATUSPROSES=1')->row_array();
        
        return $hasil;
    }

    function getMinMaxtgl($id) {
        $hasil = $this->db->query('SELECT MIN( TGLMASUK) AS TGLMASUK, MAX( TGLDEADLINE) AS TGLDEADLINE FROM prosestran WHERE aktatranid =' . $id)->result();


        return $hasil;
    }

    function getMaxNomorUrut($id) {
        /* $this->db->select_min('NOMORURUT');
          $this->db->from('prosestran');
          $this->db->join('proses','prosestran.prosesid=proses.prosesid');
          $this->db->where('prosestran.aktatranid',$id);
          $hasil=$this->db->get();
          return $hasil; */
        $hasil = $this->db->query('SELECT PROSESTRANID, NOMORURUT, TGLMULAI 
									FROM prosestran 
									JOIN proses on proses.PROSESID=prosestran.PROSESID 
									WHERE NOMORURUT=(select Max(NOMORURUT) 
															FROM prosestran 
															JOIN proses on proses.PROSESID=prosestran.PROSESID && prosestran.AKTATRANID=' . $id . ') 
											&& AKTATRANID=' . $id)->result();
        return $hasil;
    }

    function getDataByAktaTranId($id) {

        $this->db->where('AKTATRANID', $id);
        //$this->db->order_by("NOMORURUT","asc");
        $hasil = $this->db->get($this->table)->result();
        return $hasil;
    }

    function updateData($id, $data) {
        $this->db->where('PROSESTRANID', $id);
        $this->db->update($this->table, $data);
    }

    function getProsestranByTransaksi($transaksiId) {
        $hasil = $this->db->query('SELECT prosestran.* FROM transaksipra '.
            'JOIN aktatran ON aktatran.TRANSAKSIPRAID = transaksipra.TRANSAKSIPRAID '.
            'JOIN prosestran ON prosestran.AKTATRANID = aktatran.AKTATRANID '.
            'where transaksipra.TRANSAKSIPRAID = '.$transaksiId)->result();
        return $hasil;
    }

}

?>