<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function login_validation($email,$password){
        $q=$this->db->where(['email'=>$email,'password'=>$password,'role'=>2])
                    ->get('employeediteles');
            if($q->num_rows()){
                return $q->row();
            }else{
                return false;
            }
    }
}
?>