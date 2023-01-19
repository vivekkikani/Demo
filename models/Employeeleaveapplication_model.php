<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employeeleaveapplication_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function add(){  
        $data=array (
            "subject"=>$this->input->post('subject'),
            "detail"=>$this->input->post('detail'),
            "datefrom"=>$this->input->post('datefrom'),
            "dateto"=>$this->input->post('dateto'),
            "status"=>'1'
            
        );
        return $this->db->insert('employee_leave_application',$data);
    }

    public function getapplication(){
        // $id=$this->session->userdata('id');
        $user=$this->db->get('employee_leave_application')
                       ->result_array();
        return  $user;
    }

    public function getstatus(){
        // $id=$this->session->userdata('id');
        $user=$this->db->select('status,subject')
                        ->get('employee_leave_application')
                       ->result_array();
        return  $user;
    }
}
?>