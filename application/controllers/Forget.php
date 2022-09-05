<?php 
   class Forget extends CI_Controller {
      
      public function index() { 
        $this->load->view('template/header'); 
        $this->load->view('forget');
      } 


      public function send_mail() {

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
      
      $to_email = $this->input->post('email');
      
       //Send mail 
       $this->load->model('Forget_model'); 
       $this->Forget_model->check_data($to_email);

   } 
} 
?>