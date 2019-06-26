<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Start extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('type_model');
    }
    public function index()
    {
        $data['query_tb_type']=$this->db->get('tb_type');
        $this->load->view('head_view',$data);
        $this->load->view('start_view');
        $this->load->view('bottom_view');
    }
}