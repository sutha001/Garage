<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="from.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>ADDCUSTOMER</title>
</head>

<body>
    <div class="allfrom">
        <h1>Add Customer</h1>
        <hr>
        <form action="../process/addcustomerprocess.php" method="post">
            <div class="row">
                <div class="col-4">
                    <input type="text" name="vrnumber" class="form-control" placeholder="เลขทะเบียนรถยนต์" aria-label="เลขทะเบียนรถยนต์">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <input type="text" name="name" class="form-control" placeholder="ชื่อ-นามสกุล" aria-label="ชื่อ-นามสกุล">
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <input type="text" name="phone_number" class="form-control" placeholder="เบอร์โทรศัพท์" aria-label="เบอร์โทรศัพท์">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="inputState" class="form-label">ประเภทรถยนต์</label>
                    <select name="type_car" class="form-select">
                        <option value="รถเก๋ง">รถเก๋ง</option>
                        <option value="รถตู้">รถตู้</option>
                        <option value="รถกระบะ">รถกระบะ</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <input type="text" name="model_car" class="form-control" placeholder="รุ่นรถยนต์" aria-label="รุ่นรถยนต์">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <input type="text" name="vin_car" class="form-control" placeholder="เลขตัวถัง" aria-label="เลขตัวถัง">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <input type="text" name="brand_car" class="form-control" placeholder="ยี่ห้อรถยนต์" aria-label="ยี่ห้อรถยนต์">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <input type="text" name="engine_car" class="form-control" placeholder="เลขเครื่องยนต์" aria-label="เลขเครื่องยนต์">
                </div>
            </div>
            <hr>
            <div class="row">
                <input type="submit" value="add customer" class="btn btn-dark" style="margin:1% auto 1%">
                <a href="show-infocustomer-admin.php" class="btn btn-dark">ย้อนกลับ</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>