<?php include 'connect.php'; ?>

<?php 

    $car_id = mysqli_real_escape_string($connect, $_GET['car_id']);
    $em_id = mysqli_real_escape_string($connect, $_GET['em_id']);
    $date_access = $_POST['date_access'];

    $sql="INSERT INTO service (date_access, car_id)
    VALUES ('$car_id','$car_id')";

    $result = $connect->query($sql)or die(mysqli_error($connect).":".$sql);

    echo '<script>alert("เพิ่มข้อมูลลูกค้าสำเร็จสำเร็จ")</script>';
    header('Refresh: 1; url=../admin/addcustomer.php');
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มข้อมูลส่วน Service สำเร็จ');";
        echo "window.location = 'info-re.php'";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
        echo "window.history.back()";
        echo "</script>";
    }

?>