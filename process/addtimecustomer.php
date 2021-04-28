<?php include 'connect.php'; ?>

<?php
    $ap_data = $_POST['ap_data'];
    $ap_time = $_POST['ap_time'];
    $create_date = $_POST['create_date'];
    $customer_car_id = $_POST['cus_car_id'];

    mysqli_query($connect, "INSERT INTO appoint (ap_data, ap_time, create_date,cus_car_id)
                        VALUES ('$ap_data','$ap_time','$create_date','$customer_car_id')");

    echo '<script>alert("เพิ่มวัดนัดสำเร็จ")</script>';
?>