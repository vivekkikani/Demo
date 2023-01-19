<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->logged_in();
    }

    private function logged_in() {
        if(! $this->session->userdata('id')) {
            redirect('employee/login/login');
        }
    }

    public function dashboard(){
        $this->load->view('employee/dashboard/dashboard');
    }
}
?>