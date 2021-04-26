<?php include '../process/connect.php'; ?>

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
    $sql = "SELECT * FROM appoint";
    $result = $connect->query($sql);
    ?>

    <div class="container">
        <h1>ข้อมูลการนัดหมาย</h1>
        <table>
            <thead>
                <tr>
                    <td width="5%">รหัสนัดหมาย</td>
                    <td width="25%">วันที่นัดหมาย</td>
                    <td width="10%">เวลานัดหมาย</td>
                    <td width="25%">เวลาสร้างนัดหมาย</td>
                    <td width="5%">ป้ายทะเบียนรถ</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['ap_id']; ?></td>
                        <td><?php echo $row['ap__data']; ?></td>
                        <td><?php echo $row['ap_time']; ?></td>
                        <td><?php echo $row['create_date']; ?></td>
                        <td><?php echo $row['customer_car_id']; ?></td>
                        
                       
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>

    </div>
</body>
</html>