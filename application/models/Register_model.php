<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register_model extends CI_Model{

	public function insert_data($username,$password,$name){

		$query=$this->db->query("select * from users where (username='".$username."')");
		$row = $query->num_rows();
		if($row){
			$this->session->set_flashdata('warning','This user already registered!');
		}else{
			$query=$this->db->query("insert into users set username='$username',password='$password',name='$name'");
		
			//send Verification mail
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'mailhub.eait.uq.edu.au',
					'smtp_port' => 25,
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE ,
					'mailtype'  => 'html',
					'starttls'  => true,
					'newline'   => "\r\n"
				);
				$this->email->initialize($config);

				$user_id =$this->db->query("select id from users where username ='$username'");
				$row = $user_id->row();
				$string1 = strval($row->id);

				$message = "
						<html>
						<head>
							<title>Verification mail</title>
						</head>
						<body>
							<h2>Thank you for Registering.</h2>
							<p>Your Account:</p>
							<p>Email: ".$username."</p>
							<p>Please click the link below to activate your account.</p>
							<h4>".base_url()."active/activate/".$string1."</h4>
							<h4><a href='".base_url()."active/activate/".$string1."'>Activate My Account</a></h4>
						</body>
						</html>
							";

				$from_email = "s4557371@student.uq.edu.au";
				$this->email->from($from_email, 'Mypro'); 
				$this->email->to($username);
				$this->email->subject('Verification mail'); 
				$this->email->message($message);
				$this->email->send();

			$this->session->set_flashdata('success','You are registered successfully!');
		}
		// $this->load->view('register',@$data);
		
		}
	}
?>