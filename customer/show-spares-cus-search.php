<?php include '../process/connect.php';

$string = "_%";
$type_spare = $_GET["type_spare"];

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
    <title>Spares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>

<body>
    <?php if (isset($_SESSION['cus_name'])) : ?>
        <div class="area_all" style="background-color: black;">
            <div class="menu_editor">
                <div class="row_edit">
                    <a href="show-appoint.php?cus_name=<?php echo $cus_name ?>" class="btn btn-dark" style="background-color:  #4f4f4f; ">ข้อมูลการนัดหมาย</a>
                </div>
                <div class="row_edit">
                    <a href="show-spares-customer.php?cus_name=<?php echo $cus_name ?>" class="btn btn-dark" style="background-color: #ffffff;color:#1b221b;">ข้อมูลอะไหล่</a>
                </div>
                <div class="row_edit">
                    <a href="show-history-cus.php?cus_name=<?php echo $cus_name ?>" class="btn btn-dark" style="background-color: #4f4f4f;">ประวัติการเข้าใช้บริการ</a>
                </div>
                <div class="row_edit">
                    <a href="logout-process.php" onclick="return confirm('ต้องการออกจากระบบ')" class="btn btn-dark" style="background-color: #4f4f4f;">ออก</a>
                </div>

            </div>
            <?php
            $perpage = 10;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $start = ($page - 1) * $perpage;
            $check = 0;
            if ($_GET["type_spare"] != " ") {
                $sql = "SELECT * FROM spares WHERE spares_group LIKE '%" . $_GET["type_spare"] . "%' limit {$start} , {$perpage}";
                $result = $connect->query($sql);
                $total = mysqli_num_rows($result);
                $check = 1;
            } else {
                $sql = "SELECT * FROM spares WHERE spares_type limit {$start} , {$perpage}";
                $result = $connect->query($sql);
                $total = mysqli_num_rows($result);
                $check = 0;
            }

            ?>
            <div class="other_editor">
                <div class="container">
                    <div class="info_right">
                        <h1>ข้อมูลราคาเมนูเรทราคาอะไหล่</h1>
                        <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="get">
                            <div class="row">
                                <div class="col-3">
                                    <label class="col-3" for="inputState" class="form-label">หมวด</label>
                                    <select class="col-8" name="type_spare" class="form-select">
                                        <option value="%">ทั้งหมด</option>
                                        <option value="เครื่องยนต์">หมวดเครื่องยนต์</option>
                                        <option value="เชื้อเพลิง">หมวดเชื้อเพลิง</option>
                                        <option value="ส่งกำลัง">หมวดส่งกำลัง</option>
                                        <option value="เครื่องปรับอากาศ">หมวดเครื่องปรับอากาศ</option>
                                        <option value="ตัวถังภายนอก">หมวดตัวถังภายนอก</option>
                                        <option value="ไฟฟ้า">หมวดไฟฟ้า</option>
                                        <option value="ทั่วไป">หมวดทั่วไป</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <input type="submit" value="ค้นหา" class="btn btn-dark col-8">
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table>
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="25%">หมวดอะไหล่</th>
                                    <th width="10%">ประเภท</th>
                                    <th width="10%">ยี่ห้อรถยนต์</th>
                                    <th width="25%">รายละเอียด</th>
                                    <th width="5%">Stock</th>
                                    <th width="10%">ราคา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['Spares_id']; ?></td>
                                        <td><?php echo $row['spares_group']; ?></td>
                                        <td><?php echo $row['spares_type']; ?></td>
                                        <td><?php echo $row['spares_model']; ?></td>
                                        <td><?php echo $row['spares_details']; ?></td>
                                        <td><?php echo $row['stock']; ?></td>
                                        <td><?php echo $row['spares_price']; ?></td>

                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                        <hr>
                        <?php
                        if ($check == 1) {
                            $sql2 = "SELECT * FROM spares WHERE spares_group LIKE '%" . $_GET["type_spare"] . "%' ";
                            $query2 = mysqli_query($connect, $sql2);
                            $total_record = mysqli_num_rows($query2);
                            $total_page = ceil($total_record / $perpage);
                        } else {
                            $sql2 = "SELECT * FROM spares ";
                            $query2 = mysqli_query($connect, $sql2);
                            $total_record = mysqli_num_rows($query2);
                            $total_page = ceil($total_record / $perpage);
                        }
                        ?>
                        <nav>
                            <ul class="pagination">
                                <li>
                                    <a class="btn btn-dark" style="background-color: #4d4d4d;" href="show-spares-cus-search.php?&type_spare=<?php echo $type_spare; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                    <li><a class="btn btn-dark" style="background-color: #4d4d4d;" href="show-spares-cus-search.php?page=<?php echo $i; ?>&type_spare=<?php echo $type_spare; ?>"><?php echo $i; ?></a></li>
                                <?php } ?>
                                <li>
                                    <a class="btn btn-dark" style="background-color: #4d4d4d;" href="show-spares-cus-search.php?page=<?php echo $total_page; ?>&type_spare=<?php echo $type_spare; ?>" aria-label="Next">
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