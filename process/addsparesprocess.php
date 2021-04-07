<?php include 'connect.php'; ?>

<?php 
    $type_spare = $_POST['type_spare'];
    $type_car = $_POST['type_car'];
    $brand_car = $_POST['brand_car'];
    $details_spare = $_POST['details_spare'];
    $price_spare = $_POST['price_spare'];
    $rate_spare = $_POST['rate_spare'];

    mysqli_query($connect, "INSERT INTO spares (spares_type, spares_model, spares_details, spares_price, rate)
    VALUES ('$type_spare','$type_car', '$details_spare', '$price_spare', '$rate_spare')");

    echo '<script>alert("เพิ่มข้อมูล Spares สำเร็จ")</script>';


    header('Refresh: 1; url=../addspares.php');



?>