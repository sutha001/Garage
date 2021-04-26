<?php include 'connect.php';

$cus_car_id = isset($_GET['cus_car_id']) ? $_GET['cus_car_id'] : '';

$sql = "DELETE customer , customer_car  FROM customer 
JOIN customer_car
ON customer_cus_car_id = cus_car_id
WHERE cus_car_id='$cus_car_id'";


$result = $connect->query($sql);




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
