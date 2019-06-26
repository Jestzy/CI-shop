<?php
    $row   = $query->row_array();
    $id    = $row['id'];
    $title  = $row['title'];

    echo form_open('admin_type/update2');
    echo validation_errors();
    echo "แก้ไขประเภทสินค้า ";
    echo form_input('title', $title);
    echo form_hidden('id', $id);
    echo form_submit('mysubmit', 'Submit');
    echo form_close();
?>