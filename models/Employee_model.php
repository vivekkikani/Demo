<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    // public function getemployee(){
    //     $id=$this->session->userdata('id');
    //     $user=$this->db->select()
    //                    ->where(['id'=>$id])
    //                 ->get('employeediteles')->result_array();
    //                 // echo '<pre>';
    //                 // print_r($user);die;
    //     return  $user;
    // }

    public function technologyget(){
        $user=$this->db->where('technology','id')
                       ->or_where('status','1')
                       ->get('technology')->result_array();
        return  $user;
    }

    public function find_user(){
        $id=$this->session->userdata('id');
        $q=$this->db->select()
                    ->where('id',$id)
                    ->get('employeediteles');
                    // print_r($q);die;
        return  $q->row_array();
    }
    
    public function find_resume(){
        $id=$this->session->userdata('id');
        $q=$this->db->select('resume')
                    ->where('id',$id)
                    ->get('employeediteles');
        return  $q->row_array();
    }

    public function userUpdate($data,$arr,$document,$id){
        $employee = array('name'=>$data['name'],
                       'email'=>$data['email'],
                       'username'=>$data['username'],
                       'technology'=>$arr,
                       'resume'=>$document,
                       'salary'=>$data['salary']);
        return  $this->db->where('id',$data['newemployeeid'],$id)
                        ->update('employeediteles',$employee);
    }

}

?>