<?php include 'connect.php';

session_start(); 

if (isset($_POST['login'])) {
    $name = mysqli_real_escape_string($connect, $_POST['vrnumber']);

    $query = "SELECT * FROM customer WHERE cus_name = '$name'";
    $results = mysqli_query($connect, $query);
    if (mysqli_num_rows($results) == 1) {
        $_SESSION['cus_name'] = $name;
        header('location: ../customer/show-appoint.php');
        exit;
    }
    else {
        echo "<script>";
        echo "alert(' ยังไม่มีข้อมูลนี้ ');";
        echo "window.history.back();";
        echo "</script>";
    }
}
