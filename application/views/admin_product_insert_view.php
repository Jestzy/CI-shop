<?php
    echo validation_errors();

    echo form_open_multipart('admin_product/insert2');
    echo "ชื่อสินค้า * :";
    echo form_input('title')."<br/>";
    echo "ราคา * : ";
    echo form_input('price')."<br/>";
    echo "รายละเอียด * : <br/>";
    echo form_textarea('detail')."<br/>";
    echo "ประเภทสินค้า : ";
    foreach ($query->result_array() as $row)
    {
        $options[$row['id']]=$row['title'];
    }

    echo form_dropdown('id_type', $options)."<br/>";
    echo "Upload รูปภาพ: ";
    echo form_upload('photo')."<br/><br/>";
    echo form_submit('mysubmit','Submit');
    echo form_reset('myreset','Reset');
    echo form_close();
?>