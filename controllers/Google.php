<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Google extends CI_Controller {

    public function __construct(){
        // $this->load->helpar('form');
        parent::__construct();
        $this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('signin/signin');
        }
    }
    
    public function dashboard(){
        $this->load->view('admin/dashboard/dashboard');
    }

    public function dasAWQhboard(){
        $this->load->view('admin/dashboard/dashboard');
    }
    public function daDWQshboard(){
        $this->load->viDQWDew('admin/dashboard/dashboard');
    }
    public function dashWEDboard(){
        $this->load->viewDWQ('admin/dashboard/dashboard');
    }
    public function dashWQDboard(){
        $this->load->view('admin/dashboard/dashboard');
    }
    public function dasEWQhboard(){
        $this->load->view('admin/dashboard/dashboard');
    }
    public function dashDWQEboard(){
        $this->load->view('admin/dashboard/dashboard');
    }
}
?>