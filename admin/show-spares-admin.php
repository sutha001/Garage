<?php include '../process/connect.php';


$type_car = $_GET['type_car'] ?? "%";
$type_spare = $_GET['type_spare'] ?? "%";



?>

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

        $sql = "SELECT * FROM spares where spares_type like'$type_spare'  OR spares_model like'$type_car' limit {$start} , {$perpage}";
        $result = $connect->query($sql);
        $total = mysqli_num_rows($result);

        ?>
        <div class="other_editor">
            <div class="container">
                <div class="info_right">
                    <h1>ข้อมูลราคาเมนูเรทราคาอะไหล่</h1>

                    <form action="../admin/show-spares-admin.php?" method="get">
                        <div class="row d-flex flex-row">
                            <a href="addspares.php" class="btn btn-dark col-1" style="background-color: #4d4d4d;">เพิ่ม</a>
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

                            <div class="col-3">
                                <label class="col-4" for="inputState" class="form-label">ประเภทรถยนต์</label>
                                <select class="col-7" name="type_car" class="form-select">
                                    <option value="%">ทั้งหมด</option>
                                    <option value="รถเก๋ง">รถเก๋ง</option>
                                    <option value="รถตู้">รถตู้</option>
                                    <option value="รถกระบะ">รถกระบะ</option>
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
                                <th width="5%">ยี่ห้อรถยนต์</th>
                                <th width="10%">หมวดอะไหล่</th>
                                <th width="10%">model</th>
                                <th width="25%">รายละเอียด</th>
                                <th width="5%">Stock</th>
                                <th width="10%">ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row['Spares_id']; ?></td>
                                    <td><?php echo $row['spares_model']; ?></td>
                                    <td><?php echo $row['spares_group']; ?></td>
                                    <td><?php echo $row['spares_type']; ?></td>
                                    <td><?php echo $row['spares_details']; ?></td>
                                    <td><?php echo $row['stock']; ?></td>
                                    <td><?php echo $row['spares_price']; ?></td>

                                    <td><a href='../process/spares-update.php?Spares_id=<?php echo $row['Spares_id']; ?>' class="btn btn-dark" style="background-color: #4d4d4d;">แก้ไข</a></td>
                                    <td><a href='../process/spares-delete.php?Spares_id=<?php echo $row['Spares_id']; ?>' onclick="return confirm('Do you want to delete this record? !!!')" class="btn btn-dark" style="background-color: #4d4d4d;">ลบ</a></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                    <hr>
                    <?php
                    $sql2 = "select * from spares ";
                    $query2 = mysqli_query($connect, $sql2);
                    $total_record = mysqli_num_rows($query2);
                    $total_page = ceil($total_record / $perpage);
                    ?>
                    <nav>
                        <ul class="pagination">
                            <li>
                                <a class="btn btn-dark" style="background-color: #4d4d4d;" href="show-spares-admin.php" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                <li><a class="btn btn-dark" style="background-color: #4d4d4d;" href="show-spares-admin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li>
                                <a class="btn btn-dark" style="background-color: #4d4d4d;" href="show-spares-admin.php?page=<?php echo $total_page; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>