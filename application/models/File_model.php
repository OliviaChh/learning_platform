<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here 
 class File_model extends CI_Model{

    // upload file
    public function upload($filename, $path, $username){

        $data = array(
            'filename' => $filename,
            'path' => $path,
            'username' => $username,
        );
        $query = $this->db->insert('files', $data);

    }

    public function insert_data($lessonname, $fileprice, $fileintro, $username, $filename, $path){
		$query=$this->db->query("update files set lessonname='$lessonname',fileprice='$fileprice',fileintro='$fileintro' 
        where username='$username' and path='$path' and filename='$filename'");
	}
	
    public function insert_comment($comment){
		$query=$this->db->query("insert into comment set comment='$comment'");
	}

    function fetch_data($query){
        if($query == '')
        {
            return null;
        }else{
            $this->db->select("*");
            $this->db->from("files");
            $this->db->like('filename', $query);
            $this->db->or_like('username', $query);
            $this->db->order_by('filename', 'DESC');
            return $this->db->get();
        }
    }
}
