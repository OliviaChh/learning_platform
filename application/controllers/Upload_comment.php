<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_comment extends CI_Controller{
    public function do_upload() {
		$this->load->model('file_model');
		$this->load->database();
		$this->load->helper('url');

			$comment=$this->input->post('comment');
			$this->file_model->insert_comment($comment);

            redirect(base_url('lesson2'));	

	}
}

