<?php
class Admin_model extends CI_Model {
    
    public function checklogin()
    {
        $user=$this->input->post('user');
        $pass=$this->input->post('pass');
        if($user=="admin" and $pass=="1234") {
            return TRUE;
        }else {
            return FALSE;
        }
    }
    
    public function checksession()
    {
        if($this->session->userdata('logged_in')!="OK") {
            redirect('admin/login');
        }
    }


}
?>