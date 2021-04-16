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
</head>

<body>
    <h1>แก้ไขอะไหล่</h1>
    <form action="spares-update-prosess.php" method="post">
        <label>ID</label>
        <input type="text" name="Spare_id" readonly value="<?= $Spares_id; ?>"><br>
        <label>หมวด</label>
        <select name="type_spare">
            <option value="<?= $spares_type; ?>">หมวด<?= $spares_type; ?></option>
            <option value="เครื่องยนต์">หมวดเครื่องยนต์</option>
            <option value="เชื้อเพลิง">หมวดเชื้อเพลิง</option>
            <option value="ส่งกำลัง">หมวดส่งกำลัง</option>
            <option value="เครื่องปรับอากาศ">หมวดเครื่องปรับอากาศ</option>
            <option value="ตัวถังภายนอก">หมวดตัวถังภายนอก</option>
            <option value="ไฟฟ้า">หมวดไฟฟ้า</option>
            <option value="ทั่วไป">หมวดทั่วไป</option>
        </select><br>
        <label>ประเภทรถยนต์</label>
        <select name="type_car">
            <option value="<?= $spares_model; ?>"><?= $spares_model; ?></option>
            <option value="รถเก๋ง">รถเก๋ง</option>
            <option value="รถตู้">รถตู้</option>
            <option value="รถกระบะ">รถกระบะ</option>
        </select><br>
        <label>ยี่ห้อ</label>
        <select name="brand_car">
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
        <label>รายละเอียด</label>
        <input type="text" name="details_spare" value="<?= $spares_details; ?>"><br>
        <label>เรท</label>
        <input type="text" name="rate_spare" value="<?= $rate; ?>"><br>
        <label>ราคา</label>
        <input type="number" name="price_spare" value="<?= $spares_price; ?>"><br>
        <input type="submit" value="แก้ไข">
    </form>
</body>

</html>