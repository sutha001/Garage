<?php include '../process/connect.php'; 
$cus_name = mysqli_real_escape_string($connect, $_GET['cus_name']);
$string = "_%" ;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/style_all_editor.css">
    <title>History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>

<body>
    <div class="area_all" style="background-color: black;">
    <div class="menu_editor">
        <div class="row_edit">
            <a href="show-appoint.php?cus_name=<?php echo $cus_name ?>" class="btn btn-dark" style="background-color: #4f4f4f;">ข้อมูลการนัดหมาย</a>
        </div>
        <div class="row_edit">
            <a href="show-spares-customer.php?&cus_name=<?php echo $cus_name ?>&type_car=<?php echo "%25" ?>&type_spare=<?php echo "%25" ?>" class="btn btn-dark" style="background-color: #4f4f4f;">ข้อมูลอะไหล่</a>
        </div>
        <div class="row_edit">
            <a class="btn btn-dark" style="background-color: #ffffff; color:#1b221b;">ประวัติการเข้าใช้บริการ</a>
        </div>

    </div>

    
    <?php
    if (!isset($start)) {
        $start = 0;
    }
    $limit = '10';

    $sql = "SELECT cus_car_id,date_access,spares_details,sum(service_charge+(price_per_piece*amount))'priceAll'
    FROM info_repair
    NATURAL JOIN service
    NATURAL JOIN employees
    NATURAL JOIN customer_car
    NATURAL JOIN spares
    NATURAL JOIN customer
    WHERE cus_name = '$cus_name'
    group by date_access";


    $result = $connect->query($sql);echo $cus_name;
    $total = mysqli_num_rows($result);
    ?>

<div class="other_editor">
            <div class="container">
                <div class="info_right">
                    <h1>ประวัติการเข้าใช้บริการ</h1>
                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <th width="15%">เลขทะเบียนรถ</th>
                                <th width="10%">วันที่เข้ามาใช้บริการ</th>
                                <th width="15%">รายละเอียด</th>
                                <th width="10%">ค่าบริการทั้งหมด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row['cus_car_id']; ?></td>
                                    <td><?php echo $row['date_access']; ?></td>
                                    <td><?php echo $row['spares_details']; ?></td>
                                    <td><?php echo $row['priceAll']; ?></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                    <?php

                    $page = ceil($total / $limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า

                    /* เอาผลหาร มาวน เป็นตัวเลข เรียงกัน เช่น สมมุติว่าหารได้ 3 เอามาวลก็จะได้ 1 2 3 */
                    for ($i = 1; $i <= $page; $i++) {
                        if ($page == $i) { //ถ้าตัวแปล page ตรง กับ เลขที่วนได้ 
                            echo "หน้า &nbsp";
                            echo "<a href='?start=" . $limit * ($i - 1) . "&page=$i&cus_name=$cus_name'><B>$i</B></A>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
                        } else {
                            echo "หน้า &nbsp";
                            echo "<a href='?start=" . $limit * ($i - 1) . "&page=$i&cus_name=$cus_name'>$i</A>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>