<?php

/*
 * Project Name: notary
 * File Name: chat
 * Created on: 09 Jan 14 - 11:36:02
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

class Chating extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->model_core->check_login();
    }

    public function index() {
        $data['title'] = NOTARY_TITLE . 'Chat';
        $data['user'] = $this->model_core->get_where_result('user', array('online' => 1));

        $this->load->view('chating', $data);
    }

}