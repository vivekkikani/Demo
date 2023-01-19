<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Newemployee_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function technologyget(){
        $user=$this->db->where('technology','id')
                       ->or_where('status','1')
                       ->get('technology')->result_array();
        return  $user;
    }

    public function add_newemployee($document,$arr){  
        $newemployee=array(
                "name"=>$this->input->post('name'),
                "email"=>$this->input->post('email'),
                "username"=>$this->input->post('username'),
                "technology"=>$arr,
                "resume"=>$document,
                "role"=>'0',
                "salary"=>$this->input->post('salary'),
                "password"=>md5($this->input->post('password')));
        return $this->db->insert('employeediteles',$newemployee);
    }
    
    public function getemployee(){
        $user=$this->db->get('employeediteles')->result_array();
        return  $user;
    }

    public function find_employee($id){
        $q=$this->db->select()
                    ->where('id',$id)
                    ->get('employeediteles');
        return  $q->row_array();
    }
    
    public function find_resume(){
        $q=$this->db->select('resume')
                    ->get('employeediteles');
        return  $q->row_array();
    }

    public function employee_Update($data,$arr,$document){
        $employee = array('name'=>$data['name'],
                       'email'=>$data['email'],
                       'username'=>$data['username'],
                       'technology'=>$arr,
                       'resume'=>$document,
                       'salary'=>$data['salary']);
        return  $this->db->where('id',$data['newemployeeid'])
                        ->update('employeediteles',$employee);
    }

    public function deletedata($id){
        $this->db->where('id', $id);
        $this->db->delete('employeediteles');
    }
}

?>