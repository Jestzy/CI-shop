<?php
    echo form_open('admin_type/insert2');
    echo validation_errors();
    echo "เพิ่มประเภทสินค้า";
    echo form_input('title');
    echo form_submit('mysubmit', 'Submit');
    echo form_close();

    if ($query->num_rows() > 0) {
?>
    <br/>
    <table width="60%" border="1" >
        <thead bgcolor='#E8E8E8'>
            <tr>
                <th width="10%">#</th>
                <th width="60%">หัวข้อ</th>
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
                $update=anchor('admin_type/update/'.$id, 'แก้ไข');
                $attributs="onclick= \"return confirm('คุณแน่ใจที่จะลบข้อมูลออกจากระบบ?')\"";
                $delete=anchor('admin_type/delete/'.$id, 'ลบ',$attributs);
            ?>

            <tr>
                <td align="center"><?php echo $id?></td>
                <td><?php echo $title?></td>
                <td align="center"><?php echo $update?></td>
                <td align="center"><?php echo $delete?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
<?php
}
?>
