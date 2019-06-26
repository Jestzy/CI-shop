<!DOCTYPE html>
<html>
<head>
    <title>:: ร้านค้าออนไลน์(Admin) :: </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
   
</head>
<body>
    <div class="container text-center">

        <h3>:: ร้านค้าออนไลน์(Admin) :: </h3>
        <div class='form-group'>
            <?php
                echo validation_errors();
                echo form_open('admin/login2',['class' => 'form-group']);
                echo "<div class='form-group'>";
                echo "รหัสผู้ใช้: <br/>";
                echo form_input(['user','class' => 'form-control', set_value('user')] )."<br/>";
                echo "รหัสผ่าน: <br/>";
                echo form_password(['pass', 'class' => 'form-control'])."<br/>";
                echo form_submit('mysubmit','Submit');
                echo form_reset('myreset','Reset');
            echo "</div>";
                echo form_close();
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>