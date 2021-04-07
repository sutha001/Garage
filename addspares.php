<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Spares</title>
</head>

<body>
    <h1>Add Spares</h1>
    <form action="process/addsparesprocess.php" method="post">
        <label>หมวด</label>
        <select name="type_spare">
            <option value="engine">หมวดเครื่องยนต์</option>
            <option value="fuel">หมวดเชื้อเพลิง</option>
            <option value="transmit_power">หมวดส่งกำลัง</option>
            <option value="air_conditioners">หมวดเครื่องปรับอากาศ</option>
            <option value="external_body">หมวดตัวถังภายนอก</option>
            <option value="electricity">หมวดไฟฟ้า</option>
            <option value="general">หมวดทั่วไป</option>
        </select><br>
        <label>ประเภทรถยนต์</label>
        <select name="type_car">
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
        <input type="text" name="details_spare"><br>
        <label>เรท</label>
        <input type="text" name="rate_spare"><br>
        <label>ราคา</label>
        <input type="number" name="price_spare"><br>
        <input type="submit" value="add spares">
    </form>
</body>

</html>