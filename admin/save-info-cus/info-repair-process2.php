<?php include '../../process/connect.php'; ?>

<?php 

    $car_id = $_POST['car_id'];
    $em_id = $_POST['em_id'];
    $Spares_id = $_POST['Spares_id'];
    $date_access = $_POST['date_access'];

    
    $completion_date = $_POST['completion_date'];
    $service_charge = $_POST['service_charge'];
    $price_per_piece = $_POST['price_per_piece'];
    $amount = $_POST['amount'];


    $sql="INSERT INTO info_repair (completion_date,service_charge,price_per_piece,amount,em_id,Service_id,Spares_id)
    VALUES ('$completion_date','$service_charge','$price_per_piece','$amount','$em_id',(SELECT MAX(Service_id) FROM service),'$Spares_id')";


    $result = $connect->query($sql)or die(mysqli_error($connect).":".$sql);

    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลสำเร็จ');";
        echo "window.location = '../../admin/save-info-customer.php'";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
        echo "window.history.back()";
        echo "</script>";
    }

?>