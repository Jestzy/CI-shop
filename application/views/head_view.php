<!DOCTYPE html>
<html>
<head>
    <title>:: ร้านค้าออนไลน์ :: </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h2>:: ร้านค้าออนไลน์ :: </h2>
    
    <?php
    echo anchor('start','หน้าแรก')." | ";
    echo anchor('mycart','ตะกร้าสินค้า');
    echo "<br/><br/>";
    ?>
    <table width="770" border="0">
        <tr>
        <td width="174" valign="top">
        <b>ประเภทสินค้า</b><br/>
    
        <?php
            echo "<ul>";
            foreach ($query_tb_type->result_array() as $row)
            {
                $id=$row['id'];
                $title=$row['title'];
                $url=anchor('product/lists/'.$id, $title, 'attributs');
                echo "<li>$url</li>";
            }
            echo "</ul>";
        ?>
    </td>
<td width="580" valign="top">