<?php
Class service extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model(array('m_notifikasi'));
    }
	
	public function getnotif(){
		$emp_id = $this->uri->segment(3);
		$retval = $this->m_notifikasi->getServiceNotifikasi($emp_id);
		
		foreach($retval as $item){
			$item->TIPE = intval($item->TIPE);
			$item->STATUS = intval($item->STATUS);
			$item->NOTIFIKASIID = intval($item->NOTIFIKASIID);
		}
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($retval));
		
	}
	
	public function login(){
		$username = $this->input->get('u',true);
		$pass = $this->input->get('p',true);
		
		$result = $this->model_core->login($username, $pass);
		//p_code($result);
		if($result[0] != NULL){
			$retval["EMPLOYEEID"] = intval($result[0]->EMPLOYEEID);
			$retval["USERID"] = intval($result[0]->USERID);
		} else {
			$retval["EMPLOYEEID"] = 0;
			$retval["USERID"] = 0;
		}
			
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($retval));
	}
}

?>