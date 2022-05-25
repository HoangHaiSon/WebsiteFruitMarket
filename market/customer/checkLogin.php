<?php
include '../connection.php';
session_start();
function login (){
        include '../connection.php';
        $id=$_POST["id"];    
        $pass=$_POST["pass"];
        /*$host = "localhost";
        $user = "root";
        $password = "";
        $database = "market";*/

        $conn = mysqli_connect($host, $user, $password, $database);

        $sql = "select * FROM customers WHERE CustomerID='$id' and Password='$pass'";
        
        mysqli_query($conn,"SET NAMES 'utf8'");

        $result=mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION["name"] = $row['Fullname'];
            $_SESSION["id"] = $row['CustomerID'];
            header('location: ../vegetable/index.php');
        }
        else{
            $_SESSION["name"] = NULL ;
            echo
            "
            <div class='alert alert-danger'>
            Không Tìm Thấy Tài Khoản
            </div>
            ";
        }
        mysqli_close($conn);
        
}

?>        