<?php include 'process/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM customer 
    JOIN customer_car 
    ON customer.cus_car_id = customer_car.customer_cus_car_id";
    $result = $connect->query($sql);
    ?>

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

                        <td><a href='../process/customer-update.php?cus_car_id=<?php echo $row['cus_car_id'];?>'>แก้ไข</a></td>
                        <td><a href='../process/customer-delete.php?cus_car_id=<?php echo $row['cus_car_id'];?>' onclick="return confirm('Do you want to delete this record? !!!')">ลบ</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>

    </div>
</body>

</html>