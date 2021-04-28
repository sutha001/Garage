<?php include 'connect.php';

$cus_car_id = isset($_GET['cus_car_id']) ? $_GET['cus_car_id'] : '';

$sql = "DELETE customer , customer_car  FROM customer 
NATURAL JOIN customer_car
WHERE cus_car_id='$cus_car_id'";


$result = $connect->query($sql) or die(mysqli_error($connect).":".$sql);




//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('delete Succesfuly');";
    echo "window.location = '../admin/show-infocustomer-admin.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to delete again');";
    echo "window.location = '../admin/show-infocustomer-admin.php'; ";
    echo "</script>";
}

?>
