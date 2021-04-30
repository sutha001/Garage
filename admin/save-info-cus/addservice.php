<?php include '../../process/connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../from.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>ADDCUSTOMER</title>
</head>

<body>
    <?php 
    $car_id = mysqli_real_escape_string($connect, $_GET['car_id']);
    $em_id = mysqli_real_escape_string($connect, $_GET['em_id']);    
    
    ?>
    <div class="allfrom">
        <h1>Add Service</h1>
        <hr>
        <form action="info-re.php" method="post">
            <div class="row">
                <div class="col-4">
                    <label for="inputState" class="form-label">วันที่เข้าใช้บริการ</label>
                    <input type="date" name="date_access" class="form-control" placeholder="วันที่เข้าใช้บริการ" aria-label="วันที่เข้าใช้บริการ">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="inputState" class="form-label">รหัสรถยนต์</label>
                    <input type="text" name="car_id" class="form-control" value="<?= $car_id;?>" readonly>
                </div>
            </div>
            <hr>
            <div class="row">
                <input type="hidden" name="em_id" value="<?= $em_id;?>">
                <input type="submit" value="ADD Service" class="btn btn-dark" style="margin:1% auto 1%">
                <a href="../save-info-customer.php" class="btn btn-dark">ยกเลิกการบันทึก</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>