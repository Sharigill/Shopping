<?php 

session_start();
session_unset();
session_destroy();
echo "<script>location.assign('home7-shoes.php')</script>";
?>