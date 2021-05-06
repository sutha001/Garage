<?php include '../../process/connect.php';

$string = "_%";
$date_access = $_GET['date_access'];

session_start();
$cus_name = $_SESSION['cus_name'];
if (!isset($_SESSION['cus_name'])) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../admin/style_all_editor.css">
    <title>History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>

<body>
    <?php if (isset($_SESSION['cus_name'])) : ?>
        <div class="area_all" style="background-color: black;">
            <div class="menu_editor">
                <div class="row_edit">
                    <a href="../show-appoint.php?cus_name=<?php echo $cus_name ?>" class="btn btn-dark" style="background-color: #4f4f4f;">ข้อมูลการนัดหมาย</a>
                </div>
                <div class="row_edit">
                    <a href="../show-spares-customer.php?&cus_name=<?php echo $cus_name ?>&type_car=<?php echo "%25" ?>&type_spare=<?php echo "%25" ?>" class="btn btn-dark" style="background-color: #4f4f4f;">ข้อมูลอะไหล่</a>
                </div>
                <div class="row_edit">
                    <a class="btn btn-dark" style="background-color: #ffffff; color:#1b221b;">ประวัติการเข้าใช้บริการ</a>
                </div>
                <div class="row_edit">
                    <a href="../logout-process.php" onclick="return confirm('ต้องการออกจากระบบ')" class="btn btn-dark" style="background-color: #4f4f4f;">ออก</a>
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
        FROM service
        NATURAL JOIN info_repair
        NATURAL JOIN spares
        NATURAL JOIN employees
        NATURAL JOIN customer
        NATURAL JOIN customer_car
        WHERE cus_name = '$cus_name' AND date_access = '$date_access' limit {$start} , {$perpage}";


            $result = $connect->query($sql);
            echo $cus_name;
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
                                    <th width="15%">รายละเอียดการซ่อม</th>
                                    <th width="10%">ช่างที่รับผิดชอบ</th>
                                    <th width="10%">เบอร์โทรศัพท์ช่าง</th>
                                    <th width="10%">ราคาอะไหล่</th>
                                    <th width="10%">ค่าบริการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['spares_details']; ?></td>
                                        <td><?php echo $row['em_name']; ?></td>
                                        <td><?php echo $row['em_phonenumber']; ?></td>
                                        <td><?php echo $row['spares_price']; ?></td>
                                        <td><?php echo $row['service_charge']; ?></td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                        <?php
                        $sql2 = "SELECT *
                        FROM service
                        NATURAL JOIN info_repair
                        NATURAL JOIN spares
                        NATURAL JOIN employees
                        NATURAL JOIN customer
                        NATURAL JOIN customer_car
                        WHERE cus_name = '$cus_name'";
                        $query2 = mysqli_query($connect, $sql2);
                        $total_record = mysqli_num_rows($query2);
                        $total_page = ceil($total_record / $perpage);
                        ?>
                        <nav>
                            <ul class="pagination">
                                <li>
                                    <a class="btn btn-dark" style="background-color: #4d4d4d;" href="show-history-cus.php" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                    <li><a class="btn btn-dark" style="background-color: #4d4d4d;" href="show-history-cus.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php } ?>
                                <li>
                                    <a class="btn btn-dark" style="background-color: #4d4d4d;" href="show-history-cus.php?page=<?php echo $total_page; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    <?php endif ?>
</body>

</html>