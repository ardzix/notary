<?php

/*
 * Project Name: notary
 * File Name: model_translate
 * Created on: 16 Jan 14 - 15:19:34
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

class Model_translate extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function jabatan($param) {
        $qry = $this->db->get_where('jabatan', array('JABATANID' => $param));

        $name = $qry->row_array();
        return $name['JABATANDESC'];
    }

    function gender($param) {

        $qry = $this->db->get_where('gender', array('GENDER' => $param));

        $name = $qry->row_array();
        return $name['GENDERDESC'];
    }

    function identitaspersonal($param) {

        $qry = $this->db->get_where('identitaspersonal', array('IDENTITASPERSONALID' => $param));

        $name = $qry->row_array();
        return $name['IDENTITASPERSONALDESC'];
    }

    function title($param) {

        $qry = $this->db->get_where('title', array('TITLEID' => $param));

        $name = $qry->row_array();
        return $name['TITLEDESC'];
    }

    function statusdisplay($param) {

        $qry = $this->db->get_where('title', array('STATUSDISPLAYID' => $param));

        $name = $qry->row_array();
        return $name['STATUSDISPLAYDESC'];
    }

    public function pekerjaan($param) {

        $qry = $this->db->get_where('pekerjaan', array('PEKERJAANID' => $param));

        $name = $qry->row_array();
        return $name['PEKERJAANDESC'];
    }

    public function tipecustomer($param) {

        $qry = $this->db->get_where('tipecustomer', array('TIPECUSTID' => $param));

        $name = $qry->row_array();
        return $name['TIPECUSTDESC'];
    }

    public function dynamicTranslate($table, $kode, $param, $deskripsi) {

        /* ===========================================================================
         * 	Ini udah dibuat dinamis,, nanti pake yg ini aja.. :) by Ardzix 201401211425
         * =========================================================================== */

        if ($param != NULL) {
            $qry = $this->db->get_where($table, array($kode => $param));
            $name = $qry->row_array();
            return $name[$deskripsi];
        }else {
            return "-";
        }
    }

    public function employee($param) {

        $qry = $this->db->get_where('employee', array('EMPLOYEEID' => $param));

        $name = $qry->row_array();
        return $name['NAMALENGKAP'];
    }

    public function statususer($param) {

        $qry = $this->db->get_where('statususer', array('STATUSUSERID' => $param));

        $name = $qry->row_array();
        return $name['STATUSUSERDESC'];
    }

    public function otoritas($param) {

        $qry = $this->db->get_where('otoritas', array('OTORITASID' => $param));

        $name = $qry->row_array();
        return $name['OTORITASDESC'];
    }

    function Appv($id, $primarikey, $table) {

        $this->db->where($primarikey, $id);
        $hasil = $this->db->get($table)->row();

        return $hasil;
    }
    
    public function eskalasi($param1, $param2){
        $this->db->where('CURRENTPROSES', $param2);
        $this->db->where('AKTATRANID',$param1);
        
        $qry = $this->db->get('eskalasi');
        
        $name= $qry->row();
        return $name;
    }

}
