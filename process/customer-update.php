<?php include 'connect.php';

// ดึง id ที่รับมา

$cus_car_id = mysqli_real_escape_string($connect, $_GET['cus_car_id']);

$sql = "SELECT * 
FROM customer
NATURAL JOIN customer_car
WHERE cus_car_id='$cus_car_id'";

$result = $connect->query($sql);

$row = mysqli_fetch_array($result) or die(mysqli_error($connect).":".$sql);
extract($row);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADDCUSTOMER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../admin/from.css">
</head>

<body>
<div class='allfrom'>
    <h1>แก้ไขชื่อลูกค้า </h1>
    <hr>
    <form action="customer-update-process.php" method="post">
    <div class="row">
        <div class="col-4 d-flex ">
            <label class = 'col-4' >ID</label>
            <input class = 'col-6' type="text" name="id" readonly value="<?= $car_id; ?>"><br>
            </div>
            </div>
        <div class="row">
        <div class="col-4 d-flex ">
            <label class = 'col-4'>เลขทะเบียนรถยนต์</label>
            <input class = 'col-6' type="text" name="vrnumber" readonly value="<?= $cus_car_id; ?>"><br>
            </div>
            </div>
        <div class="row">
        <div class="col-4 d-flex ">
            <label class = 'col-4'>ชือ-นามสกุล</label>
            <input class = 'col-6' type="text" name="name" value="<?= $cus_name; ?>"><br>
            </div>
            </div>
        <div class="row">
        <div class="col-4 d-flex ">
            <label class = 'col-4'>เบอร์โทรศัพท์</label>
            <input class = 'col-6' type="text" name="phone_number" value="<?= $cus_phonenumber; ?>"><br>
            </div>
            </div>
        <div class="row">
        <div class="col-4 d-flex ">
            <label class = 'col-4'>ประเภทรถยนต์</label>
            <select name="type_car">
                <option value="<?= $type_car; ?>">รถเก๋ง</option>
                <option value="รถเก๋ง">รถเก๋ง</option>
                <option value="รถตู้">รถตู้</option>
                <option value="รถกระบะ">รถกระบะ</option>
        </select><br>
        </div>
            </div>
        <div class="row">
        <div class="col-4 d-flex ">
            <label class = 'col-4'>รุ่นรถยนต์</label>
            <input class = 'col-6' type="text" name="model_car" value="<?= $model_car; ?>"><br>
            </div>
            </div>
        <div class="row">
        <div class="col-4 d-flex ">
            <label class = 'col-4'>เลขตัวถัง</label>
            <input class = 'col-6' type="text" name="vin_car" value="<?= $vin_car; ?>"><br>
            </div>
            </div>
        <div class="row">
        <div class="col-4 d-flex ">
            <label class = 'col-4'>ยี่ห้อรถยนต์</label>
            <input class = 'col-6' type="text" name="brand_car" value="<?= $brand_car; ?>"><br>
            </div>
            </div>
        <div class="row">
        <div class="col-4 d-flex ">
            <label class = 'col-4'>เลขเครื่องยนต์ </label>
            <input class = 'col-6' type="text" name="engine_car" value="<?= $engine_car; ?>"><br>
            </div>
            </div>
            <hr>
        <div class="row">
       
        
        <input type="submit" value="แก้ไข" class="btn btn-dark" style="margin:1% auto 1%">
                <a href="../admin/show-infocustomer-admin.php" class="btn btn-dark">ย้อนกลับ</a>
                
            </div>
    </form>
    </div>
</body>

</html>