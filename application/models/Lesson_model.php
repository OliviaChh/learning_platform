<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lesson_model extends CI_Model{
    function getdata() {
        $query=$this->db->query("select username, lessonname, fileprice, fileintro from files");
        //$query = $this->db->get ( 'files' ); // get users column in database 
        return $query; // return the info
    }
    
}
?>