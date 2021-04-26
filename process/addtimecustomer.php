<?php include 'connect.php'; ?>

<?php
    $ap_id = $_POST['ap_id'];
    $ap_data = $_POST['ap_data'];
    $ap_time = $_POST['ap_time'];
    $create_date = $_POST['create_date'];
    $customer_car_id = $_POST['customer_car_id'];
    $sql = mysql_query( "INSERT INTO appoint VALUE( '$ap_id', '$ap_data', '$ap_time', '$create_date', '$customer_car_id')" ) or die ( mysql_error() );
echo 'insert successful';
?>