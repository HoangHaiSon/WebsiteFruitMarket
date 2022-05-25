<?php
include '../connection.php';
session_start();
function register (){
        $full=$_POST["name"];
        $pass=$_POST["pass"];
        $addr=$_POST["addr"];
        $city=$_POST["city"];
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "market";

        $conn = mysqli_connect($host, $user, $password, $database);
        $sql = "INSERT INTO customers (CustomerID, Password, Fullname, Address, City)
        VALUES ( NULL , '$pass', '$full', '$addr', '$city')";
        
        mysqli_query($conn,"SET NAMES 'utf8'");

        mysqli_query($conn,$sql);
        
        mysqli_close($conn);
        
        header('location: login.php');
}