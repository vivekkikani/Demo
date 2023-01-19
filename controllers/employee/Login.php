<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }

    private function logged_in()
    {
        if(! $this->session->userdata('id')){
            redirect('employee/dashboard/dashboard');
        }
    }

    public function login(){
        $id=$this->session->set_userdata('id');
        $this->load->view('employee/login/login');
    }   
    
    public function validation(){
        $this->form_validation->set_rules('email','email','trim|required');
        $this->form_validation->set_rules('password','pasword','required');

        if($this->form_validation->run()){

           $email=$this->input->post('email');
           $password=md5($this->input->post('password'));
           $login_id=$this->Login_model->login_validation($email,$password);
            if($login_id){
                $this->session->set_userdata('id',$login_id->id);
                $this->session->set_userdata('role',$login_id->role);
                return redirect('employee/dashboard/dashboard');
            }else{
                $this->session->set_flashdata('failed','Invalida password');
                redirect('employee/login/login');
            }
            }else{
                $this->load->view('employee/login/login');
        }
    }

    public function logout(){
        $this->session->sess_destroy('id');
        redirect('employee/login/login');
    }
}

?>