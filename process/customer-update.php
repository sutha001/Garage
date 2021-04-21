<?php include 'connect.php';

// ดึง id ที่รับมา

$cus_car_id = mysqli_real_escape_string($connect, $_GET['cus_car_id']);
$car_id = mysqli_real_escape_string($connect, $_GET['car_id']);

$sql = "SELECT * 
FROM customer
JOIN customer_car
ON cstomer_cus_car_id = cus_car_id 
WHERE cus_car_id='$cus_car_id' ";

$result = $connect->query($sql);

$row = mysqli_fetch_array($result);
extract($row);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADDCUSTOMER</title>
</head>

<body>
    <h1>แก้ไขชื่อลูกค้า </h1>
    <form action="process/addcustomerprocess.php" method="post">
        <label>ID</label>
        <input type="text" name="Spare_id" readonly value="<?= $car_id; ?>"><br>
        <label>เลขทะเบียนรถยนต์</label>
        <input type="text" name="vrnumber" value="<?= $cus_car_id; ?>"><br>
        <label>ชือ-นามสกุล</label>
        <input type="text" name="name" value="<?= $cus_name; ?>"><br>
        <label>เบอร์โทรศัพท์</label>
        <input type="text" name="phone_number" value="<?= $cus_phonenumber; ?>"><br>
        <label>ประเภทรถยนต์</label>
        <select name="type_car">
            <option value="<?= $type_car; ?>">รถเก๋ง</option>
            <option value="รถเก๋ง">รถเก๋ง</option>
            <option value="รถตู้">รถตู้</option>
            <option value="รถกระบะ">รถกระบะ</option>
        </select><br>
        <label>รุ่นรถยนต์</label>
        <input type="text" name="model_car" value="<?= $model_car; ?>"><br>
        <label>เลขตัวถัง</label>
        <input type="text" name="vin_car" value="<?= $vin_car; ?>"><br>
        <label>ยี่ห้อรถยนต์</label>
        <input type="text" name="brand_car" value="<?= $brand_car; ?>"><br>
        <label>เลขเครื่องยนต์ </label>
        <input type="text" name="engine_car" value="<?= $engine_car; ?>"><br>
        <input type="submit" value="แก้ไข">
    </form>
</body>

</html>