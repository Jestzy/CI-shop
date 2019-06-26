<?php
class Product_model extends CI_Model {
    function insert_entry($file_name)
    {
        $sdate=date("Y-m-d H:i:s");
        $data = array(
        'title' => $_POST['title'],
        'photo' => $file_name,
        'price' => $_POST['price'],
        'detail' => $_POST['detail'],
        'ref_id_type' => $_POST['id_type']
        );
        $query=$this->db->insert('tb_product', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function update_entry($file_name)
    {
        $data = array(
        'title' => $_POST['title'],
        'photo' => $file_name,
        'price' => $_POST['price'],
        'detail' => $_POST['detail'],
        'ref_id_type' => $_POST['id_type']
        );
        $this->db->where('id', $_POST['id']);
        $query=$this->db->update('tb_product', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function delete_entry()
    {
        $this->db->where('id',$this->uri->segment(3));
        $query=$this->db->delete('tb_product');
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function select_entry($where=NULL,$start=NULL,$limit=NULL)
    {
        $sql="SELECT * FROM tb_product ";
        if(isset($where)) {
            $sql.=$where;
        }
        if(isset($start)) {
            $start=0;
        }
        if(isset($limit)) {
            $sql.=" LIMIT $start, $limit ";
        }
        return $this->db->query($sql);
    }
}
?>        