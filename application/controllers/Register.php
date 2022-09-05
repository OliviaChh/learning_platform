<?php
class Register extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('template/header');
		$this->load->model('Register_model'); ///load model
		$this->load->library('session');
		$this->load->helper('captcha');
	}

	public function index(){
		
		//captcha setting send to captcha_helper
		$config = array(
            // 'word'          => 'Random word',
            'img_path'      => './captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'font_path'     => 'system/fonts/texb.ttf',
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 18
        );

		//store old one
		$sessCaptcha = $this->session->userdata('captchaCode');

        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        $sessCaptcha2 = $this->session->userdata('captchaCode');

        // Pass captcha image to view
        $data['captchaImg'] = $captcha['image'];
        

		//personal info setting
		$rules = array(
				[
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required',
				],
				[
					'field' => 'new_password',
					'label' => 'New Password',
					'rules' => 'callback_valid_password',
				],
				[
					'field' => 'confirm_password',
					'label' => 'Confirm Password',
					'rules' => 'matches[new_password]',
				],
				[
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required',
				],
			);
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run()==FALSE){
			// $this->load->view('register',$data);
		}else{
			$username=$this->input->post('email');
			$password=$this->input->post('new_password');
			$name=$this->input->post('name');
			$inputCaptcha = $this->input->post('captcha');

			// If captcha form is submitted
            if($inputCaptcha == $sessCaptcha){
			$this->Register_model->insert_data($username,$password,$name);
			}$this->session->set_flashdata('warning','Wrong captcha text');
			
			// redirect(base_url('register'));
		}$this->load->view('register',$data);
	}
	
	//Create strong password 
	public function valid_password($password = ''){
		$password = trim($password);

		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

		if (empty($password)){
			$this->form_validation->set_message('valid_password', 'The {field} field is required.');
			return FALSE;
		}

		if (preg_match_all($regex_lowercase, $password) < 1){
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
			return FALSE;
		}

		if (preg_match_all($regex_uppercase, $password) < 1){
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1){
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
			return FALSE;
		}

		if (preg_match_all($regex_special, $password) < 1){
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>ยง~'));
			return FALSE;
		}

		if (strlen($password) < 5){
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');
			return FALSE;
		}

		if (strlen($password) > 32){
			$this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
			return FALSE;
		}
		return TRUE;
	}

}

