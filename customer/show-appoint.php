<?php include '../process/connect.php'; 
$cus_name = mysqli_real_escape_string($connect, $_GET['cus_name']);
?>

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

<body>
    <div class="area_all" style="background-color: black;">
    <div class="menu_editor">
        <div class="row_edit">
            <a href="show-appoint.php?cus_name=<?php echo $cus_name ?>" class="btn btn-dark" style="background-color: #ffffff; color:#1b221b;">ข้อมูลการนัดหมาย</a>
        </div>
        <div class="row_edit">
            <a href="show-spares-customer.php?cus_name=<?php echo $cus_name ?>" class="btn btn-dark" style="background-color: #4f4f4f;">ข้อมูลอะไหล่</a>
        </div>

    </div>

    
    <?php
    if (!isset($start)) {
        $start = 0;
    }
    $limit = '10';

    $sql = "SELECT * 
    FROM appoint
    NATURAL JOIN customer
    WHERE cus_name = '$cus_name'";
    $result = $connect->query($sql);echo $cus_name;
    $total = mysqli_num_rows($result);
    ?>

<div class="other_editor">
            <div class="container">
                <div class="info_right">
                    <h1>แจ้งเตือน</h1>
                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <th width="15%">เลขทะเบียนรถ</th>
                                <th width="10%">ชื่อลูกค้า</th>
                                <th width="15%">เบอร์โทรศัพท์</th>
                                <th width="10%">วันที่</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row['cus_car_id']; ?></td>
                                    <td><?php echo $row['cus_name']; ?></td>
                                    <td><?php echo $row['cus_phonenumber']; ?></td>
                                    <td><?php echo $row['ap_data']; ?></td>

                                    <td width="10%"><?php 
                                    $creat_data = date('Y-m-d');
                                    $ap_data = $row['ap_data'];


                                    $calculate =strtotime("$ap_data")-strtotime("$creat_data");
                                    $summary=floor($calculate / 86400); // 86400 มาจาก 24*360 (1วัน = 24 ชม.)

                                    if($summary <= 3 && $summary > 0){
                                        echo "ใกล้ครบวันกำหนดการ";
                                    }
                                    if($summary == 0){
                                        echo "วันนี้ครบกำหนดการ";
                                    }?></td>
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