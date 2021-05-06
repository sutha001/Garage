<?php include '../../process/connect.php';


$date_access = $_POST['date_access'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../style_all_editor.css">
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


        $car_id = $_POST['car_id'];
        $em_id = $_POST['em_id'];

        $sqlid = "SELECT * FROM customer_car WHERE car_id = $car_id";
        $resultid = $connect->query($sqlid);
        $rowid = mysqli_fetch_assoc($resultid);

        $brand = $rowid['brand_car'];
        $brand_car = strtolower($brand);

        $type_car = $rowid['type_car'];


        $sql = "SELECT * FROM spares WHERE 	spares_model = '$brand_car' AND spares_type = '$type_car'";
        $result = $connect->query($sql);
        $total = mysqli_num_rows($result);
        ?>
        <div class="other_editor">
            <div class="container">
                <div class="info_right">
                    <h1>ข้อมูลราคาเมนูเรทราคาอะไหล่</h1>
                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="25%">หมวดอะไหล่</th>
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
                                    <td><?php echo $row['spares_type']; ?></td>
                                    <td><?php echo $row['spares_model']; ?></td>
                                    <td><?php echo $row['spares_details']; ?></td>
                                    <td><?php echo $row['stock']; ?></td>
                                    <td><?php echo $row['spares_price']; ?></td>

                                    <td><a href='addinfo.php?Spares_id=<?php echo $row['Spares_id']; ?>&em_id=<?php echo $em_id; ?>&car_id=<?php echo $car_id; ?>&date_access=<?php echo $date_access; ?>&spares_price=<?php echo $row['spares_price']; ?>' class="btn btn-dark" style="background-color: #4d4d4d;">เลือก</a></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                    <hr>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>