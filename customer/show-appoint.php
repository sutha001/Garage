<?php include '../process/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/style_all_editor.css">
    <title>appoint</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>

<body> <div class="area_all" style="background-color: black;">
    <div class="menu_editor">
        <div class="row_edit">
            <a href="show-appoint.php" class="btn btn-dark" style="background-color: #ffffff; color:#1b221b;">ข้อมูลการนัดหมาย</a>
        </div>
        <div class="row_edit">
            <a href="show-spares-customer.php" class="btn btn-dark" style="background-color: #4f4f4f;">ข้อมูลอะไหล่</a>
        </div>

    </div>>
    <?php
    $sql = "SELECT * FROM appoint";
    $result = $connect->query($sql);
    ?>

    <div class="other_editor">
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
                            <td><?php echo $row['ap_data']; ?></td>
                            <td><?php echo $row['ap_time']; ?></td>
                            <td><?php echo $row['create_date']; ?></td>
                            <td><?php echo $row['cus_car_id']; ?></td>


                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>

        </div>
    </div>

    </div>
</body>

</html>