<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "market";
$conn = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()){
    echo "Connection Fail: ".mysqli_connect_errno();exit;
}
?>