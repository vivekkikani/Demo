<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Task_model extends CI_Model {

    public function employeenameget(){
        $q=$this->db->select('name,id')
                    ->get('employeediteles');
                return  $q->result_array();
    }

    public function employeeidget(){
        $q=$this->db->select('id')
                    ->get('employeediteles');
                return  $q->result_array();
    }
    
    public function getid(){
        return $this->db->insert_id();
    }

    public function add($last_id,$arr){  
        $data=array (
            "taskname"=>$this->input->post('taskname'),
            "description"=>$this->input->post('description'),
            "status"=>$this->input->post('status'),
            "datetocompleted"=>$this->input->post('datetocompleted')
        );
            $this->db->insert('task',$data);
            $last_id = $this->db->insert_id('task_user',$last_id,$arr);
            $explodedtask = explode(',',$arr);
            foreach ($explodedtask as $row){
                $last=array (
                        "user_id"=>$row,
                        "task_id"=>$last_id,
                );
                $this->db->insert('task_user',$last);
            }
            return true;
    }

    public function admingettask(){
      $sql= "SELECT *,t.id, Group_Concat(e.name SEPARATOR ',')names
            FROM task_user tu 
            JOIN employeediteles e ON FIND_IN_SET (e.id, tu.user_id)> 0
            JOIN task t ON tu.task_id = t.id 
            GROUP BY t.id ";

        $query = $this->db->query($sql);
        return $query->result_array();  
    }

    public function findtask($id){
        $q=$this->db->select()
                    ->where('id',$id)
                    ->get('task');
        return  $q->row_array();
    }

    public function finduser($id){
        $q=$this->db->select('user_id')
                    ->where('task_id',$id)
                    ->get('task_user');
        return  $q->result_array();
    }

    public function update($data,$last_id,$arr){  
        $user=array (
            "taskname"=>$data['taskname'],
            "description"=>$data['description'],
            "status"=>$data['status'],
            "datetocompleted"=>$data['datetocompleted']
        );
            $this->db->where('id',$data['id'])
                     ->update('task',$user);

            $last_id = $this->db->insert_id('task_user',$last_id,$arr);
            $explodedtask = explode(',',$arr);

            foreach ($explodedtask as $row){
                $last=array ("user_id"=>$row);
                $this->db->where('id','task_id')
                         ->update('task_user',$last);
            }
            return true;
    }

    public function deletetask($id){
        $this->db->where('id',$id);
        $this->db->delete('task');
        $last_id = $this->db->insert_id('task_user');
        $this->db->where('id',$last_id)
                ->delete('task_user');
    }
}
?>