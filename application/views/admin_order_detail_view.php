<?php
    echo "<h3>ใบสั่งซื้อสินค้า</h3>";
    $row      = $query_order->row_array();
    $id       = $row['id'];
    $fullname = $row['fullname'];
    $email    = $row['email'];
    $tel      = $row['tel'];
    $address  = nl2br($row['address']);
    $total    = $row['total'];
?>
<table width="400" border="0" cellspacing="1" cellpadding="0">
    <tr>
        <td width="101">รหัส :</td>
        <td><?php echo $id?></td>
    </tr>
    <tr>
        <td width="101">ชื่อ- สกุล : </td>
        <td><?php echo $fullname?></td>
    </tr>
    <tr>
        <td>อีเมล : </td>
        <td><?php echo $email?></td>
    </tr>
    <tr>
        <td>เบอร์ติดต่อ :</td>
        <td><?php echo $tel?></td>
    </tr>
    <tr>
        <td>ที่อยู่</td>
        <td><?php echo $address?></td>
    </tr>
</table><BR>

<?php
    if ($query_order_detail->num_rows() > 0) {
?>
    <table width="100%" border="1">
        <tr bgcolor="#E8E8E8">
            <td width="60%"><center><b>ชื่อสินค้า</b></center></td>
            <td width="12%"><center><b>จำนวน</b></center></td>
            <td width="10%"><center><b>รำคำ</b></center></td>
            <td width="12%"><center><b>รวม</b></center></td>
        </tr>
        
        <?php
            foreach ($query_order_detail->result_array() as $row)
            {
                $ref_id_product = $row['ref_id_product'];
                $title          = $row['title'];
                $qty            = $row['qty'];
                $price          = number_format($row['price']);
                $subtotal       = number_format($row['subtotal']);
                echo "<tr>
                <td>$title</td>
                <td>$qty</td>
                <td>$price</td>
                <td>$subtotal</td>
                </tr>";
            }
            echo "</table><br/>";
            echo " จำนวนเงินทั้งหมด";
            echo number_format($total);
            echo " บาท <br/>";
    }
?>