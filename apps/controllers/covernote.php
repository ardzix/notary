<?php

/*
 * Project Name: notary
 * File Name: test_pdf
 * Created on: 29 Jan 14 - 13:34:22
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
class Covernote extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function cetak() {
        $this->load->library('pdf');
	$this->pdf->load_view('covernote');
	$this->pdf->render();
        $this->pdf->set_paper('A4');
	$this->pdf->stream('Covernote.pdf');
    }
    
    public function lihat(){
        $this->load->view('covernote');
    }
}