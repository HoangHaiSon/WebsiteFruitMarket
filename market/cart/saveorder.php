<?php
    session_start();
    include '../connection.php';
    include '../class/order.php';
    if(!isset($_SESSION['name'])){
        echo "Bạn phải đăng nhập để mua hàng";
    }
    else{
        $con= mysqli_connect($host, $user, $password, $database);
        $sql= "select * FROM `order`";
        $result= mysqli_query($con,$sql);
        $rowcount = mysqli_num_rows($result);
        $products = mysqli_query($con, "SELECT * FROM `vegetable` WHERE `VegetableID` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
        $total1=0;
        $date = date('Y-m-d');
        $orderProducts = array();
        while ($row = mysqli_fetch_array($products)) {
            $orderProducts[] = $row;
            $total1 = $total1 + $row['Price'] * $_SESSION["cart"][$row['VegetableID']]['quantity'];
        }
        $insertOrder = mysqli_query($con, "INSERT INTO `order` (`OrderID`, `CustomerID`, `Date`, `Total`) VALUES ($rowcount, " . $_SESSION['id'] .", CURRENT_DATE()," . $total1 . ");");
        $orderID = $con->insert_id;
        $insertString = "";
        foreach ($orderProducts as $key => $product) {
            $insertString .= "(" . $rowcount . ", '" . $product['VegetableID'] . "', '" . $_SESSION["cart"][$product['VegetableID']]['quantity'] . "', '" . $product['Price'] . "')";
            if ($key != count($orderProducts) - 1) {
                $insertString .= ",";
            }
        }
        $insertOrder = mysqli_query($con, "INSERT INTO `orderdetail` (`OrderID`, `VegetableID`, `Quantity`, `Price`) VALUES " . $insertString . ";");
        unset($_SESSION["cart"]);
        header('location: ../vegetable/index.php');
    }
?>