<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Employeeleaveapplication extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Employeeleaveapplication_model');
        $this->load->library('form_validation');
        $this->logged_in();
    }
    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('employee/login/login');
        }
    }

    public function employeeleaveapplication(){
        $this->load->view('employee/employeeleaveapplication/employeeleaveapplication');
    }

    public function application(){
        $this->form_validation->set_rules('subject','subject','trim|required');
        $this->form_validation->set_rules('detail','detail','trim');
        $this->form_validation->set_rules('datefrom','datefrom','trim|required');
        $this->form_validation->set_rules('dateto','dateto','trim|required');

        if($this->form_validation->run()){
            $resp=$this->Employeeleaveapplication_model->add();
            if($resp){
                $this->session->set_flashdata('good',"Leave Application Apply");
                return redirect('employee/employeeleaveapplication/employeeleaveapplication');
        }else{
                $this->session->set_flashdata('failed',"Leave Application Not Apply");
                return redirect('employee/employeeleaveapplication/employeeleaveapplication');
                }
        }else{
                $this->load->view('employee/employeeleaveapplication/employeeleaveapplication');
        }
    }

    public function applicationlist(){
        $data['employee_leave_application']=$this->Employeeleaveapplication_model->getapplication();
        $this->load->view('employee/employeeleaveapplication/leaveapplicationlist',$data);
    }

    public function applicationstatus(){
        $data['employee_leave_application']=$this->Employeeleaveapplication_model->getstatus();
        $this->load->view('employee/employeeleaveapplication/applicationstatus',$data);
    }
}
?>