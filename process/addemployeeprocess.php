<?php include 'connect.php'; ?>

<?php

$em_name = $_POST['name'];
$em_phonenumber = $_POST['phone_number'];
$em_positon = $_POST['positon'];



$sql = "INSERT INTO employees (em_name, em_phonenumber, em_position)
    VALUES ('$em_name','$em_phonenumber','$em_positon')";


$result = $connect->query($sql) or die(mysqli_error($connect) . ":" . $sql);
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('เพื่มข้อมูลสำเร็จ');";
    echo "window.location = '../admin/show-info-employee.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to Update again');";
    echo "window.location = '../admin/show-info-employee.php'; ";
    echo "</script>";
}

?>