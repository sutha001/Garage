<?php include '../process/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style_all_editor.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a class="btn btn-dark" style="background-color: #ffffff; color:#1b221b;">ข้อมูลอะไหล่</a>
            </div>
            <div class="row_edit">
                <a href="add-appoint.php" class="btn btn-dark" style="background-color: #4f4f4f;">นัดหมาย</a>
            </div>
        </div>
        <?php
        if (!isset($start)) {
            $start = 0;
        }
        $limit = '10';

        
        $sql = "SELECT * FROM spares";
        $result = $connect->query($sql);
        $total = mysqli_num_rows($result);
        ?>
        <div class="other_editor">
            <div class="container">
                <div class="info_right">
                    <h1>ข้อมูลราคาเมนูเรทราคาอะไหล่</h1>
                    <a href="addspares.php" class="btn btn-dark" style="background-color: #4d4d4d;">เพิ่ม</a>
                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="25%">หมวดอะไหล่</th>
                                <th width="10%">model</th>
                                <th width="25%">รายละเอียด</th>
                                <th width="5%">เรท</th>
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

                                    <td><a href='../process/spares-update.php?Spares_id=<?php echo $row['Spares_id']; ?>' class="btn btn-dark" style="background-color: #4d4d4d;">แก้ไข</a></td>
                                    <td><a href='../process/spares-delete.php?Spares_id=<?php echo $row['Spares_id']; ?>' onclick="return confirm('Do you want to delete this record? !!!')" class="btn btn-dark" style="background-color: #4d4d4d;" >ลบ</a></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>

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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>