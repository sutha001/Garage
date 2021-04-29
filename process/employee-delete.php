<?php include 'connect.php';

$em_id = isset($_GET['em_id']) ? $_GET['em_id'] : '';

$sql = "DELETE  FROM employees
WHERE em_id='$em_id'";

$result = $connect->query($sql) or die(mysqli_error($connect).":".$sql);

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('delete Succesfuly');";
    echo "window.location = '../admin/show-info-employee.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to delete again');";
    echo "window.location = '../admin/show-info-employee.php.php'; ";
    echo "</script>";
}

?>
