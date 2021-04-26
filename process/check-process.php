<?php include 'connect.php';



    $cus_car_id = $_POST['vrnumber'];

    $check = "
	SELECT  cus_car_id
	FROM customer  
	WHERE cus_car_id = '$cus_car_id' 
	";

    $result = $connect->query($check);
    $num=mysqli_num_rows($result);

    if($num > 0)
    {
        echo "<script>";
        echo "alert('มีเลขทะเบียนนี้อยู่ในระบบ');";
        echo "window.history.back();";
        echo "</script>";
    }
    else
    {
	
        echo "<script>";
        echo "alert(' ยังไม่มีข้อมูลนี้ ');";
        echo "window.history.back();";
        echo "</script>";
 
    }

?>
