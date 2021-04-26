<?php include 'connect.php';

$Spares_id = isset($_GET['Spares_id']) ? $_GET['Spares_id'] : '';

$sql = "DELETE FROM spares WHERE Spares_id='$Spares_id' ";
$result = $connect->query($sql);

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('delete Succesfuly');";
    echo "window.location = '../admin/show-spares-admin.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to delete again');";
    echo "</script>";
}

?>
