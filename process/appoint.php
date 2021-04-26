<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appoint</title>
</head>

<body>
    <h1>Add Appoint</h1>
    <form action="../process/addtimecustomer.php" method="post">
        
        <label>วันที่นัดหมาย</label>
        <input type="text" name="ap_data"><br>
        <label>เวลานัดหมาย</label>
        <input type="text" name="ap_time"><br>
        <label>เวลาสร้างนัดหมาย</label>
        <input type="text" name="create_date"><br>
        <label>ป้ายทะเบียนรถ</label>
        <input type="text" name="customer_car_id"><br>
        <input type="submit" value="add appoint">
    </form>
</body>

</html>