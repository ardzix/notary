<?php

/*
 * @author        : Pt. Qiwary Usaha Nusantara
 * File Name      : m_prosesakta.php;
 * Encoding       : UTF-8;
 * File Created @ : Apr 14, 2014, 9:03:28 AM;
 */

class M_prosesakta extends CI_Model {

    function getMinNomorUrut($id) {
        /* $this->db->select_min('NOMORURUT');
          $this->db->from('prosestran');
          $this->db->join('proses','prosestran.prosesid=proses.prosesid');
          $this->db->where('prosestran.aktatranid',$id);
          $hasil=$this->db->get();
          return $hasil; */
        $hasil = $this->db->query('SELECT PROSESTRANID, NOMORURUT, TGLMULAI 
									FROM prosestran 
									JOIN proses on proses.PROSESID=prosestran.PROSESID 
									WHERE NOMORURUT=(select Min(NOMORURUT) 
															FROM prosestran 
															JOIN proses on proses.PROSESID=prosestran.PROSESID && prosestran.AKTATRANID=' . $id . ') 
											&& AKTATRANID=' . $id)->result();
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

}
