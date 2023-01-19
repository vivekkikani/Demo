<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Leaveapplication_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getstatus(){
        $user=$this->db->get('employee_leave_application')
                       ->result_array();
        return  $user;
    }

    public function get(){
        $user=$this->db->select('id,status')
                        ->get('employee_leave_application')
                       ->result_array();
        return  $user;
    }

    public function userupdate($data){  
        $status = array('status'=>$data['status']         
        );
        return  $this->db->where('id')
                        ->update('employee_leave_application',$status);
    }

}

?>