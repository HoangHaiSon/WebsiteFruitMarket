<?php
    session_start();
    include '../connection.php';
    include '../class/order.php';
    $con= mysqli_connect($host, $user, $password, $database);
    $sql= getAllOrder($_SESSION["id"]);
    $result= mysqli_query($con,$sql);
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
            <h2>History</h2>
            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $num = 1;
                    while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                            <td><?= $num++; ?></td>
                            <td><?= $row['Date'] ?></td>
                            <td><?= number_format($row['Total'], 0, ",", "."); ?></td>
                            <td><a href="detail.php?id=<?= $row['OrderID'] ?>" class='btn btn-info btn-block' role='button'>Detail</a></td>
                        </tr>
                <?php }?>
                </tbody>
            </table>
            </div>
    </body>
</html>