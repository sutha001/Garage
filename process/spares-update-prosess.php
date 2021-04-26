<?php include 'connect.php'; ?>

<?php


$Spares_id = $_POST['Spare_id'];
$type_spare = $_POST['type_spare'];
$type_car = $_POST['type_car'];
$brand_car = $_POST['brand_car'];
$details_spare = $_POST['details_spare'];
$price_spare = $_POST['price_spare'];
$rate_spare = $_POST['rate_spare'];

$sql = "UPDATE spares SET  
			spares_type='$type_spare' ,
			spares_model='$type_car' , 
			spares_details='$details_spare' ,
			spares_price='$price_spare' ,
			rate ='$rate_spare'
            WHERE Spares_id = '$Spares_id' ";

mysqli_query($connect, $sql);

echo '<script>alert("แก้ไขข้อมูลสำเร็จ")</script>';


header('Refresh: 1; url=../admin/show-spares-admin.php');



?>