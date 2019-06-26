<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mycart extends CI_Controller {
    public function cart_insert()
    {
        $this->db->where('id', $this->uri->segment(3));
        $query = $this->db->get('tb_product');
        
        $row   = $query->row_array();
        $id    = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $data  = array(
        'id'    => $id,
        'qty'   => 1,
        'price' => $price,
        'name'  => $title
        );
        
        $this->cart->insert($data);
        redirect('mycart/index');
    }
    
    public function index()
    {
        $data['query_tb_type'] = $this->db->get('tb_type');
        $this->load->view('head_view',$data);
        $this->load->view('mycart_view');
        $this->load->view('bottom_view');
    }
    
    public function cart_update()
    {
        $rowid_array = $this->input->post('rowid_array');
        $qty_array   = $this->input->post('qty_array');
        $total = count($rowid_array);
        
        for($i=0;$i<$total;$i++)
        {
            $data = array(
            'rowid' => $rowid_array[$i],
            'qty' => $qty_array[$i],
            );
            $this->cart->update($data);
        }
        
        if ($this->input->post('mysubmit')) {
            redirect('mycart/index');
        } else {
            redirect('mycart/order_confrim');
        }
    }
    
    public function cart_clear()
    {
        $this->cart->destroy();
        redirect('mycart/index');
    }
    
    public function order_confrim()
    {
        $data['query_tb_type'] = $this->db->get('tb_type');
        
        $this->load->view('head_view',$data);
        $this->load->view('order_view');
        $this->load->view('bottom_view');
    }
    public function order_confrim2()
    {
        $this->load->model('order_model');
        $this->form_validation->set_rules('fullname', 'ชื่อ- สกุล', 'required');
        $this->form_validation->set_rules('address', 'ที่อยู่', 'required');
        $this->form_validation->set_message('required', 'ERROR : กรุณาป้อน %s ');
        
        if ($this->form_validation->run() == FALSE) {
            $this->order_confrim();
        } else {
            $this->order_model->insert_entry();
            $data['query_tb_type']=$this->db->get('tb_type');
            $this->load->view('head_view',$data);
            $this->load->view('order_view2');
            $this->load->view('bottom_view');
        }
    }
    
}