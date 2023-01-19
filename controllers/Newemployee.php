<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Newemployee extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Newemployee_model');
        $this->load->library('form_validation');
        $this->logged_in();
    }
    
    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('signin/signin');
        }
    }

    public function newemployee(){
        $data['technology']=$this->Newemployee_model->technologyget();
        $this->load->view('admin/newEmployee/newemployee',$data);
    }
    
    public function newemployee_Add(){
        $config=[
            'upload_path'=> './asset/upload/',
            'allowedExts'=>'pdf|doc|docx'
        ];
        $this->load->library('upload',$config);
        $this->form_validation->set_rules('name','name','trim|required|alpha');
        $this->form_validation->set_rules('email','email','trim|required');
        $this->form_validation->set_rules('username','username','trim|required|alpha');
        $this->form_validation->set_rules('technology','technology','trim|required');
        $this->form_validation->set_rules('resume','resume','required');
        $this->form_validation->set_rules('salary','salary','required');
        $this->form_validation->set_rules('password','password','required');

        $filename =time() . '_' . $_FILES['resume']["name"];
        $tempname =$_FILES['resume']["tmp_name"];
        $folder ='./asset/upload/'.$filename;
        $technology=$this->input->post('technology');

        if(move_uploaded_file($tempname, $folder)){
            $document='./asset/upload/'.$filename;
            // echo '<pre>';
            // print_r($document);
            // die;
            $arr=implode(',',$technology);
            $resp=$this->Newemployee_model->add_newemployee($document,$arr);
                if($resp)
                    {
                    $this->session->set_flashdata('failed',"Data successfully inserted");
                    return redirect('newemployee/newemployeeList');
                }else{
                    $this->session->set_flashdata('failed',"Data Not inserted");
                    return redirect('admin/newEmployee/newemployee');
                };
        }
    }

    public function newemployeeList(){
        $data['employeediteles']=$this->Newemployee_model->getemployee();
        $this->load->view('admin/newemployee/newemployeeList',$data);
    }

    public function edit($id){
        $data['technology']=$this->Newemployee_model->technologyget();
        $data['employeediteles']=$this->Newemployee_model->find_employee($id);
        $this->load->view('admin/newemployee/editemployee',$data);
    }

    public function employeeListUpdate(){
        $config=[
            'upload_path'=> './asset/upload/',
            'allowedExts'=>'pdf|doc|docx'
        ];
        $this->load->library('upload',$config);
        $data=$this->input->post();
        $empId = $this->input->post('newemployeeid');
        $technology=$this->input->post('technology');
        $resume=$this->Newemployee_model->find_resume();
        $filename =$_FILES["resume"]["name"];
        $tempname =$_FILES["resume"]["tmp_name"];
        $folder ='./asset/upload/'.$filename;
        if(move_uploaded_file($tempname, $folder)){
            $document='/asset/upload/'.$filename;
            $arr=implode(',',$technology);
            if($this->Newemployee_model->employee_Update($data,$arr,$document)){
                // print_r($resume);die;
                if(file_exists($resume['resume'])){
                    unlink($resume['resume']);
                    $this->session->set_flashdata('failed','Your Data Edit successfully !!');
                    return redirect('newemployee/newemployeeList');
                }else{
                    $this->session->set_flashdata('failed','Your Data Not Edit  !!');
                    redirect('newemployee/edit/'.$empId);
                    // return redirect('newemployee/edit/'.$id);
                }
            }
        }
    }

    public function delete($id){
        $this->Newemployee_model->deletedata($id);
        $this->session->set_flashdata('failed','Your Data No Delete !!');
        redirect('newemployee/newemployeeList');
    }  
}
?>