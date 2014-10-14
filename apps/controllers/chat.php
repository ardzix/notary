<?php

/*
 * Project Name: notary
 * File Name: chat
 * Created on: 09 Jan 14 - 15:26:20
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

class Chat extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->model_core->check_login();
    }

    public function index() {
        $field = array('USERID', 'USERNAME', 'EMPLOYEEID', 'STATUSUSERID');
        $table = 'user';
        $data['user'] = $this->model_core->getDataSpecified($table, $field);

        $this->load->view('chat');
    }

}