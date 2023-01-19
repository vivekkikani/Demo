<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Taskwork extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Taskwork_model');
        $this->load->library('form_validation');
        $this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('employee/login/login');
        }
    }

    public function taskwork(){
        $task=$this->Taskwork_model->gettaskwork();
        $todo=array();
        $inprogres=array();
        $completed=array();
        foreach ($task as $value) {
            if($value['status'] == '1'){
                array_push($todo, $value);
            }
            else if($value['status'] == '2'){
                array_push($inprogres, $value);
            }
            else if($value['status'] == '3'){
                array_push($completed, $value);
            }
        }
        $data['todo'] = $todo;
        $data['inprogres'] = $inprogres;
        $data['completed'] = $completed;
        $data['employeediteles']=$this->Taskwork_model->employeenameget();
        $this->load->view('employee/taskwork/taskwork',$data);
    }

    public function view(){
        $data['task']=$this->Taskwork_model->taskid();
        $data['employeediteles']=$this->Taskwork_model->employeenameget();
        $data['task_user']=$this->Taskwork_model->finduser();
        $arr_output = array_column($data['task_user'],'user_id');
        $data['task_user']=$arr_output;
        echo '<pre>';
        print_r($data);die;
        echo json_encode($data);
        $this->load->view('employee/taskwork/view',$data);
    }
}

?>  