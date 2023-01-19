<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Task extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Usertask_model');
        $this->load->library('form_validation');
        $this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('employee/login/login');
        }
    }

    public function task(){
        $data['task']=$this->Usertask_model->gettask();
        $data['employeediteles']=$this->Usertask_model->getid();
        $this->load->view('employee/employee/task',$data);
    }
}
?>