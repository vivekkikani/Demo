<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Technology_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getTechnology(){
        $user=$this->db->get('technology')->result_array();
        return  $user;
    }

    public function add($status){  
        $data=array (
            "technology"=>$this->input->post('technology',true),
            'status' =>$status
        );
        return $this->db->insert('technology',$data);
        
    }
    public function find_technology($id){
        $q=$this->db->select()
                    ->where('id',$id)
                    ->get('technology');
        return  $q->row();
    }

    public function technologylistUpdate($data,$status){

        $array = array(
            'technology'=>$data['technology'],
            'status' =>$status
    );
        return  $this->db->where('id',$data['technologyid'])
                        ->update('technology',$array);
    }

    public function deletedata($id){
        $this->db->where('id', $id);
        $this->db->delete('technology');
        
    }
}
?>