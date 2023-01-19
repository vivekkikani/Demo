<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Taskwork_model extends CI_Model {
    
    public function gettaskwork(){
        $id=$this->session->userdata('id');
        $q=$this->db->select('*')
                    ->join('task t','tu.task_id = t.id')
                    ->where('user_id',$id)
                    ->get('task_user tu');
    return  $q->result_array();
    }

    public function employeenameget(){
        $q=$this->db->select('id,name')
                    ->get('employeediteles');
                return  $q->result_array();
    }

    public function finduser(){
        $id=$this->input->post('id');
        $q=$this->db->select('user_id')
                    ->where('task_id',$id)
                    ->get('task_user');
        return  $q->result_array();
    }

    public function taskid(){
        $id=$this->input->post('id');
        $q=$this->db->select('*')
                    ->where('id',$id)
                    ->get('task');
    return  $q->result_array();
    }
}

?>