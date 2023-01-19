<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->library('form_validation');
        $this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('employee/login/login');
        }
    }

    public function employee(){
        $this->load->view('employee/employee/employee');
    }

    // public function userdata(){
    //     $data['employeediteles']=$this->Employee_model->getemployee();
    //     $this->load->view('employee/employee/userdata',$data);
    // }

    public function useredit(){
        $data['technology']=$this->Employee_model->technologyget();
        $data['employeediteles']=$this->Employee_model->find_user();
        // echo '<pre>';
        // print_r($data);die;
        $this->load->view('employee/employee/useredit',$data);
    }

    public function userupdate(){
        $config=[
            'upload_path'=> './asset/upload/',
            'allowedExts'=>'pdf|doc|docx'
        ];
        $this->load->library('upload',$config);
        $data=$this->input->post();
        $id=$this->session->userdata('id');
        $technology=$this->input->post('technology');
        $resume=$this->Employee_model->find_resume();
        $filename =$_FILES["resume"]["name"];
        $tempname =$_FILES["resume"]["tmp_name"];
        $folder ='./asset/upload/'.$filename;
        if(move_uploaded_file($tempname, $folder)){
            $document='asset/upload/'.$filename;
            $arr=implode(',',$technology);
            if($this->Employee_model->userUpdate($data,$arr,$document,$id)){  
                //  print_r($resume);die;    
                if(file_exists($resume['resume'])){
                    unlink($resume['resume']);
                    $this->session->set_flashdata('failed','Your Data Edit successfully !!');
                    return redirect('employee/employee/useredit');
                }else{
                    $this->session->set_flashdata('failed','Your Data Not Edit  !!');
                    redirect('employee/employee/useredit');
                }
            }
        }
    }
}
?>