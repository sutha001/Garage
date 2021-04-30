<?php include '../process/connect.php';
$cus_name = mysqli_real_escape_string($connect, $_GET['cus_name']);
$type_car = mysqli_real_escape_string($connect, $_GET['type_car']);
$type_spare = mysqli_real_escape_string($connect, $_GET['type_spare']);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/style_all_editor.css">
    <title>Spares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>

<body>
    <div class="area_all" style="background-color: black;">
        <div class="menu_editor">
            <div class="row_edit">
                <a href="show-appoint.php?cus_name=<?php echo $cus_name ?>" class="btn btn-dark" style="background-color:  #4f4f4f; ">ข้อมูลการนัดหมาย</a>
            </div>
            <div class="row_edit">
                <a href="show-spares-customer.php?cus_name=<?php echo $cus_name ?>" class="btn btn-dark" style="background-color: #ffffff;color:#1b221b;">ข้อมูลอะไหล่</a>
            </div>
            <div class="row_edit">
                <a href="show-history-cus.php?cus_name=<?php echo $cus_name ?>" class="btn btn-dark" style="background-color: #4f4f4f;">ประวัติการเข้าใช้บริการ</a>
            </div>

        </div>
        <?php
        $sql = "SELECT * FROM spares where spares_type like'$type_spare'  and spares_model like'$type_car'   ";
        $result = $connect->query($sql);
        ?>
        <div class="other_editor">
            <div class="container">
                <div class="info_right">
                    <h1>ข้อมูลราคาเมนูเรทราคาอะไหล่</h1>
                    <form action="../customer/show-spares-customer.php?cus_name=<?php echo $cus_name ?>" method="get">
                        <div class="row">
                            <div class="col-3">
                                <label class="col-3" for="inputState" class="form-label">หมวด</label>
                                <select class="col-8" name="type_spare" class="form-select">
                                    <option value="%">ทั้งหมด</option>
                                    <option value="เครื่องยนต์">หมวดเครื่องยนต์</option>
                                    <option value="เชื้อเพลิง">หมวดเชื้อเพลิง</option>
                                    <option value="ส่งกำลัง">หมวดส่งกำลัง</option>
                                    <option value="เครื่องปรับอากาศ">หมวดเครื่องปรับอากาศ</option>
                                    <option value="ตัวถังภายนอก">หมวดตัวถังภายนอก</option>
                                    <option value="ไฟฟ้า">หมวดไฟฟ้า</option>
                                    <option value="ทั่วไป">หมวดทั่วไป</option>
                                </select>
                            </div>

                            <div class="col-3">
                                <label class="col-4" for="inputState" class="form-label">ประเภทรถยนต์</label>
                                <select class="col-7" name="type_car" class="form-select">
                                    <option value="%">ทั้งหมด</option>
                                    <option value="รถเก๋ง">รถเก๋ง</option>
                                    <option value="รถตู้">รถตู้</option>
                                    <option value="รถกระบะ">รถกระบะ</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <select name="cus_name" class="form-select " style="visibility: hidden;">
                                    <option value="<?php echo $cus_name ?>"></option>
                                </select>
                            </div>
                            <div class="col-2">
                                <input type="submit" value="ค้นหา" class="btn btn-dark col-8">
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="25%">หมวดอะไหล่</th>
                                <th width="10%">model</th>
                                <th width="25%">รายละเอียด</th>
                                <th width="5%">Stock</th>
                                <th width="10%">ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row['Spares_id']; ?></td>
                                    <td><?php echo $row['spares_type']; ?></td>
                                    <td><?php echo $row['spares_model']; ?></td>
                                    <td><?php echo $row['spares_details']; ?></td>
                                    <td><?php echo $row['stock']; ?></td>
                                    <td><?php echo $row['spares_price']; ?></td>

                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>