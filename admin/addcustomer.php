<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADDCUSTOMER</title>
</head>

<body>
    <h1>Add Customer</h1>
    <form action="../process/addcustomerprocess.php" method="post">
        <label>เลขทะเบียนรถยนต์</label>
        <input type="text" name="vrnumber"><br> 
        <label>ชือ-นามสกุล</label>
        <input type="text" name="name"><br>
        <label>เบอร์โทรศัพท์</label>
        <input type="text" name="phone_number"><br>
        <label>ประเภทรถยนต์</label>
        <select name="type_car">
            <option value="รถเก๋ง">รถเก๋ง</option>
            <option value="รถตู้">รถตู้</option>
            <option value="รถกระบะ">รถกระบะ</option>
        </select><br>
        <label>รุ่นรถยนต์</label>
        <input type="text" name="model_car"><br>
        <label>เลขตัวถัง</label>
        <input type="text" name="vin_car"><br>
        <label>ยี่ห้อรถยนต์</label>
        <input type="text" name="brand_car"><br>
        <label>เลขเครื่องยนต์ </label>
        <input type="text" name="engine_car"><br>
        <input type="submit" value="add customer">
    </form>
</body>

</html>