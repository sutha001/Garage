<?php include 'process/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM spares";
    $result = $connect->query($sql);
    ?>

    <div class="container">
        <h1>ข้อมูลราคาเมนูเรทราคาอะไหล่</h1>
        <table>
            <thead>
                <tr>
                    <td width="5%">#</td>
                    <td width="25%">หมวดอะไหล่</td>
                    <td width="10%">model</td>
                    <td width="25%">รายละเอียด</td>
                    <td width="5%">เรท</td>
                    <td width="10%">ราคา</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['Spares_id']; ?></td>
                        <td><?php echo $row['spares_type']; ?></td>
                        <td><?php echo $row['spares_model']; ?></td>
                        <td><?php echo $row['spares_details']; ?></td>
                        <td><?php echo $row['rate']; ?></td>
                        <td><?php echo $row['spares_price']; ?></td>

                        <td><a href='process/spares-update.php?Spares_id=<?php echo $row['Spares_id']; ?>'>แก้ไข</a></td>
                        <td><a href='process/spares-delete.php?Spares_id=<?php echo $row['Spares_id']; ?>' onclick="return confirm('Do you want to delete this record? !!!')">ลบ</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>

    </div>
</body>

</html>