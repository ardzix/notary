<?php

/*
 * @author : Pt. Kiwari Usaha Nusantara
 */

class Login extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        if($this->session->userdata('logged_in') == TRUE){
            redirect('notifikasi');
        }
        
        $data['title'] = NOTARY_TITLE . 'Login';
        
        $this->load->view('index', $data);
    }
}