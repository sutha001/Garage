<?php 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Spares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../admin/from.css">
</head>

<body>
<div class='allfrom'>
    
<h1>login</h1>
        <hr>
    <form action="../process/check-NameCus-process.php" method="post" >
    <div class="row">
                <div class="col-4 d-flex ">
        <label class='col-4'>ชื่อ-นามสกุล</label>
        <input  class='col-6' type="text" name="vrnumber"><br>
        </div>
            </div>
            <hr>
            <div class="row">
        <input  type="submit" value="ตรวจสอบ"  class="btn btn-dark" style="margin:1% auto 1%">
    </form>
        
</body>

</html>