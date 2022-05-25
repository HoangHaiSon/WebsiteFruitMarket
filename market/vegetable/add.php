<?php
include '../connection.php';
include '../class/category.php';
session_start();

        $name=$_POST["vegetable"];
        $unit=$_POST["unit"];
        $amount=$_POST["amount"];
        $target="images/";
        $image=$target.$_POST["image"];
        $catagory=$_POST["category"];
        $price=$_POST["price"];
        $dup=0;

        $conn = mysqli_connect($host, $user, $password, $database);
         
        $sql1= "select * FROM vegetable";

        $veget= mysqli_query($conn,$sql1);
        while($row = mysqli_fetch_array($veget)){                                          
            if($name == $row['VegetableName'] && $unit == $row['Unit'] && $image == $row['Image'] && $catagory == $row['CategoryID'] && $price == $row['Price']){
                $sql= "UPDATE vegetable SET Amount = ".$row['Amount']+$amount." WHERE VegetableID = ".$row['VegetableID'].";";
                $dup=1;
            }
        }
        
        if($dup==1){
            mysqli_query($conn,"SET NAMES 'utf8'");

            mysqli_query($conn,$sql);

            header('location: new.php');
        }
        else{
            $sql = "INSERT INTO vegetable (VegetableID, CategoryID, VegetableName, Unit, Amount, Image, Price)
        VALUES ( NULL , ".$catagory.", '".$name."', '".$unit."', ".$amount.", '".$image."',".$price.")";
        
        //echo $sql;

        mysqli_query($conn,"SET NAMES 'utf8'");

        mysqli_query($conn,$sql);
        
        mysqli_close($conn);
        
        header('location: new.php');
        }


?>