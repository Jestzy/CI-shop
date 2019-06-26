<?php
class Type_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    
    function insert_entry()
    {
        $data = array('title' => $_POST['title']);
        $query=$this->db->insert('tb_type', $data);
        
        if($query) {
            return TRUE;
        }else {
            return FALSE;
        }
    }
    
    function update_entry()
    {
        $data = array('title' => $_POST['title']);
        $this->db->where('id', $_POST['id']);
        $query=$this->db->update('tb_type', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function delete_entry()
    {
        $this->db->where('id', $this->uri->segment(3));
        $query=$this->db->delete('tb_type');
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
?>