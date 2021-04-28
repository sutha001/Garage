<?php include 'connect.php'; ?>

<?php


$Spares_id = $_POST['Spare_id'];
$type_spare = $_POST['type_spare'];
$type_car = $_POST['type_car'];
$brand_car = $_POST['brand_car'];
$details_spare = $_POST['details_spare'];
$price_spare = $_POST['price_spare'];
$stock = $_POST['stock'];

$sql = "UPDATE spares SET  
			spares_type='$type_spare' ,
			spares_model='$type_car' , 
			spares_details='$details_spare' ,
			spares_price='$price_spare' ,
			stock ='$stock'
            WHERE Spares_id = '$Spares_id' ";

$result = $connect->query($sql)or die(mysqli_error($connect).":".$sql);;
if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = '../admin/show-spares-admin.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
	echo "window.location = '../admin/show-spares-admin.php'; ";
	echo "</script>";
}



?>