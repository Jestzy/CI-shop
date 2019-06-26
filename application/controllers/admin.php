<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
    public function login()
    {
        $this->load->view('admin_login_view');
    }
    
    public function login2()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', 'รหัสผู้ใช้', 'required');
        $this->form_validation->set_rules('pass', 'รหัสผ่าน', 'required');
        $this->form_validation->set_message('required', 'ERROR : กรุณาป้อน %s ');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin_login_view');
        }else {
            if($this->admin_model->checklogin() == TRUE) {
                $newdata = array('logged_in' => "OK");
                $this->session->set_userdata($newdata);
                redirect('admin/index');
            } else {
                $this->load->view('admin_login_view');
            }
        }
    }
    public function index()
    {
        $this->admin_model->checksession();
        $this->load->view('admin_head_view');
        $this->load->view('admin_home_view');
        $this->load->view('admin_bottom_view');
    }
    public function logout() 
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('admin/index');
    }
}