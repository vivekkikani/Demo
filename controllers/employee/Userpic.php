<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Userpic extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Userpic_model');
        $this->load->library('form_validation');
        $this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('employee/login/login');
        }
    }

    public function userpic(){
        $id=$this->session->userdata('id');
        $userpic = $this->Userpic_model->find_pic($id);
        $this->load->view('employee/userpic/userpic',['employeediteles'=>$userpic]);
    }

    public function profilepicupdate(){
        $config=[
            'upload_path'=> './asset/upload/userpic',
            'allowed'=>'jpg|jpeg|png'
        ];

        $this->load->library('upload',$config);
        $id=$this->session->userdata('id');
        $profilepic=$this->Userpic_model->find_pic($id);
        $filename =$_FILES["profilepic"]["name"];
        $tempname =$_FILES["profilepic"]["tmp_name"];  
        $folder = './asset/upload/userpic/'.$filename;
        if(move_uploaded_file($tempname, $folder)){
            $document='asset/upload/userpic/'.$filename;
            if($this->Userpic_model->updatepic($document,$id)){
               if(file_exists($profilepic->profilepic)){
                    unlink($profilepic->profilepic);
                    $this->session->set_flashdata('failed','profilepic changed succesfully');
                    return redirect('employee/userpic/userpic');
                }else{
                    $this->session->set_flashdata('failed','Your  not change profilepic !!');
                    redirect('employee/userpic/userpic');     
                }
            }
        }
    }
}

?>