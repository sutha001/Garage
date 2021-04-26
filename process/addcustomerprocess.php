<?php include 'connect.php'; ?>

<?php 

    $car_id = $_POST['vrnumber'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $type_car = $_POST['type_car'];
    $model_car = $_POST['model_car'];
    $vin_car = $_POST['vin_car'];
    $brand_car = $_POST['brand_car'];
    $engine_car = $_POST['engine_car'];

    mysqli_query($connect, "INSERT INTO customer (cus_car_id, cus_name, cus_phonenumber)
    VALUES ('$car_id','$name','$phone_number')");

    mysqli_query($connect, "INSERT INTO customer_car (type_car, model_car, vin_car, brand_car, engine_car, customer_cus_car_id)
    VALUES ('$type_car','$model_car', '$vin_car','$brand_car','$engine_car', '$car_id')");

echo '<script>alert("เพิ่มข้อมูลลูกค้าสำเร็จสำเร็จ")</script>';
header('Refresh: 1; url=../admin/addcustomer.php');

?>