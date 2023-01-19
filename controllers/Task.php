<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Task extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Task_model');
        $this->load->library('form_validation');
        $this->logged_in();
    }
    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('signin/signin');
        }
    }

    public function task(){
        $data['employeediteles']=$this->Task_model->employeenameget();
        $this->load->view('admin/task/task',$data);
    }

    public function addtask(){
        $this->form_validation->set_rules('taskname','taskname','trim|required');
        $this->form_validation->set_rules('taskassignes','taskassignes','trim');
        $this->form_validation->set_rules('description','description','trim|required');
        $this->form_validation->set_rules('status','status','trim|required');
        $this->form_validation->set_rules('datetocompleted','datetocompleted','trim|required');
        $data['employeediteles']=$this->Task_model->employeenameget();
        $taskassignes=$this->input->post('taskassignes');

        if($this->form_validation->run()){
            $last_id=$this->Task_model->getid();
            $arr=implode(',',$taskassignes);
            $user=$this->Task_model->add($last_id,$arr);
            if($user){
                $this->session->set_flashdata('good',"Data successfully inserted");
                return redirect('task/task');
        }else{
                $this->session->set_flashdata('failed',"Data Not inserted");
                return redirect('task/task');
                }
        }else{
                $this->load->view('admin/task/task',$data);
        }
    }

    public function admintasklist(){
        $data['task']=$this->Task_model->admingettask();
        $this->load->view('admin/task/list',$data);
    }

    public function edit($id){
        $data['employeediteles']=$this->Task_model->employeenameget();
        $data['task']=$this->Task_model->findtask($id);
        $data['task_user']=$this->Task_model->finduser($id);
        $arr_output = array_column($data['task_user'],'user_id');
        $data['task_user']=$arr_output;
        // echo '<pre>';
        // print_r($arr_output);die;
        $this->load->view('admin/task/edittask',$data);
    }

    public function updatetask(){
        $this->form_validation->set_rules('taskname','taskname','trim|required');
        $this->form_validation->set_rules('taskassignes','taskassignes','trim');
        $this->form_validation->set_rules('description','description','trim|required');
        $this->form_validation->set_rules('status','status','trim|required');
        $this->form_validation->set_rules('datetocompleted','datetocompleted','trim|required');
        $data['employeediteles']=$this->Task_model->employeenameget();
        $taskassignes=$this->input->post('taskassignes');

        if($this->form_validation->run()){
            $data=$this->input->post();
            $last_id=$this->Task_model->getid();
            $empId = $this->input->post('id');
            $arr=implode(',',$taskassignes);
            $user=$this->Task_model->update($data,$last_id,$arr);
            if($user){
                $this->session->set_flashdata('good',"Update successfully inserted");
                     redirect('task/admintasklist');
        }else{
                $this->session->set_flashdata('failed',"Data Not inserted");
                return redirect('task/edittask');
                }
        }else{
                $this->load->view('admin/task/edittask',$data,$empId);
        }
    }

    public function delete($id){
        $this->Task_model->deletetask($id);
        $this->session->set_flashdata('failed','Your Data No Delete !!');
        redirect('task/admintasklist');
    }  
}

?>