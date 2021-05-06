<?php include 'connect.php';

// ดึง id ที่รับมา

$Spares_id = mysqli_real_escape_string($connect, $_GET['Spares_id']);

$sql = "SELECT * FROM spares WHERE Spares_id='$Spares_id' ";
$result = $connect->query($sql);

$row = mysqli_fetch_array($result);
extract($row);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Spares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../admin/from.css">
</head>

<body>
    <div class='allfrom'>
        <h1>แก้ไขอะไหล่</h1>
        <hr>
        <form action="spares-update-prosess.php" method="post">

            <div class="row">
                <div class="col-4 d-flex "> <label class='col-4'>ID</label>
                    <input class='col-6' type="text" name="Spare_id" readonly value="<?= $Spares_id; ?>"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4'>หมวด</label>
                    <select name="type_spare">
                        <option value="<?= $spares_group; ?>"><?= $spares_group; ?></option>
                        <option value="หมวดเครื่องยนต์">หมวดเครื่องยนต์</option>
                        <option value="หมวดเชื้อเพลิง">หมวดเชื้อเพลิง</option>
                        <option value="หมวดส่งกำลัง">หมวดส่งกำลัง</option>
                        <option value="หมวดเครื่องปรับอากาศ">หมวดเครื่องปรับอากาศ</option>
                        <option value="หมวดตัวถังภายนอก">หมวดตัวถังภายนอก</option>
                        <option value="หมวดไฟฟ้า">หมวดไฟฟ้า</option>
                        <option value="หมวดทั่วไป">หมวดทั่วไป</option>
                    </select><br>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4'>ประเภทรถยนต์</label>
                    <select name="type_car">
                        <option value="<?= $spares_type; ?>"><?= $spares_type; ?></option>
                        <option value="รถเก๋ง">รถเก๋ง</option>
                        <option value="รถตู้">รถตู้</option>
                        <option value="รถกระบะ">รถกระบะ</option>
                    </select><br>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4'>ยี่ห้อ</label>
                    <select name="brand_car">
                        <option value="<?= $spares_model; ?>"><?= $spares_model; ?></option>
                        <option value="toyota">TOYOTA</option>
                        <option value="isuza">ISUZU</option>
                        <option value="honda">HONDA</option>
                        <option value="mitsubishi">MITSUBISHI</option>
                        <option value="nissan">NISSAN</option>
                        <option value="mazda">MAZDA</option>
                        <option value="ford">FORD</option>
                        <option value="mg">MG</option>
                        <option value="suzuki">SUZUKI</option>
                        <option value="chevrolet">CHEVROLET</option>
                    </select><br>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4'>รายละเอียด</label>
                    <input class='col-6' type="text" name="details_spare" value="<?= $spares_details; ?>"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex ">

                    <label class='col-4'>Stock</label>
                    <input class='col-6' type="number" name="stock" value="<?= $stock; ?>"><br>

                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex ">
                    <label class='col-4'>ราคา</label>
                    <input class='col-6' type="number" name="price_spare" value="<?= $spares_price; ?>"><br>
                </div>
            </div>
            <hr>
            <div class="row">
                <input class="btn btn-dark" style="margin:1% auto 1%" type="submit" value="แก้ไข">
            </div>
            <div class="row">

                <a href="../admin/show-spares-admin.php" class="btn btn-dark">ย้อนกลับ</a>
            </div>
        </form>
</body>

</html>