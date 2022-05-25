<?php
    session_start();
    include '../connection.php';
    $con= mysqli_connect($host, $user, $password, $database);
    if(isset($_GET['id'])){
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
            $id=$_GET['id'];
            $_SESSION['cart'][$id] = array('quantity' => 1);
        } else {
            $id=$_GET['id'];
            if(isset($_SESSION['cart'][$id]) == $id){
                $_SESSION["cart"][$id]['quantity']++;
            } else {
                $_SESSION['cart'][$id] = array('quantity' => 1);
            }
        }
        /*while($row = mysqli_fetch_array($products1)){
            if($_SESSION['cart'] == $row['VegetableID'] && $_SESSION["cart"][$id] > $row['Amount']){
                echo '<script>alert("Welcome to Geeks for Geeks")</script>';
                $_SESSION['cart'][$row['VegetableID']]['quantity']--;
            }
        
        }*/

        //unset($_SESSION["cart"]);
    }
    if (!empty($_SESSION["cart"])) {
        $products = mysqli_query($con, "SELECT * FROM `vegetable` WHERE `VegetableID` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
        $products1 = mysqli_query($con, "SELECT * FROM `vegetable` WHERE `VegetableID` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
    }
?>
<html>
    <head>
        <title>
            DEMO
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css">
    </head>
    <body>
        <div id="container">
            <div id="header">
                <?php require_once('../menu.php'); ?>
            </div>
            <h2>Cart</h2>
            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Picture</th>
                    <th>Amount</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $total1 = 0;
                $total2 = 0;
                if(!empty($products)){ 
                    
                    $num = 1;
                    while($row = mysqli_fetch_array($products)){ ?>
                        <tr>
                            <td><?= $num++; ?></td>
                            <td><?= $row['VegetableName'] ?></td>
                            <td><img class='img-fluid mx-auto sanpham1' src="../<?= $row['Image'] ?>" /></td>
                            <td><?= $_SESSION["cart"][$row['VegetableID']]['quantity'] ?></td>
                            <td><?= number_format($row['Price'], 0, ",", ".") ?></td>
                        </tr>
                
                    <?php 
                    $total1 = $total1 + $row['Price'] * $_SESSION["cart"][$row['VegetableID']]['quantity'];
                    $total2 = $total2 + $_SESSION["cart"][$row['VegetableID']]['quantity'];
                    }
                }?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?= $total2; ?></td>
                    <td><?= number_format($total1, 0, ",", "."); ?></td>
                </tr>
                </tbody>
            </table>
            <a href='../cart/saveorder.php' class='btn btn-danger' role='button'>Order</a>
            </div>
    </body>
</html>