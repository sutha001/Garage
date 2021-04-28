<?php include '../process/connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<?php
$car_id = mysqli_real_escape_string($connect, $_GET['car_id']);

$sql = "SELECT * 
    FROM customer,customer_car
    WHERE car_id='$car_id' ";
$result = $connect->query($sql);

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appoint</title>
</head>

<body>
    <h1>Add Appoint</h1>
    <form action="../process/add-appoint-process.php" method="post">
        <label>วันที่นัดหมาย</label>
        <input type="date" name="ap_data"><br>
        <label>เวลานัดหมาย</label>
        <input type="datetime-local" name="ap_time"><br>
        <label>เวลาสร้างนัดหมาย</label>
        <input type="date" name="create_date"><br>
        <label>เลขทะเบียนรถ</label>
        <input type="text" name="customer_car_id" value="<?= $car_id; ?>" readonly><br>
        <input type="submit" value="add appoint">
    </form>
</body>

</html>