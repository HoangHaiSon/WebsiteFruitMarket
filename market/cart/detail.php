<?php
    session_start();
    include '../connection.php';
    include '../class/order.php';
    $con= mysqli_connect($host, $user, $password, $database);
    $orders = mysqli_query($con, "SELECT `order`.OrderID, `order`.CustomerID, `order`.Date, orderdetail.*, Vegetable.*
            FROM `order`
            INNER JOIN orderdetail ON `order`.OrderID = orderdetail.OrderID
            INNER JOIN Vegetable ON Vegetable.VegetableID = orderdetail.VegetableID
            WHERE `order`.OrderID =". $_GET['id']);
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
            <h2>Detail</h2>
            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Amount</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $num = 1;
                    $total1 = 0;
                    $total2 = 0;
                    while($row = mysqli_fetch_array($orders)){ ?>
                        <tr>
                            <td><?= $num++; ?></td>
                            <td><?= $row['VegetableName'] ?></td>
                            <td><img class='img-fluid mx-auto sanpham1' src="../<?= $row['Image'] ?>" /></td>
                            <td><?= $row['Quantity']; ?></td>
                            <td><?= $row['Price']; ?></td>
                        </tr>
                <?php 
                    $total1 = $total1 + $row['Price'] * $row['Quantity'];
                    $total2 = $total2 + $row['Quantity'];
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td><?= $total2; ?></td>
                    <td><?= number_format($total1, 0, ",", "."); ?></td>
                </tr>
                </tbody>
            </table>
            </div>
    </body>
</html>