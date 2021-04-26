<?php include '../process/connect.php'; ?>

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
    $sql = "SELECT * FROM appoint";
    $result = $connect->query($sql);
    function date_diff($create_date, $ap_data)
    {   

        $str_start = strtotime($create_date); // ทำวันที่ให้อยู่ในรูปแบบ timestamp
        $str_end = strtotime($ap_data); // ทำวันที่ให้อยู่ในรูปแบบ timestamp

        $nseconds = $ap_data - $create_date; // วันที่ระหว่างเริ่มและสิ้นสุดมาลบกัน
        $ndays = round($nseconds / 86400); // หนึ่งวันมี 86400 วินาที

        return $ndays;
    }
?>

    
</body>
</html>