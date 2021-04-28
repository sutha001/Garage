<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="from.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Add Spares</title>
</head>

<body>
    <div class="allfrom">
        <h1>Add Spares</h1>
        <hr>
        <form action="../process/addsparesprocess.php" method="post">
            <div class="row">
                <div class="col-4">
                    <label for="inputState" class="form-label">หมวด</label>
                    <select name="type_spare" class="form-select">
                        <option value="เครื่องยนต์">หมวดเครื่องยนต์</option>
                        <option value="เชื้อเพลิง">หมวดเชื้อเพลิง</option>
                        <option value="ส่งกำลัง">หมวดส่งกำลัง</option>
                        <option value="เครื่องปรับอากาศ">หมวดเครื่องปรับอากาศ</option>
                        <option value="ตัวถังภายนอก">หมวดตัวถังภายนอก</option>
                        <option value="ไฟฟ้า">หมวดไฟฟ้า</option>
                        <option value="ทั่วไป">หมวดทั่วไป</option>
                    </select>
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
                    <label for="inputState" class="form-label">ยี่ห้อ</label>
                    <select name="brand_car" class="form-select">
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
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label class="form-label">รายละเอียด</label>
                    <input type="text" name="details_spare" class="form-control" placeholder="รายละเอียด" aria-label="รายละเอียด">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label class="form-label">ราคา</label>
                    <input type="number" name="price_spare" class="form-control">
                </div>
            </div>
            <div class="row">
                    <input type="submit" value="add spares" class="btn btn-dark">
                    <a href="show-spares-admin.php" class="btn btn-dark">ย้อนกลับ</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>