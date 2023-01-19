<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Technology extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Technology_model');
        $this->load->library('form_validation');
        $this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('signin/signin');
        }
    }

    public function technology(){
        $this->load->view('admin/technology/technology');
    }

    public function add_technology(){
        $this->form_validation->set_rules('technology','technology','trim|required');

            if($status=$this->input->post('active')) {
                $status= '1';
            }else{
                $status= '0';
            };
            if($this->form_validation->run()){
                
                $resp=$this->Technology_model->add($status,'technology');
                if($resp)
                    {
                    $this->session->set_flashdata('failed',"Data successfully inserted");
                    return redirect('technology/technologyList');
                }else{
                    $this->session->set_flashdata('failed',"Data Not inserted");
                    return redirect('admin/technology/technology');
                    };

            }
    }

    public function technologyList(){
        $data['technology']=$this->Technology_model->getTechnology();
        $this->load->view('admin/technology/technologyList',$data);
    }

    public function edit($id){
        $technology=$this->Technology_model->find_technology($id);
        $this->load->view('admin/technology/edittechnology',['technology'=>$technology]);
        
    }

    public function technologyUpdate(){
        $this->form_validation->set_rules('technology','technology','trim|required');

        if($this->form_validation->run()){
            $data=$this->input->post();
            if($status=$this->input->post('active')) {
                $status= '1';
            }else{
                $status= '0';
            };

            if($this->Technology_model->technologylistUpdate($data,$status)){
                $this->session->set_flashdata('failed','Your Data Edit successfully !!');
                return redirect('technology/technologyList');
            }else{
                $this->session->set_flashdata('failed','Your Data Not Edit  !!');
                return redirect('technology/edit');
                };
        }
    }

    public function delete($id){
        $this->Technology_model->deletedata($id);
        $this->session->set_flashdata('failed','Your Data No Delete !!');
        redirect('technology/technologylist');
    }  
}
?>