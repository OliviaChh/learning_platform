<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller
{
    public function index()
    {
		$this->load->view('template/header'); 
    	if (!$this->session->userdata('logged_in'))//check if user already login
		{	
			if (get_cookie('remember')) { // check if user activate the "remember me" feature  
				$username = get_cookie('username'); //get the username from cookie
				$password = get_cookie('password'); //get the username from cookie
				if ( $this->user_model->login($username, $password) )//check username and password correct
				{
					$user_data = array('username' => $username,'logged_in' => true );
					$this->session->set_userdata($user_data); //set user status to login in session
					$this->load->view('file',array('error' => ' ')); //if user already logined show upload page
				}
			}else{
				redirect('login'); //if user already logined direct user to home page
			}
		}else{
			$this->load->view('file',array('error' => ' ')); //if user already logined show login page
		}
		$this->load->view('template/footer');

	}
	
    public function do_upload() {
		$this->load->model('file_model');
		$this->load->database();
		$this->load->helper('url');
		
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg|pdf|mp4|mkv';
		$config['max_size'] = 10000;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile')) {
            $this->load->view('template/header');
            $data = array('error' => $this->upload->display_errors());
            $this->load->view('file', $data);
            $this->load->view('template/footer');
			
        } else {
			$lessonname=$this->input->post('lessonname');
			$fileprice=$this->input->post('fileprice');
			$fileintro=$this->input->post('fileintro');

			$this->file_model->upload($this->upload->data('file_name'), $this->upload->data('full_path'),$this->session->userdata('username'));

			$this->file_model->insert_data($lessonname,$fileprice,$fileintro,$this->session->userdata('username'),$this->upload->data('file_name'), $this->upload->data('full_path'));


            $this->load->view('template/header');
            $this->load->view('file', array('error' => 'File upload success. <br/>'));
            $this->load->view('template/footer');
        }
	}
}


