<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Password extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Password_model');
        $this->load->library('form_validation');
        $this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('signin/signin');
        }
    }

    public function password(){
        $this->load->view('admin/password/password');
    }

    public function changepass(){

        $this->form_validation->set_rules('oldpass','Old password','callback_checkpass');
        $this->form_validation->set_rules('newpass','New password','trim|required' );
        $this->form_validation->set_rules('confirmpass','Confirm password','trim|required|matches[newpass]' );
        
        if($this->form_validation->run()){
            $newpass=$this->input->post('newpass');
            $id=$this->session->userdata('id');  
            $result=$this->Password_model->update_pass($newpass,$id);
            if($result){
                $this->session->set_flashdata('failed','password changed succesfully');
                return redirect('password/password');
            }else{
                $this->session->set_flashdata('failed','Your password not change !!');
                 redirect('password/password');
            }
        }else{
            $this->load->view('admin/password/password');
        }
        
    }

    public function checkpass($oldpass){    
        $user=$this->Password_model->checkpassword($id);
        if($user->password !== md5($oldpass)){
            $this->form_validation->set_message('checkpass','The {field} does not match');
            return false;
        }
            return true;
    }

    public function checkpassdhadgda($oldpass){    
        $user=$this->Password_model->checkpassword($id);
        if($user->password !== md5($oldpass)){
            $this->form_validation->set_message('checkpass','The {field} does not match');
            return false;
        }
            return true;
    }

    
}
?>