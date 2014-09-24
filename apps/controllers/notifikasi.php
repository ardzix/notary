<?php

/*
 * Project Name: notary
 * File Name: dashboard
 * Created on: 07 Jan 14 @7:54:56
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

class Notifikasi extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->model_core->check_login();
        $this->load->model(array('m_prosestran', 'm_aktatran', 'm_akta', 'm_proses', 'm_statusproses', 'm_notifikasi'));
    }

    public function index() {
        /*
          public static $not = 1;
          public static $spv = 2;
          public static $pic = 3;
         */
        $data['title'] = NOTARY_TITLE . 'Notifikasi';
        $userSession = $this->session->userdata('EMPLOYEEID');
        $data['aktatran'] = $this->m_aktatran->getDataByJoinAktatranProsesTran($userSession);
        $data['notifikasi'] = $this->model_core->notifikasi($this->session->userdata('EMPLOYEEID'));

        $this->load->view('notifikasi', $data);

        /*
          $empid = $this->session->userdata['EMPLOYEEID'];

          $table = 'employee';
          $join = array(array('jabatan','employee.jabatanid', 'jabatan.jabatanid'));
          $field = array('GRUP');
          $where = array(array('employee.employeeid',$empid)));

          $grup = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where);

          if($grup[0]->GRUP == $not){

          } else if($grup[0]->GRUP == $spv){

          } else {

          }
         */
    }

    public function redirect() {
        $data = array(
            'STATUS' => 1
        );

        $qry = $this->model_core->update('notifikasi', 'NOTIFIKASIID', $this->uri->segment(3), $data);

        if ($qry) {
            $link = $this->model_translate->dynamicTranslate('notifikasi', 'NOTIFIKASIID', $this->uri->segment(3), 'LINK');
            redirect($link);
        }
    }

    public function cekNotifikasi() {
        $id = $this->session->userdata('EMPLOYEEID');

        $jmlNotif = $this->m_notifikasi->getNotifikasi($id)->num_rows();

        $pesan = $this->m_notifikasi->getNotifikasi($id)->result();

        if ($jmlNotif > 0) {
            foreach ($pesan as $ps) {
                $link = '<a href="' . base_url() . $ps->LINK . '" target="blank">' . $ps->MESSAGE1 . '</a>';
                echo $jmlNotif . "|" . $ps->STATUS . "|" . $ps->TIPE . "|" . $ps->MESSAGE1 . "|" . $ps->MESSAGE2 . "|" . $link . "|" . $ps->NOTIFIKASIID . "|" . $ps->TIMESTAMP;
            }
        }
        /* if($pesan === FALSE) {
          die(mysql_error()); // TODO: better error handling
          }
          $message= mysql_fetch_array($pesan);

          if($jmlNotif>0){
          echo $jmlNotif."|".$message["TIPE"]."|".$message["MESSAGE1"]."|".$message["MESSAGE2"]."|".$message["LINK"]."|".$message["TIMESTAMP"];
          } */
        //$userid = $_SESSION['userid'];
        /* $pesan = mysql_query("SELECT * FROM notifikasi
          WHERE EMPLOYEEID='".$id."' and STATUS='0' order by NOTIFIKASIID desc");

          if($pesan === FALSE) {
          die(mysql_error()); // TODO: better error handling
          }
          $message= mysql_fetch_array($pesan);
          $j = mysql_num_rows($pesan);

          $js = mysql_fetch_array($pesan);
          if($j>0){
          echo $j."|".$js["dari"]."|".$js["pesan"]."|".$js["nomor"]."|".$js["sending_Notif"];
          } */
    }

    function success($id) {
        //$id=$this->session->userdata('EMPLOYEEID');
        $data = array(
            'STATUS' => 1
        );
        $this->m_notifikasi->successNotifikasi($id, $data);
    }

}
