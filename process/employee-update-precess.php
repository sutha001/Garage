<?php include 'connect.php'; ?>

<?php 
    $em_id = $_POST['id'];
    $em_name = $_POST['name'];
    $em_phonenumber = $_POST['phone_number'];
    $em_position = $_POST['position'];

    $sql = "UPDATE employees
    SET  
    em_name='$em_name', 
    em_phonenumber='$em_phonenumber',
    em_position='$em_position'
    
    WHERE em_id = '$em_id'";

    $result = $connect->query($sql)or die(mysqli_error($connect).":".$sql);;
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลสำเร็จ');";
        echo "window.location = '../admin/show-info-employee.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
        echo "window.location = '../admin/show-info-employee.php'; ";
        echo "</script>";
    }

?>