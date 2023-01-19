<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profilepic_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function find_pic($id){
        $q=$this->db->select('profilepic')
                    ->where('id',$id);
        return $this->db->get('admin')->row();
    }

    public function updatepic($document,$id){  
        $profilepic=["profilepic"=>$document];
        return  $this->db->where('id',$id)
                        ->update('admin',$profilepic);
    }
}
?>