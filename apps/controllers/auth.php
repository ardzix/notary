<?php

/*
 * Project Name: notary
 * File Name: auth
 * Created on: 09 Jan 14 - 10:36:43
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        
        if($this->input->post('username') == NULL && $this->input->post('password') == NULL){
            redirect();
        }
        $data = array(
            'USERNAME' => $this->input->post('username'),
            'PASSWORD' => md5($this->input->post('password'))
        );

        $update = $this->model_core->update_login('user', $data, array('online' => 1));
        if ($update) {
            $login = $this->model_core->login($this->input->post('username'), $this->input->post('password'));

            if ($login <> FALSE) {
                $sess_array = array();
                foreach ($login as $row) {
                    $sess_array = array(
                        'USERID' => $row->USERID,
                        'USERNAME' => $row->USERNAME,
                        'EMPLOYEEID' => $row->EMPLOYEEID,
                        'OTORITASID' => $row->OTORITASID,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($sess_array);
                }
                redirect('notifikasi');
            }else{
                redirect('?ShowDiv=true');
            }
        }
    }

    public function logout() {
        $data = array(
            'USERID' => $this->session->userdata('USERID'),
            'USERNAME' => $this->session->userdata('USERNAME')
        );
        
        $qry = $this->model_core->update_login('user', $data, array('online' => 0));
        

        if ($qry) {
            $this->session->sess_destroy();

            redirect();
        }
    }

}