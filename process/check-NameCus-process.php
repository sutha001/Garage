<?php include 'connect.php';



    $cus_name = $_POST['vrnumber'];

    $check = "
	SELECT  cus_car_id
	FROM customer  
	WHERE cus_name = '$cus_name' 
	";

    $result = $connect->query($check);
    $num=mysqli_num_rows($result);

    if($num > 0)
    {
        header("Location: ../customer/show-appoint.php?cus_name=$cus_name");
        
        exit;
    }
    else
    {
	
        echo "<script>";
        echo "alert(' ยังไม่มีข้อมูลนี้ ');";
        echo "window.history.back();";
        echo "</script>";
 
    }

?>
