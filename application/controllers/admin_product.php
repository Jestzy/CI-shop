<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_product extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->admin_model->checksession();
        $this->load->model('product_model');
    }
    public function insert()
    {
        $data['query']=$this->db->get('tb_type');
        $this->load->view('admin_head_view');
        $this->load->view('admin_product_insert_view',$data);
        $this->load->view('admin_bottom_view');
    }
    public function insert2()
    {
        $this->form_validation->set_rules('title', 'ชื่อสินค้า', 'required');
        $this->form_validation->set_rules('price', 'ราคาสินค้า', 'required');
        $this->form_validation->set_message('required', 'ERROR : กรุณาป้อน%s ');
        
        if ($this->form_validation->run() == FALSE) {
            $this->insert();
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg';
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $config['file_name'] =date("YmdHis");
            $this->load->library('upload', $config);
            
            if($this->upload->do_upload('photo')) {
                $data=$this->upload->data();
                $file_name=$data['file_name'];
            } else {
                $file_name="";
            }
        }
        $this->product_model->insert_entry($file_name);
        
        $this->load->view('admin_head_view');
        $this->load->view('admin_product_insert_view2');
        $this->load->view('admin_bottom_view');
    }
    
    public function index()
    {
        $data['query']=$this->db->get('tb_product');
        
        $this->load->view('admin_head_view');
        $this->load->view('admin_product_view',$data);
        $this->load->view('admin_bottom_view');
    }
    
    public function update()
    {
        $this->db->where('id',$this->uri->segment(3));
        $data['query_tb_product'] = $this->db->get('tb_product');
        $data['query_tb_type']=$this->db->get('tb_type');
        
        $this->load->view('admin_head_view');
        $this->load->view('admin_product_update_view',$data);
        $this->load->view('admin_bottom_view');
    }
    
    public function update2()
    {
        $this->form_validation->set_rules('title', 'ชื่อสินค้า', 'required');
        $this->form_validation->set_rules('price', 'ราคาสินค้า', 'required');
        $this->form_validation->set_message('required', 'ERROR : กรุณาป้อน%s ');
       
        if ($this->form_validation->run() == FALSE) {
            $this->db->where('id',$_POST['id']);
            $data['query_tb_product'] = $this->db->get('tb_product');
            $data['query_tb_type']=$this->db->get('tb_type');
            
            $this->load->view('admin_head_view');
            $this->load->view('admin_product_update_view',$data);
            $this->load->view('admin_bottom_view');
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg';
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $config['file_name'] =date("YmdHis");
            
            $this->load->library('upload', $config);
            
            if ($_FILES['photo']['name']) {
                if($this->upload->do_upload('photo')) {
                    $data=$this->upload->data();
                    $file_name=$data['file_name'];
                    $url="uploads/".$this->input->post('photo_tmp');
                    if(is_file($url)) {
                        unlink($url);
                    }   
                }
            } else {
                $file_name=$this->input->post('photo_tmp');
            }
            $this->product_model->update_entry($file_name);
            $this->load->view('admin_head_view');
            $this->load->view('admin_product_update_view2');
            $this->load->view('admin_bottom_view');
        }
    }
    
    public function delete(){
        if($this->product_model->delete_entry()) {
            $url="uploads/".$this->uri->segment(4);
            if(is_file($url)) {
                unlink($url);
            }
            $this->index();
        }
    }
}    
