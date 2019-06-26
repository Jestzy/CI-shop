<?php
    if ($query->num_rows() > 0) {
?>
    <table width="80%" border="1" >
        <thead bgcolor='#E8E8E8'>
            <tr>
                <th width="10%">#</th>
                <th width="60%">ชื่อสินค้า</th>
                <th width="60%">ราคา</th>
                <th width="20%">แก้ไข</th>
                <th width="20%">ลบ</th>
            </tr>
        </thead>
    <tbody>
   
    <?php
        foreach ($query->result_array() as $row)
        {
            $id=$row['id'];
            $title=$row['title'];
            $price=$row['price'];
            $photo=$row['photo'];
            $update=anchor('admin_product/update/'.$id, 'แก้ไข');
            $attributs="onclick= \"return confirm('คุณแน่ใจที่จะลบข้อมูลออกจากระบบ? ')\"";
            $delete=anchor('admin_product/delete/'.$id.'/'.$photo, 'ลบ',$attributs);
    ?>
        <tr>
            <td align="center"><?php echo $id?></td>
            <td><?php echo $title?></td>
            <td align="center"><?php echo $price?></td>
            <td align="center"><?php echo $update?></td>
            <td align="center"><?php echo $delete?></td>
        <tr>
        <?php
        }
        ?>
        
    </tbody>
    </table>
<?php
}
?>