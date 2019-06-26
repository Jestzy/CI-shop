<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }
    public function lists()
    {
        $data['query_tb_type']=$this->db->get('tb_type');
        $this->load->view('head_view',$data);
        $this->db->where('ref_id_type', $this->uri->segment(3));
        $data['query']=$this->db->get('tb_product');
        $this->load->view('product_lists_view',$data);
        $this->load->view('bottom_view');
    }
    public function index()
    {
        $data['query_tb_type']=$this->db->get('tb_type');
        $this->load->view('head_view',$data);
        $this->db->where('id', $this->uri->segment(3));
        $data['query']=$this->db->get('tb_product');
        $this->load->view('product_detail_view',$data);
        $this->load->view('bottom_view');
    }
}