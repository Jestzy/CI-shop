<?php
    if($this->cart->total_items()>0) {
    echo "ตะกร้าสินค้า | ";
    echo anchor('mycart/cart_clear', ' เคลียร์ตะกร้าสินค้า');
    echo "<br/><br/>";
?>
   
    <table width="100%" border="1">
    <tr bgcolor="#E8E8E8">
        <td width="60%"><center><b>ชื่อสินค้า</b></center></td>
        <td width="12%"><center><b>จำนวน</b></center></td>
        <td width="10%"><center><b>ราคา</b></center></td>
        <td width="12%"><center><b>รวม</b></center></td>
    </tr>
    
    <?php
        echo form_open('mycart/cart_update');
        foreach($this->cart->contents() as $items) {
            $rowid    = $items['rowid'];
            $id       = $items['id'];
            $name     = $items['name'];
            $qty      = $items['qty'];
            $price    = number_format($items['price']);
            $subtotal = number_format($items['subtotal']);
            echo "<tr>
            <td>$name</td>
            <td>";
            echo form_input('qty_array[]',$qty,'size=5');
            echo "</td>
            <td>$price</td>
            <td>$subtotal</td>
            </tr>";
            echo form_hidden('rowid_array[]', $rowid);
        }
        echo "</table><br/>";
        echo " จำนวนเงินทั้งหมด";
        echo number_format($this->cart->total());
        echo " บาท <br/>";
        echo form_submit('mysubmit','คำนวณใหม่');
        echo form_submit('mysubmit2','สั่งซื้อสินค้า');
        echo form_close();
        }
    ?>