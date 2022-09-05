<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class Lesson2 extends CI_Controller {
    public function index() {
		$this->load->view('template/header'); 
        $this->load->model ( 'Lesson2_model' ); // load model


		$query = $this->Lesson2_model->getdata ( 'files' )->result_array (); // use the getdata function of Lesson2_model
        $data = array ( 'data' => $query);

		$query2 = $this->Lesson2_model->getdata2 ( 'comment' )->result_array (); // use the getdata function of Lesson2_model
        $data2 = array ( 'data2' => $query2);

		$datamerge = array_merge($data, $data2);

    	
		if (!$this->session->userdata('logged_in'))//check if user already login
		{	
			if (get_cookie('remember')) { // check if user activate the "remember me" feature  
				$username = get_cookie('username'); //get the username from cookie
				$password = get_cookie('password'); //get the username from cookie
				if ( $this->user_model->login($username, $password) )//check username and password correct
				{
					$user_data = array('username' => $username,'logged_in' => true );
					$this->session->set_userdata($user_data); //set user status to login in session
					$this->load->view ('lesson2', $datamerge);

				}
			}else{
				redirect('login'); //if user already logined direct user to home page
			}
		}else{
			$this->load->view ('lesson2', $datamerge);

		}
    }

}