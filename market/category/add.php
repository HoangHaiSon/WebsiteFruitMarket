<?php
include '../connection.php';
include '../class/category.php';
session_start();

        $name=$_POST["name"];
        $descrip=$_POST["de"];
        $stack = [];
        $stack[]=$name;
        $stack[]=$descrip;

        $conn = mysqli_connect($host, $user, $password, $database);
         
        
        $sql = add($stack);
        
        //echo $sql;
        mysqli_query($conn,"SET NAMES 'utf8'");

        mysqli_query($conn,$sql);
        
        mysqli_close($conn);
        
        header('location: index.php');


?>