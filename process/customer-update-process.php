<?php include 'connect.php'; ?>

<?php 
    $id = $_POST['id'];
    $car_id = $_POST['vrnumber'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $type_car = $_POST['type_car'];
    $model_car = $_POST['model_car'];
    $vin_car = $_POST['vin_car'];
    $brand_car = $_POST['brand_car'];
    $engine_car = $_POST['engine_car'];

    $sql = "UPDATE customer,customer_car 
    SET  
    customer.cus_name='$name', 
    customer.cus_phonenumber='$phone_number',
    customer_car.type_car='$type_car',
    customer_car.model_car='$model_car',
    customer_car.vin_car='$vin_car',
    customer_car.brand_car='$brand_car',
    customer_car.engine_car='$engine_car'
    
    WHERE customer_car.car_id = '$id' AND customer.cus_car_id = '$car_id'";

    $result = $connect->query($sql)or die(mysqli_error($connect).":".$sql);;
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('Update Succesfuly');";
        echo "window.location = '../admin/show-infocustomer-admin.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
        echo "window.location = '../admin/show-infocustomer-admin.php'; ";
        echo "</script>";
    }

?>