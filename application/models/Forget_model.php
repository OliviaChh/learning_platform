<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Forget_model extends CI_Model{
    
    public function check_data($username){
        
		$query=$this->db->query("select * from users where (username='".$username."')");
        
        $from_email = "s4557371@student.uq.edu.au"; 
        
		$row = $query->num_rows();
		if($row){
            $data = $this->db->query("select password from users where username='$username'");
            $this->email->from($from_email, 'Mypro'); 
            $this->email->to($username);
            $this->email->subject('Your password'); 
            $row = $data->row();
            $this->email->message($row->password);
            $this->email->send();
			$this->session->set_flashdata("email_sent", "Email sent successful" );
        }else{
            $this->session->set_flashdata("email_sent","Error, This Email not registered yet."); 
        }

        redirect('forget');
    }
}
?>