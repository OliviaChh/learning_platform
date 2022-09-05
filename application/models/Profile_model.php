<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile_model extends CI_Model{
    function getdata() {
        $query = $this->db->get ( 'users' ); // get users column in database 
        return $query; // return the info
    }
}
?>
