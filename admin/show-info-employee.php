<?php include '../process/connect.php' ?>

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
                <a href="show-infocustomer-admin.php" class="btn btn-dark" style="background-color: #4f4f4f;">ข้อมูลลูกค้า</a>
            </div>
            <div class="row_edit">
                <a href="show-spares-admin.php" class="btn btn-dark" style="background-color: #4f4f4f;">ข้อมูลอะไหล่</a>
            </div>
            <div class="row_edit">
                <a href="save-info-customer.php" class="btn btn-dark" style="background-color: #4f4f4f;">บันทึกข้อมูลการซ่อม</a>
            </div>
            <div class="row_edit">
                <a href="add-appoint.php" class="btn btn-dark" style="background-color: #4f4f4f;">นัดหมาย</a>
            </div>
            <div class="row_edit">
                <a class="btn btn-dark" style="background-color: #ffffff; color:#1b221b;">ข้อมูลพนักงาน</a>
            </div>
            <div class="row_edit">
                <a href="show-alert.php" class="btn btn-dark" style="background-color: #4f4f4f;">แจ้งเตือน</a>
            </div>
        </div>

        <?php

        if (!isset($start)) {
            $start = 0;
        }
        $limit = '10';




        $sql = "SELECT * FROM employees ";
        $result = $connect->query($sql);

        $total = mysqli_num_rows($result);
        ?>

        <div class="other_editor">
            <div class="container">
                <div class="info_right">
                    <h1>ข้อมูลพนักงาน</h1>
                    <a href="addemployee.php" class="btn btn-dark" style="background-color: #4d4d4d;">เพิ่ม</a>
                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <th width="1%">รหัสพนักงาน</th>
                                <th width="1%">ชื่อจริงพนักงาน</th>
                                <th width="1%">เบอร์โทรศัพท์พนักงาน</th>
                                <th width="1%">ตำแหน่งพนักงาน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row['em_id']; ?></td>
                                    <td><?php echo $row['em_name']; ?></td>
                                    <td><?php echo $row['em_phonenumber']; ?></td>
                                    <td><?php echo $row['em_position']; ?></td>

                                    <td width="1%"><a href='../process/employee-update.php?em_id=<?php echo $row['em_id']; ?>' class="btn btn-dark" style="background-color: #4d4d4d;">แก้ไข</a></td>
                                    <td width="1%"><a href='../process/employee-delete.php?em_id=<?php echo $row['em_id']; ?>' onclick="return confirm('ต้องการลบข้อมูลหรือไม่? !!!')" class="btn btn-dark" style="background-color: #4d4d4d;">ลบ</a></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                    <hr>
                    <?php 

                        $page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า

                        /* เอาผลหาร มาวน เป็นตัวเลข เรียงกัน เช่น สมมุติว่าหารได้ 3 เอามาวลก็จะได้ 1 2 3 */
                        for($i=1;$i<=$page;$i++){ 
                                if($page == $i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้ 
                                    echo "หน้า &nbsp";
                                    echo "<a href='?start=" .$limit*($i-1)."&page=$i'><B>$i</B></A>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
                                }
                            else{
                                    echo "หน้า &nbsp";
                                    echo "<a href='?start=".$limit*($i-1)."&page=$i'>$i</A>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
                                }
                            }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>