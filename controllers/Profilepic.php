<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profilepic extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Profilepic_model');
        $this->load->library('form_validation');
        $this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('signin/signin');
        }
    }

    public function profilepic(){
        $this->session->set_userdata('id',1);
        $id=$this->session->userdata('id');
        $userpic = $this->Profilepic_model->find_pic($id);
        $this->load->view('admin/profilepic/profilepic',['admin'=>$userpic]);
    }

    public function profilepicupdate(){
        $config=[
            'upload_path'=> './asset/upload/adminpic',
            'allowed'=>'jpg|jpeg|png'
        ];

        $this->load->library('upload',$config);
        $id=$this->session->userdata('id');
        $profilepic=$this->Profilepic_model->find_pic($id);
        // print_r($profilepic);
        // die;
        $filename =$_FILES["profilepic"]["name"];
        $tempname =$_FILES["profilepic"]["tmp_name"];  
        $folder = './asset/upload/adminpic/'.$filename;
        if(move_uploaded_file($tempname, $folder)){
            $document='asset/upload/adminpic/'.$filename;
            if($this->Profilepic_model->updatepic($document,$id)){
               if(file_exists($profilepic->profilepic)){
                    unlink($profilepic->profilepic);
                    $this->session->set_flashdata('failed','profilepic changed succesfully');
                    return redirect('profilepic/profilepic');
                }else{
                    $this->session->set_flashdata('failed','Your  not change profilepic !!');
                    redirect('profilepic/profilepic');     
                }
            }
        }
    }
}

?>