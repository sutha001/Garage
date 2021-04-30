<?php include '../../process/connect.php';
$car_id = mysqli_real_escape_string($connect, $_GET['car_id']);
$em_id = mysqli_real_escape_string($connect, $_GET['em_id']);
$Spares_id = mysqli_real_escape_string($connect, $_GET['Spares_id']);
$date_access = mysqli_real_escape_string($connect, $_GET['date_access']);
$spares_price = mysqli_real_escape_string($connect, $_GET['spares_price']);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../from.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>ADDINFOMATION REPAIR</title>
</head>

<body>
    <div class="allfrom">
        <h1>ADDINFOMATION REPAIR</h1>
        <hr>
        <form action="info-repair-process2.php" method="post">
            <div class="row">
                <div class="col-4">
                    <input type="date" name="completion_date" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <input type="number" name="service_charge" class="form-control" placeholder="ค่าบริการ" aria-label="ค่าบริการ">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <input type="number" name="price_per_piece" class="form-control" placeholder="ราคาต่อชิ้น" aria-label="ราคาต่อชิ้น" value="<?= $spares_price ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <input type="number" name="amount" class="form-control" placeholder="จำนวน" aria-label="จำนวน">
                </div>
            </div>
            <hr>
            <div class="row">
                <input type="hidden" name="em_id" value="<?= $em_id ?>">
                <input type="hidden" name="car_id"  value="<?= $car_id ?>" >
                <input type="hidden" name="Spares_id"  value="<?= $Spares_id ?>" >
                <input type="hidden" name="date_access"  value="<?= $date_access ?>" >
                <input type="submit" value="ADD Repair" class="btn btn-dark" style="margin:1% auto 1%">
                <a href="window.history.back()" class="btn btn-dark">ย้อนกลับ</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>