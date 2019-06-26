<?php
class Order_model extends CI_Model {
    function insert_entry()
    {
        $odate=date("Y-m-d H:i:s");
        $data = array(
        'fullname' => $_POST['fullname'],
        'email'    => $_POST['email'],
        'tel'      => $_POST['tel'],
        'address'  => $_POST['address'],
        'odate'    => $odate,
        'total'    => $this->cart->total()
        );
        
        $this->db->insert('tb_order', $data);
        $id_order= mysqli_insert_id();
        
        foreach($this->cart->contents() as $items) {
            $rowid    = $items['rowid'];
            $id       = $items['id'];
            $name     = $items['name'];
            $qty      = $items['qty'];
            $price    = $items['price'];
            $subtotal = $items['subtotal'];
            
            $data     = array(
            'ref_id_order'   => $id_order,
            'ref_id_product' => $id,
            'title'          => $name,
            'qty'            => $qty,
            'price'          => $price,
            'subtotal'       => $subtotal
            );
            
            $this->db->insert('tb_order_detail', $data);
            $this->cart->destroy();
        }
    }
    function delete_entry()
    {
        $this->db->where('id_order', $this->uri->segment(3));
        $this->db->delete('tb_order');
        $this->db->where('ref_id_order', $this->uri->segment(3));
        $this->db->delete('tb_order_detail');
    }
}
?>