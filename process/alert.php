<?php include 'connect.php'; ?>

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
    $create_date='';
    $ap_data='';

    $sql = "SELECT * FROM appoint WHERE ap_id = 6";
    $result = $connect->query($sql);

    while($row = $result->fetch_assoc()): 
        $create_date = $row['create_date'];
        $ap_data = $row['ap_data'];
    endwhile;

    $str_start = strtotime($create_date); // ทำวันที่ให้อยู่ในรูปแบบ timestamp
    $str_end = strtotime($ap_data); // ทำวันที่ให้อยู่ในรูปแบบ timestamp

    $nseconds = $str_end - $str_start; // วันที่ระหว่างเริ่มและสิ้นสุดมาลบกัน
    $ndays = round($nseconds / 86400); // หนึ่งวันมี 86400 วินาที

    echo $ndays;
?>

    
</body>
</html>