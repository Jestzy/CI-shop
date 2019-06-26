<?php
    if($this->cart->total_items()>0) {
    echo "<h3>ใบสั่งซื้อสินค้า</h3>";
    echo validation_errors();
    echo form_open('mycart/order_confrim2');
?>
<table width="400" border="0" cellspacing="1" cellpadding="0">
    <tr>
        <td width="101">ชื่อ- สกุล : </td>
        <td><input type="text" name="fullname" size="40">* </td>
    </tr>
    <tr>
        <td>อีเมล : </td>
        <td><input type="text" name="email"></td>
    </tr>
    <tr>
        <td>เบอร์ติดต่อ :</td>
        <td><input type="text" name="tel">
    </td>
    </tr>
    <tr>
        <td>ที่อยู่</td>
        <td><textarea name="address" cols="40" rows="4"></textarea>* </td>
    </tr>
</table><BR>
<table width="100%" border="1">
    <tr bgcolor="#E8E8E8">
        <td width="60%"><center><b>ชื่อสินค้า</b></center></td>
        <td width="12%"><center><b>จำนวน</b></center></td>
        <td width="10%"><center><b>ราคา</b></center></td>
        <td width="12%"><center><b>รวม</b></center></td>
    </tr>
    
    <?php
        foreach($this->cart->contents() as $items) {
            $rowid    = $items['rowid'];
            $id       = $items['id'];
            $name     = $items['name'];
            $qty      = $items['qty'];
            $price    = number_format($items['price']);
            $subtotal = number_format($items['subtotal']);
            echo "<tr>
            <td>$name</td>
            <td>$qty</td>
            <td>$price</td>
            <td>$subtotal</td>
            </tr>";
        }
        echo "</table><br/>";
        echo " จำนวนเงินทั้งหมด";
        echo number_format($this->cart->total());
        echo " บาท <br/>";
        echo form_submit('mysubmit','ยืนยันสั่งซื้อสินค้า');
        echo form_close();
    }
?>