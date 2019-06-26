<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_order extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->admin_model->checksession();
        $this->load->model('order_model');
    }
    
    public function index()
    {
        $data['query']=$this->db->get('tb_order');
        $this->load->view('admin_head_view');
        $this->load->view('admin_order_view',$data);
        $this->load->view('admin_bottom_view');
    }
    
    public function detail()
    {
        $this->db->where('id', $this->uri->segment(3));
        $data['query_order'] = $this->db->get('tb_order');
        $this->db->where('ref_id_order', $this->uri->segment(3));
        $data['query_order_detail'] = $this->db->get('tb_order_detail');
        $this->load->view('admin_head_view');
        $this->load->view('admin_order_detail_view',$data);
        $this->load->view('admin_bottom_view');
    }
    public function delete()
    {
        $this->order_model->delete_entry();
        $this->index();
    }
}