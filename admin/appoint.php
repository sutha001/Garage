<?php include '../process/connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<?php
$cus_car_id = mysqli_real_escape_string($connect, $_GET['cus_car_id']);


$sql = "SELECT * 
    FROM customer,
    NATURAL JOIN customer_car
    WHERE cus_car_id='$cus_car_id' ";

$result = $connect->query($sql);

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appoint</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../admin/from.css">
</head>

<body>

    <div class='allfrom'>
        <h1>นัดหมายลูกค้า</h1>
        <hr>
        <form action="../process/add-appoint-process.php" method="post">
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4' >วันที่นัดหมาย</label>
                    <input class='col-6' type="date" name="ap_data"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4' >เวลานัดหมาย</label>
                    <input class='col-6' type="datetime-local" name="ap_time"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4' >เวลาสร้างนัดหมาย</label>
                    <input class='col-6' type="date" name="create_date"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4' >เลขทะเบียนรถ</label>
                    <input class='col-6' type="text" name="customer_car_id" value="<?= $cus_car_id ?>" readonly><br>
                </div>
            </div>
            <hr>
            <div class="row">
                
                    <input  type="submit" value="นัดหมาย" class="btn btn-dark" style="margin:1% auto 1%">
                    <a href="../admin/add-appoint.php" class="btn btn-dark">ย้อนกลับ</a>
                    
               
            </div>
        </form>
    </div>
</body>

</html>