<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Userpass extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Userpass_model');
        $this->load->library('form_validation');
        $this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('employee/login/login');
        }
    }
    public function userpass(){
        $this->load->view('employee/userpass/userpass');
    }

    public function changepass(){

        $this->form_validation->set_rules('oldpass','Old password','required|md5|trim|callback_password_check');
        $this->form_validation->set_rules('newpass','New password','trim|required' );
        $this->form_validation->set_rules('confirmpass','Confirm password','trim|required|matches[newpass]' );
        
        if($this->form_validation->run()){
            $newpass=$this->input->post('newpass');
            $id=$this->session->userdata('id');  
            $result=$this->Userpass_model->update_pass($newpass,$id);
            if($result){
                $this->session->set_flashdata('failed','password changed succesfully');
                return redirect('employee/userpass/userpass');
            }else{
                $this->session->set_flashdata('failed','Your password not change !!');
                 redirect('employee/userpass/userpass');
                }
            }else{
                $this->load->view('employee/userpass/userpass');
        }
        
    }

    public function password_check($oldpass){    
        $id=$this->session->userdata('id');
        $user=$this->Userpass_model->checkpassword($id);
        // print($user);die;
        if($user->password !== md5($oldpass)){
            $this->form_validation->set_message('password_check','The {field} does not match');
            return false;
        }
            return true;
    }
}

?>