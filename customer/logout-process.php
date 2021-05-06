<?php
session_start();
unset($_SESSION["cus_name"]);
header("Location:login.php");
?>