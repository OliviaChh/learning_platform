<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lesson2_model extends CI_Model{
    function getdata() {
        $query=$this->db->query("select username, lessonname, fileprice, fileintro from files where id='27' ");
        return $query; // return the info
    }
    function getdata2() {
        $query2=$this->db->query("select comment from comment");
        return $query2; // return the info
    }
    
}
?>