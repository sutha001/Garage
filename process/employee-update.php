<?php include 'connect.php';

// ดึง id ที่รับมา

$em_id = mysqli_real_escape_string($connect, $_GET['em_id']);

$sql = "SELECT * 
FROM employees
WHERE em_id='$em_id'";

$result = $connect->query($sql);

$row = mysqli_fetch_array($result) or die(mysqli_error($connect) . ":" . $sql);
extract($row);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Empolyee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../admin/from.css">
</head>

<body>
    <div class='allfrom'>
        <h1>แก้ไขชื่อพนักงาน</h1>
        <hr>
        <form action="employee-update-precess.php" method="post">
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4'>ID</label>
                    <input class='col-6' type="text" name="id" readonly value="<?= $em_id; ?>"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4'>ชือ-นามสกุล</label>
                    <input class='col-6' type="text" name="name" value="<?= $em_name; ?>"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4'>เบอร์โทรศัพท์</label>
                    <input class='col-6' type="text" name="phone_number" value="<?= $em_phonenumber; ?>"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4'>ตำแหน่งพนักงาน</label>
                    <select name="position">
                        <option value="<?= $em_position; ?>"><?= $em_position; ?></option>
                        <option value="หัวหน้าช่าง">หัวหน้าช่าง</option>
                        <option value="ช่าง">ช่าง</option>
                    </select><br>
                </div>
            </div>
            <hr>
            <div class="row">
                <input type="submit" value="แก้ไข" class="btn btn-dark" style="margin:1% auto 1%">
                <a href="../admin/show-info-employee.php" class="btn btn-dark">ย้อนกลับ</a>
            </div>
        </form>
    </div>
</body>

</html>