<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="from.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>AddEmployee</title>
</head>

<body>
    <div class="allfrom">
        <h1>เพิ่มพนักงาน</h1>
        <hr>
        <form action="../process/addemployeeprocess.php" method="post">
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
                    <label for="inputState" class="form-label">ตำแหน่งพนักงาน</label>
                    <select name="positon" class="form-select">
                        <option value="หัวหน้าช่าง">หัวหน้าช่าง</option>
                        <option value="ช่าง">ช่าง</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row">
                <input type="submit" value="เพิ่ม" class="btn btn-dark" style="margin:1% auto 1%">
                <a href="show-infocustomer-admin.php" class="btn btn-dark">ย้อนกลับ</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>