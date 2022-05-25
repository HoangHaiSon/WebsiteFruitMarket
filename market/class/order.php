<?php
    function getAllOrder($cusid){
        $sql = "select * FROM `order` WHERE CustomerID=$cusid";
        return $sql;
    }
    function getOrderDetail($orderid){
        $sql = "select * FROM `orderdetail` WHERE CustomerID=$orderid";
        return $sql;
    }
    function addOrder($order){
        $sql = "INSERT INTO `order` (`OrderID`, `CustomerID`, `Date`, `Total`) VALUES ( ".$order[0]."," . $_SESSION['id'] .", CURRENT_DATE(),'".$order[1]."');";
        return $sql;
    }
    function addOrderDetail($detail){
        $sql = "INSERT INTO `orderdetail` (`OrderID`, `VegetableID`, `Quantity`, `Price`) VALUES (".$detail[0].", ".$detail[1].", ".$detail[2].", ".$detail[3].");";
        return $sql;
    }
?>