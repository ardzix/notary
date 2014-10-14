<?php

/*
 * Project Name: notary
 * File Name: model_core
 * Created on: 15 Jan 14 - 14:53:50
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

class Model_core extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function notifikasi($param1){
        $this->db->select('*');
        $this->db->where('EMPLOYEEID', $param1);
        $this->db->order_by('TIMESTAMP', 'desc');
        $this->db->limit(10);
        $qry = $this->db->get('notifikasi');
        
        return $qry->result();
    }

    function login($user, $pass) {
        $param = array(
            'USERNAME' => $user,
            'PASSWORD' => md5($pass)
        );

        $this->db->where($param);
        $login = $this->db->get('user');

        if ($login->num_rows() == 1) {
            return $login->result();
        } else {
            return FALSE;
        }
    }

    function check_login() {
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('?gagal=');
        }
    }

    function insert($param1, $param2) {
        $qry = $this->db->insert($param1, $param2);

        if ($qry) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function insertRetId($param1, $param2) {
        $qry = $this->db->insert($param1, $param2);

        if ($qry) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    function get_data_max($param1, $param2) {
        $this->db->select_max($param2);
        $qry = $this->db->get($param1);

        return $qry->row_array();
    }

    function get_data($param1) {
        $qry = $this->db->get($param1);

        return $qry->result();
    }

    function get_where_array($param1, $param2) {
        $this->db->where($param2);
        $qry = $this->db->get($param1);

        return $qry->row_array();
    }

    function get_where_result($param1, $param2) {
        $this->db->where($param2);
        $qry = $this->db->get($param1);

        return $qry->result();
    }
    
    function get_where_result_array($param1, $param2) {
        $this->db->where($param2);
        $qry = $this->db->get($param1);

        return $qry->result_array();
    }

    function update_login($param1, $param2, $param4) {
        $this->db->where($param2);
        $qry = $this->db->update($param1, $param4);

        if ($qry) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function update($param1, $param2, $param3, $param4) {
        $this->db->where($param2, $param3);
        $qry = $this->db->update($param1, $param4);

        if ($qry) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function delete($param1, $param2, $param3) {
        $this->db->where($param2, $param3);

        $qry = $this->db->delete($param1);

        return $qry;
    }

    /* ==========================================================================
     * Begin code by ardzix
     * ========================================================================== */

    function updataMultiWhere($update, $where) {

        /* =========================================================
         * contoh
         *
         * 	$update=array('prosestran',$data);
         * 	$where=array(array('TRANSAKSIPRAID',$tranId),array('PROSESID',$prosesId));
         * 	$qry = $this->model_core->updataMultiWhere($update,$where);
         *
         * ========================================================== */

        for ($i = 0; $i < count($where); $i++) {
            $this->db->where($where[$i][0], $where[$i][1]);
        }

        $qry = $this->db->update($update[0], $update[1]);


        if ($qry) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getDataSpecified($table, $field) {
        /* ==========================================================================
         * getDataSpecified sama seperti fungsi get_data(), namun field tabel yg di 
         * 	load terspesifikasi (untuk meminimalisir pengambilan data
         * 
         * Created by Arif Dzikrullah 201401221050
         *
         * Contoh penggunaan
         * 	$field=array('CUSTOMERID', 'NAMACUST', 'NOIDPERSONALCUST'); 		<- Array field mana saja yang ingin diambil
         *  $table="customer";  												<- Nama table 
         * 	$data['dataTableCustomer'] = $this->model_core->getDataSpecified($table,$field);
         *
         * ========================================================================== */


        $this->db->select($this->imploder($field));
        $qry = $this->db->get($table);

        return $qry->result();
    }

    function getDataSpecifiedWthWhere($table, $field, $where) {
        /* =======================================================================================
         * getDataSpecified sama seperti fungsigetDataSpecified(), namun ditambah parameter where
         * 
         * Created by Arif Dzikrullah 201401221050
         *
         * Contoh penggunaan
         * 	$where=array('CUSTOMERID !=', '2'); 		<- Array where
         *
         * ======================================================================================= */



        $this->db->select($this->imploder($field));
        $this->db->where($where[0], $where[1]);
        $qry = $this->db->get($table);

        return $qry->result();
    }

    function getDataSpecifiedWthWhere2($data, $where) {

        /* =========================================================
         * contoh
         *
         * 	$data=array('prosestran',array('FIELD','FIELD'));
         * 	$where=array(array('TRANSAKSIPRAID',$tranId),array('PROSESID',$prosesId));
         * 	$qry = $this->model_core->getDataSpecifiedWthWhere2($data,$where);
         *
         * ========================================================== */



        $this->db->select($this->imploder($data[1]));

        for ($i = 0; $i < count($where); $i++) {
            $this->db->where($where[$i][0], $where[$i][1]);
        }

        $qry = $this->db->get($data[0]);

        return $qry->result();
    }

    function getDataSpecifiedQuery($query) {
        /* =======================================================================================

         *
         * ======================================================================================= */



        $qry = $this->db->query($query);
        return $qry->result();
    }

    function getDataSpecifiedQuery2($query) {
        /* =======================================================================================

         *
         * ======================================================================================= */


        $qry = $this->db->query($query);
        return $qry->result_array();
    }

    function imploder($par) {

        $fields = "";

        for ($i = 0; $i < count($par); $i++) {

            if ($i == 0)
                $fields = $fields . $par[$i];
            else
                $fields = $fields . "," . $par[$i];
        }

        return $fields;
    }

    function whereImploder($par, $val, $com, $fun) {

        $fields = "WHERE ";



        for ($i = 0; $i < count($par); $i++) {

            if ($i == 0)
                $fields = $fields . $par[$i] . " " . $com[$i] . " " . $val[$i];
            else
                $fields = $fields . " " . $fun[$i] . " " . $par[$i] . " " . $com[$i] . " " . $val[$i];
        }

        return $fields;
    }

    /* ==========================================================================
     * End code by ardzix
     * ========================================================================== */


    /*
      Author: Taufik
      Ex :	$tabele='customer'
      $join = array(array('customertrans','customertrans.customerid', 'customer.customerid'))
      $field = array('customer.id', customer.namacust)
      $where = array(array(customer.customerid,1),array(customertrans.transaksipraid,1));

     */

    function getDataSpecifiedJoin($table, $join, $field, $where = '') {


        $this->db->select($this->imploder($field));
        $this->db->from($table);

        if (!empty($join) and ((is_array($join)) or ($join instanceof Traversable))) {
            foreach ($join as $row) {
                $this->db->join($row[0], $row[1] . '=' . $row[2]);
            }
        }

        if (!empty($where) and ((is_array($where)) or ($where instanceof Traversable))) {
            foreach ($where as $row) {
                $this->db->where($row[0], $row[1]);
            }
        }

        $qry = $this->db->get();

        return $qry->result();
    }

    function join() {

        $this->db->select('transaksipra.TRANSAKSIPRAID, covernote.TGLAKAD');
        $this->db->distinct('transaksipra.TRANSAKSIPRAID');
        $this->db->from('transaksipra');
        $this->db->where('EMPLOYEEID', $this->session->userdata['EMPLOYEEID']);
        $this->db->join('covernote', 'covernote.TRANSAKSIPRAID = transaksipra.TRANSAKSIPRAID');
        $qry = $this->db->get();
        return $qry->result();
    }
    
    function joinAppv() {

        $this->db->select('transaksipra.TRANSAKSIPRAID, covernote.TGLAKAD');
        $this->db->distinct('transaksipra.TRANSAKSIPRAID');
        $this->db->from('transaksipra');
        $this->db->join('aktatran', 'aktatran.TRANSAKSIPRAID = transaksipra.TRANSAKSIPRAID');
        $this->db->join('eskalasi', 'eskalasi.AKTATRANID = aktatran.AKTATRANID ');
        $this->db->join('covernote', 'covernote.TRANSAKSIPRAID = transaksipra.TRANSAKSIPRAID');
        $this->db->where('eskalasi.target', $this->session->userdata['EMPLOYEEID']);
        $qry = $this->db->get();
        return $qry->result();
    }
    
    function joinAppv2($transaksipraId) {
        $this->db->select('*');
        $this->db->from('aktatran');
        $this->db->join('eskalasi', 'eskalasi.AKTATRANID = aktatran.AKTATRANID');
        $this->db->where('TRANSAKSIPRAID', $transaksipraId);
        $this->db->where('eskalasi.TARGET', $this->session->userdata['EMPLOYEEID']);
        $qry = $this->db->get();
        return $qry->result();
    }
    
    /* =========================================================
         *  MONITORING BARU
         * ========================================================== */
    
    function monitoring(){
        $qry = $this->db->query('SELECT '
                . 'transaksipra.TRANSAKSIPRAID, aktatran.AKTATRANID, prosestran.PROSESTRANID, covernote.COVERNOTEID, '
                . 'NOCOVERNOTE, covernote.TGLSELESAI AS TGLSELESAI_COVERNOTE, '
                . 'DEVELOPERID, BANKREKID, transaksipra.EMPLOYEEID, AKTAID, '
                . 'PROSESID, STATUSPROSES, prosestran.TGLMASUK, prosestran.TGLDEADLINE, '
                . 'aktatran.AKTATRANID, NOAKTA, aktatran.TGLMULAI AS TGLAKTA, TGLAKAD, NOTARISAKTA,'
                . 'prosestran.TGLSELESAI, TGLPENYERAHAN, prosestran.EMPLOYEEID AS PJPROSES, SERTIFIKATID '
                . 'FROM transaksipra '
                . 'JOIN covernote ON transaksipra.TRANSAKSIPRAID=covernote.TRANSAKSIPRAID '
                . 'JOIN aktatran ON aktatran.TRANSAKSIPRAID=transaksipra.TRANSAKSIPRAID '
                . 'LEFT JOIN prosestran ON prosestran.AKTATRANID=aktatran.AKTATRANID '
                . 'LEFT JOIN aktasertifikat ON aktasertifikat.AKTATRANID=aktatran.AKTATRANID '
                . 'ORDER BY TANGGALPRA DESC');

        return $qry->result();
    }
    
    function getTransaksiById($transaksipraid){
        $strQry = 'SELECT transaksipra.TRANSAKSIPRAID, '
                . 'NOCOVERNOTE, covernote.TGLSELESAI AS TGLSELESAI_COVERNOTE, '
                . 'DEVELOPERID, transaksipra.BANKREKID, transaksipra.EMPLOYEEID, aktatran.AKTAID, '
                . 'prosestran.PROSESID, STATUSPROSES, prosestran.TGLMASUK, prosestran.TGLDEADLINE, '
                . 'aktatran.AKTATRANID, NOAKTA, TGLAKAD, NOTARISAKTA,'
                . 'TGLPENYERAHAN, prosestran.EMPLOYEEID AS PJPROSES, SERTIFIKATID '
                . 'FROM transaksipra '
                . 'JOIN covernote ON transaksipra.TRANSAKSIPRAID=covernote.TRANSAKSIPRAID '
                // . 'JOIN customertrans ON customertrans.TRANSAKSIPRAID=transaksipra.TRANSAKSIPRAID '
                // . 'JOIN customer ON customertrans.CUSTOMERID = customer.CUSTOMERID '
                // . 'LEFT JOIN employee AS PEMBUATAKTA ON transaksipra.EMPLOYEEID = PEMBUATAKTA.EMPLOYEEID '
                // . 'LEFT JOIN employee AS SUPERVISOR ON transaksipra.SUPERVISOR = SUPERVISOR.EMPLOYEEID '
                . 'LEFT JOIN aktatran ON aktatran.TRANSAKSIPRAID = transaksipra.TRANSAKSIPRAID '
                . 'LEFT JOIN prosestran ON prosestran.AKTATRANID = aktatran.AKTATRANID '
                . 'LEFT JOIN proses ON prosestran.PROSESID = proses.PROSESID '
                . 'LEFT JOIN kantorproses ON proses.KANTORPROSESID = kantorproses.KANTORPROSESID '
                . 'LEFT JOIN aktasertifikat ON aktasertifikat.AKTATRANID = aktatran.AKTATRANID '
                // . 'LEFT JOIN employee AS EMPPJPROSES ON EMPPJPROSES.EMPLOYEEID = prosestran.EMPLOYEEID '
                . 'LEFT JOIN bankrekening ON bankrekening.BANKREKID = transaksipra.BANKREKID '
                . 'WHERE '
                . 'transaksipra.TRANSAKSIPRAID IN ('.implode(",",$transaksipraid).') '
                . 'ORDER BY TANGGALPRA DESC';
                $qry = $this->db->query($strQry);
        return $qry->result();
    }

    function monitoring_filter($param1, $param2,$param3 =''){
        // p_code($param1 . " - " . $param2);
        if($param2=='1970-01-01' || $param2=='1969-12-31')
            $tglAkadWhere = '';
        else
            $tglAkadWhere = 'TGLAKAD BETWEEN "'.$param1.'" AND  "'.$param2.'"  AND';
            $strQry = 'SELECT transaksipra.TRANSAKSIPRAID, '
                . 'NOCOVERNOTE, covernote.TGLSELESAI AS TGLSELESAI_COVERNOTE, '
                . 'customertrans.CUSTOMERID, transaksipra.DEVELOPERID, transaksipra.BANKREKID, transaksipra.EMPLOYEEID, aktatran.AKTAID, '
                . 'prosestran.PROSESID, STATUSPROSES, prosestran.TGLMASUK, prosestran.TGLDEADLINE, '
                . 'aktatran.AKTATRANID, NOAKTA, TGLAKAD, NOTARISAKTA,'
                . 'TGLPENYERAHAN, prosestran.EMPLOYEEID AS PJPROSES, SERTIFIKATID '
                . 'FROM transaksipra '
                . 'JOIN covernote ON transaksipra.TRANSAKSIPRAID=covernote.TRANSAKSIPRAID '
                . 'JOIN customertrans ON customertrans.TRANSAKSIPRAID=transaksipra.TRANSAKSIPRAID '
                . 'JOIN customer ON customertrans.CUSTOMERID = customer.CUSTOMERID '
                . 'LEFT JOIN employee AS PEMBUATAKTA ON transaksipra.EMPLOYEEID = PEMBUATAKTA.EMPLOYEEID '
                . 'LEFT JOIN employee AS SUPERVISOR ON transaksipra.SUPERVISOR = SUPERVISOR.EMPLOYEEID '
                . 'LEFT JOIN aktatran ON aktatran.TRANSAKSIPRAID = transaksipra.TRANSAKSIPRAID '
                . 'LEFT JOIN prosestran ON prosestran.AKTATRANID = aktatran.AKTATRANID '
                . 'LEFT JOIN proses ON prosestran.PROSESID = proses.PROSESID '
                . 'LEFT JOIN kantorproses ON proses.KANTORPROSESID = kantorproses.KANTORPROSESID '
                . 'LEFT JOIN aktasertifikat ON aktasertifikat.AKTATRANID = aktatran.AKTATRANID '
                . 'LEFT JOIN employee AS EMPPJPROSES ON EMPPJPROSES.EMPLOYEEID = prosestran.EMPLOYEEID '
                . 'LEFT JOIN bankrekening ON bankrekening.BANKREKID = transaksipra.BANKREKID '
                . 'LEFT JOIN developer ON transaksipra.DEVELOPERID = developer.DEVELOPERID '
                . 'WHERE '
                . $tglAkadWhere
                . ' ( transaksipra.TRANSAKSIPRAID LIKE "%'.$param3.'%" OR '
                . 'NOCOVERNOTE LIKE "%'.$param3.'%" OR '
                . 'NAMACUST LIKE "%'.$param3.'%" OR '
                . 'PEMBUATAKTA.NAMALENGKAP LIKE "%'.$param3.'%" OR '
                . 'SUPERVISOR.NAMALENGKAP LIKE "%'.$param3.'%" OR '
                . 'EMPPJPROSES.NAMALENGKAP LIKE "%'.$param3.'%" OR '
                . 'proses.PROSESDESC LIKE "%'.$param3.'%" OR '
                . 'kantorproses.kantorproses LIKE "%'.$param3.'%" OR '
                . 'bankrekening.BANKREKDESC LIKE "%'.$param3.'%" OR '
                . 'aktatran.NOTARISAKTA LIKE "%'.$param3.'%" OR '
                // . 'DEVELOPERID LIKE "%'.$param3.'%" OR '
                // . 'BANKREKID LIKE "%'.$param3.'%" OR '
                . 'transaksipra.EMPLOYEEID LIKE "%'.$param3.'%" OR '
//                . 'AKTAID LIKE "%'.$param3.'%" OR '
               // . 'PROSESID LIKE "%'.$param3.'%" OR '
                // . 'STATUSPROSES LIKE "%'.$param3.'%" OR '
//                . 'prosestran.TGLMASUK LIKE "%'.$param3.'%" OR '
//                . 'prosestran.TGLDEADLINE LIKE "%'.$param3.'%" OR '
//                . 'aktatran.AKTATRANID LIKE "%'.$param3.'%" OR '
                . 'NOAKTA LIKE "%'.$param3.'%" OR '
                . 'SERTIFIKATID LIKE "%'.$param3.'%" )'
                . ' GROUP BY transaksipra.TRANSAKSIPRAID';
                $qry = $this->db->query($strQry);
        // p_code($strQry);
        // p_code($qry->result());
        //exit;
        return $qry->result();
    }
    
    function lastTransID(){
        $qry = $this->db->query('select TRANSAKSIPRAID FROM transaksipra ORDER BY TRANSAKSIPRAID DESC LIMIT 1');
        
        return $qry->result();
    }
    
    function lastAktatranId(){
        $qry = $this->db->query('select AKTATRANID FROM aktatran ORDER BY AKTATRANID DESC LIMIT 1');
        
        return $qry->row_array();
    }
    
    function cek_covernote($param){
        $qry = $this->db->query('SELECT count(NOCOVERNOTE) AS count FROM covernote WHERE NOCOVERNOTE in ('.$param.')')->result();
        
        if($qry[0]->count > 0){
            return 1;
        }else{
            return 0;
        }
    }

}
