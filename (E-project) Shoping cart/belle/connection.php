<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'ecommerce');

if (mysqli_connect_error()) {
    echo "Connection failed: " . $mysqli->connect_error;
} else {
    // echo "Connection established";
}


?>
