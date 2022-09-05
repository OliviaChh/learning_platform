<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Active extends CI_Controller {
 
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('session');
	}

	public function activate(){
		$user_id = $this->uri->segment(3);
		$ver=$this->db->query("update users set ver='Yes' where id ='$user_id'");
		
		if($ver){
			echo "User activated successfully";
			// $this->session->set_flashdata('message', 'User activated successfully');
		}else{
			echo "Something went wrong in activating account";
			$this->session->set_flashdata('message', 'Something went wrong in activating account');
		}
		
		// redirect('register');
	}
}


 