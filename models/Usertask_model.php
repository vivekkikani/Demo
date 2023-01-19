<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usertask_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function gettask(){
        $id=$this->session->userdata('id');
        $sql="SELECT *,t.id, Group_Concat(e.name)names
        FROM task_user tu 
        JOIN task t ON tu.task_id = t.id 
        JOIN employeediteles e ON FIND_IN_SET (e.id, tu.user_id)WHERE  $id=tu.user_id!=0
        GROUP BY t.id ";
        $query = $this->db->query($sql);
        return $query->result_array();                   
    }

    public function getid(){
        $user=$this->db->select()
                       ->get('task')
                       ->result_array();
        return  $user; 
    }
    
}

?>