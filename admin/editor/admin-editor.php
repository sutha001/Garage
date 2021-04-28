<?php include '../../process/connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_all_editor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Editor</title>
</head>

<body>
    <div class="area_all" style="background-color: black;">
        <div class="menu_editor">
            <div class="row_edit">
                <button class="btn btn-dark" style="background-color: #ffffff; color:#1b221b;">ข้อมูลลูกค้า</button>
            </div>
            <div class="row_edit">
                <button class="btn btn-dark" style="background-color: #4f4f4f;">ข้อมูลอะไหล่</button>
            </div>
            <div class="row_edit">
                <button class="btn btn-dark" style="background-color: #4f4f4f;">นัดหมาย</button>
            </div>
        </div>

        <?php
        $sql = "SELECT * FROM customer 
        JOIN customer_car 
        ON customer.cus_car_id = customer_car.customer_cus_car_id";
        $result = $connect->query($sql);
        ?>

        <div class="other_editor">
            <div class="container">
                <h1>ข้อมูลลูกค้า</h1>
                <table>
                    <thead>
                        <tr>
                            <td width="5%">ID</td>
                            <td width="10%">เลขทะเบียนรถ</td>
                            <td width="10%">ชื่อ-นามสกุล</td>
                            <td width="10%">เบอร์โทรศัพท์</td>
                            <td width="10%">ประเภทรถยนต์</td>
                            <td width="10%">รุ่นรถยนต์</td>
                            <td width="10%">เลขตัวถัง</td>
                            <td width="10%">ยี่ห้อรถยนต์</td>
                            <td width="10%">เลขเครื่องยนต์</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['car_id']; ?></td>
                                <td><?php echo $row['cus_car_id']; ?></td>
                                <td><?php echo $row['cus_name']; ?></td>
                                <td><?php echo $row['cus_phonenumber']; ?></td>
                                <td><?php echo $row['type_car']; ?></td>
                                <td><?php echo $row['model_car']; ?></td>
                                <td><?php echo $row['vin_car']; ?></td>
                                <td><?php echo $row['brand_car']; ?></td>
                                <td><?php echo $row['engine_car']; ?></td>

                                <td width="5%"><a href='../process/customer-update.php?cus_car_id=<?php echo $row['cus_car_id']; ?>'>แก้ไข</a></td>
                                <td width="5%"><a href='../process/customer-delete.php?cus_car_id=<?php echo $row['cus_car_id']; ?>' onclick="return confirm('Do you want to delete this record? !!!')">ลบ</a></td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>