<table width="100%" border="0" cellspacing="4">
    <?php
        foreach ($query->result_array() as $row)
        {
            $id          = $row['id'];
            $code        = sprintf("%05d",$id);
            $title       = $row['title'];
            $detail      = $row['detail'];
            $ref_id_type = $row['ref_id_type'];
            $price       = $row['price'];
            $photo       = $row['photo'];
            $url         = "uploads/".$photo;
            
            if(is_file($url)) {
                $image_properties = array(
                    'src' => $url,
                    'width' => '150'
                );
                $img_url = img($image_properties)."<br/><br/>";
            } else {
                $img_url="";
            }
            
            $show_url = anchor('product/index/'.$id, 'แสดงรายละเอียด');
            $cart_url = anchor('mycart/cart_insert/'.$id, 'หยิบใส่ตะกร้า');
            echo "<tr>
            <td width='20%' valign='top'>
                $img_url
            </td>
            <td width='80%' valign='top'>
                <b>รหัสสินค้า : </b> $code <br>
                <b>ชื่อสินค้า : </b>$title <br>
                <b>ราคา : </b> $price บาท<br><br>
                $show_url
                $cart_url <br>
            </td>
            </tr>";
        }
    ?>
</table>