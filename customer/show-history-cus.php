<?php include '../process/connect.php';

$string = "_%";

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
    <link rel="stylesheet" href="../admin/style_all_editor.css">
    <title>History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>

<body>
    <?php if (isset($_SESSION['cus_name'])) : ?>
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
                <div class="row_edit">
                    <a href="logout-process.php" onclick="return confirm('ต้องการออกจากระบบ')" class="btn btn-dark" style="background-color: #4f4f4f;">ออก</a>
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

            $sql = "SELECT cus_car_id,date_access,sum(service_charge+(price_per_piece*amount))'priceAll'
        FROM info_repair
        NATURAL JOIN service
        NATURAL JOIN employees
        NATURAL JOIN customer_car
        NATURAL JOIN spares
        NATURAL JOIN customer
        WHERE cus_name = '$cus_name'
        group by date_access limit {$start} , {$perpage}";


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
                                    <th width="15%">เลขทะเบียนรถ</th>
                                    <th width="15%">วันที่เข้ามาใช้บริการ</th>
                                    <th width="10%">ค่าบริการทั้งหมด</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['cus_car_id']; ?></td>
                                        <td><?php echo $row['date_access']; ?></td>
                                        <td><?php echo $row['priceAll']; ?></td>
                                        <td><a href='service_detail/show-service-detail.php?date_access=<?php echo $row['date_access']; ?>' class="btn btn-dark" style="background-color: #4d4d4d;">รายละเอียด</a></td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                        <?php
                        $sql2 = "SELECT cus_car_id,date_access,spares_details,sum(service_charge+(price_per_piece*amount))'priceAll'
                        FROM info_repair
                        NATURAL JOIN service
                        NATURAL JOIN employees
                        NATURAL JOIN customer_car
                        NATURAL JOIN spares
                        NATURAL JOIN customer
                        WHERE cus_name = '$cus_name'
                        group by date_access";
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