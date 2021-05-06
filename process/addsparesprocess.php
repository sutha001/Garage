<?php include 'connect.php'; ?>

<?php 
    $type_spare = $_POST['type_spare'];
    $type_car = $_POST['type_car'];
    $brand_car = $_POST['brand_car'];
    $details_spare = $_POST['details_spare'];
    $price_spare = $_POST['price_spare'];
    $stock = $_POST['stock'];

    mysqli_query($connect, "INSERT INTO spares (spares_group,spares_type,spares_model, spares_details, spares_price, stock)
    VALUES ('$type_spare','$type_car','$brand_car' ,'$details_spare', '$price_spare', '$stock')");

    echo '<script>alert("เพิ่มข้อมูล Spares สำเร็จ")</script>';


    header('Refresh: 1; url=../admin/addspares.php');

    



?>