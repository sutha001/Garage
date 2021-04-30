<?php include '../process/connect.php';

$vrnumber = $_POST['vrnumber'] ?? "%";
$vrnumber == '' ? $vrnumber = "%" : $vrnumber = $vrnumber;

?>

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
                <a class="btn btn-dark" style="background-color: #ffffff; color:#1b221b;">ข้อมูลลูกค้า</a>
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
                <a href="show-info-employee.php" class="btn btn-dark" style="background-color: #4f4f4f;">ข้อมูลพนักงาน</a>
            </div>
            <div class="row_edit">
                <a href="show-alert.php" class="btn btn-dark" style="background-color: #4f4f4f;">แจ้งเตือน</a>
            </div>
        </div>

        <?php

        $perpage = 5;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }


        $start = ($page - 1) * $perpage;

        $sql = "SELECT *
        FROM customer
        NATURAL JOIN customer_car where cus_car_id like '$vrnumber' limit {$start} , {$perpage}";

        $result = $connect->query($sql) or die(mysqli_error($connect) . ":" . $sql);

        $total = mysqli_num_rows($result);
        ?>

        <div class="other_editor">
            <div class="container">
                <div class="info_right">
                    <h1>ข้อมูลลูกค้า</h1>


                    <form action="../admin/show-infocustomer-admin.php?" method="post">
                        <div class="row">

                            <div class="col-1">
                                <a href="addcustomer.php" class="btn btn-dark" style="background-color: #4d4d4d;">เพิ่ม</a>
                            </div>
                            <div class="col-2">
                                <input type="text" name="vrnumber" class="form-control" placeholder="เลขทะเบียนรถยนต์" aria-label="เลขทะเบียนรถยนต์">
                            </div>
                            <div class="col-1">
                                <input type="submit" value="ค้นหา" class="btn btn-dark" style="margin:1% auto 1% ">
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="10%">เลขทะเบียนรถ</th>
                                <th width="10%">ชื่อ-นามสกุล</th>
                                <th width="10%">เบอร์โทรศัพท์</th>
                                <th width="10%">ประเภทรถยนต์</th>
                                <th width="10%">รุ่นรถยนต์</th>
                                <th width="10%">เลขตัวถัง</th>
                                <th width="10%">ยี่ห้อรถยนต์</th>
                                <th width="10%">เลขเครื่องยนต์</th>
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

                                    <td width="5%"><a href='../process/customer-update.php?cus_car_id=<?php echo $row['cus_car_id']; ?>' class="btn btn-dark" style="background-color: #4d4d4d;">แก้ไข</a></td>
                                    <td width="5%"><a href='../process/customer-delete.php?cus_car_id=<?php echo $row['cus_car_id']; ?>' onclick="return confirm('ต้องการลบข้อมูลหรือไม่? !!!')" class="btn btn-dark" style="background-color: #4d4d4d;">ลบ</a></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                    <hr>
                    <?php
                    $sql2 = "select * from customer ";
                    $query2 = mysqli_query($connect, $sql2);
                    $total_record = mysqli_num_rows($query2);
                    $total_page = ceil($total_record / $perpage);
                    ?>
                    <nav>
                        <ul class="pagination">
                            <li>
                                <a class="btn btn-dark" style="background-color: #4d4d4d;" href="show-infocustomer-admin.php" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                <li><a class="btn btn-dark" style="background-color: #4d4d4d;" href="show-infocustomer-admin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li>
                                <a class="btn btn-dark" style="background-color: #4d4d4d;" href="show-infocustomer-admin.php?page=<?php echo $total_page; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>