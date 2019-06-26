<?php
    $row = $query_tb_product->row_array();
    $id=$row['id'];
    $title=$row['title'];
    $detail=$row['detail'];
    $price=$row['price'];
    $ref_id_type=$row['ref_id_type'];
    $photo=$row['photo'];

    echo validation_errors();
    echo form_open_multipart('admin_product/update2');
    echo "ชื่อสินค้า * : ";
    echo form_input('title',$title)."<br/>";
    echo "ราคา * : ";
    echo form_input('price',$price)."<br/>";
    echo "รายละเอียด * : <br/>";
    echo form_textarea('detail',$detail)."<br/>";
    echo "ประเภทสินค้า: ";

    $options[$row['id']]= '';
    foreach ($query_tb_type->result_array() as $row) {
        $options[$row['id']]=$row['title'];
    }

    echo form_dropdown('id_type', $options,$ref_id_type)."<br/>";
    echo "Upload รูปภาพ: ";
    echo form_upload('photo')."<br/><br/>";
    $url="uploads/".$photo;
    if(is_file($url)) {
        $image_properties = array(
        'src' => $url,
        'width' => '200'
        );
        
        echo form_hidden('photo_tmp', $photo);
        echo img($image_properties)."<br/><br/>";
    }

    echo form_hidden('id', $id);
    echo form_submit('mysubmit','Submit');
    echo form_reset('myreset','Reset');
    echo form_close();
?>