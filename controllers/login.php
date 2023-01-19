<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Signin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Signin_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    private function logged_in()
    {
        if(! $this->session->userdata('id') && $this->session->userdata('role')){
            // echo '<pre>';print_f($this->session->userdata);die;
            redirect('admin/dashboard/dashboard');
        }
    }

    public function signin(){
        $this->load->view('admin/signin/signin');
    }   
    
    public function validation(){
        $this->form_validation->set_rules('email','email','trim|required');
        $this->form_validation->set_rules('password','pasword','required');

        if($this->form_validation->run()){
            $email=$this->input->post('email');
            $password=md5($this->input->post('password'));
            $login_id=$this->Signin_model->login_validation($email,$password);
            if($login_id->id){
                $this->session->set_userdata('id',$login_id->id);
                $this->session->set_userdata('role',$login_id->role);
                return redirect('admin/dashboard/dashboard');
            }else{
                $this->session->set_flashdata('failed','Invalida password');
                redirect('signin/signin');
            }
            }else{
                $this->load->view('admin/signin/signin');
                // echo validation_errors();
        }
    }

    public function logout(){
        $this->session->sess_destroy('id');
        redirect('signin/signin');
    }
    
    public function logoutss(){
        $this->session->sess_destroy('id');
        redirect('signin/signin');
    }
}

?>
