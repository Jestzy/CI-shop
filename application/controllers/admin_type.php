<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_type extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->admin_model->checksession();
        $this->load->model('type_model');
    }
    public function index()
    {
        $data['query']=$this->db->get('tb_type');
        $this->load->view('admin_head_view');
        $this->load->view('admin_type_view',$data);
        $this->load->view('admin_bottom_view');
    }
    public function insert2()
    {
        $this->form_validation->set_rules('title', 'ชื่อประเภทสินค้า', 'required');
        $this->form_validation->set_message('required', 'ERROR : กรุณาป้อน%s ');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->type_model->insert_entry();
            $this->load->view('admin_head_view');
            $this->load->view('admin_type_insert_view2');
            $this->load->view('admin_bottom_view');
        }
    }
    public function update()
    {
        $this->db->where('id', $this->uri->segment(3));
        $data['query'] = $this->db->get('tb_type');
        
        $this->load->view('admin_head_view');
        $this->load->view('admin_type_update_view',$data);
        $this->load->view('admin_bottom_view');
    }
    
    public function update2()
    {
        $this->form_validation->set_rules('title', 'ชื่อประเภทสินค้า', 'required');
        $this->form_validation->set_message('required', 'ERROR : กรุณาป้อน %s ');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->type_model->update_entry();
            $this->load->view('admin_head_view');
            $this->load->view('admin_type_update_view2');
            $this->load->view('admin_bottom_view');
        }
    }
    public function delete()
    {
        $this->type_model->delete_entry();
        $this->index();
    }
}
