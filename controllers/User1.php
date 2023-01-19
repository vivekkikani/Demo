<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User1 extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Leaveapplication_model');
        $this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('signin/signin');
        }
    }

    public function leaveapplication(){
        $data['employee_leave_application']=$this->Leaveapplication_model->getstatus();
        $this->load->view('admin/leaveapplication/leaveapplication',$data);
  }
  
    public function application(){
    $data['employee_leave_application']=$this->Leaveapplication_model->get();
    // echo json_encode($data);
    $this->load->view('admin/leaveapplication/application',$data);

    }
    public function update(){
        $data=$this->input->post();
        $resp=$this->Leaveapplication_model->userupdate($data);
            if($resp){
                $this->session->set_flashdata('good',"Leave Application Apply");
                return redirect('leaveapplication/leaveapplication');
            }else{
                $this->session->set_flashdata('failed',"Leave Application Not Apply");
                return redirect('admin/leaveapplication/leaveapplication');
                }
                $this->load->view('admin/leaveapplication/update');
    }
}
?>