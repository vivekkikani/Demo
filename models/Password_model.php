<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Password_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function update_pass($newpass,$id)
    {
        $data=array('password'=>md5($newpass));
        $result=$this->db->where('id',$id)
                        ->update('admin',$data);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function checkpassword($id){
        $this->db->select('password');
        $this->db->where('id',$id);
        return $this->db->get('admin')->row();
    }   

}
?>