<!DOCTYPE html>
<html>
<head>
    <title>:: ร้านค้าออนไลน์ (Admin) :: </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
<body>
<h2>:: ร้านค้าออนไลน์ (Admin) :: </h2>
    <?php
    echo anchor('admin','หน้าแรก')." | ";
    echo anchor('admin_order','รายการใบสั่งซื้อ')." | ";
    echo anchor('admin_product/insert','เพิ่มสินค้า')." | ";
    echo anchor('admin_product','สินค้า')." | ";
    echo anchor('admin_type','ประเภทสินค้า')." | ";
    echo anchor('admin/logout','ออกจากระบบ')."<br/>";
    echo "<br/>";
    ?>