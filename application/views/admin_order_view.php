<?php
    if ($query->num_rows() > 0) {
    ?>
    <table width="80%" border="1" >
        <thead bgcolor='#E8E8E8'>
            <tr>
                <th width="10%">#</th>
                <th width="30%">ชื่อ- สกุล</th>
                <th width="30%">เบอร์ติดต่อ</th>
                <th width="15%">ราคารวม</th>
                <th width="15%">ลบ</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($query->result_array() as $row)
            {
                $id        = $row['id'];
                $fullname  = $row['fullname'];
                $tel       = $row['tel'];
                $total     = $row['total'];
                $id_url    = anchor('admin_order/detail/'.$id, $id);
                $attributs = "onclick= \"return confirm('คุณแน่ใจที่จะลบข้อมูลออกจากระบบ' )\"";
                $delete_url= anchor('admin_order/delete/'.$id, 'ลบ',$attributs);
        ?>
        <tr>
            <td align="center"><?php echo $id_url?></td>
            <td><?php echo $fullname?></td>
            <td><?php echo $tel?></td>
            <td align="center"><?php echo $total?></td>
            <td align="center"><?php echo $delete_url?></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <?php
    }
    ?>