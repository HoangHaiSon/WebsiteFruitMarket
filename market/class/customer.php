<?php
    function getByID($cusid){
        $sql = "select * FROM customers WHERE CustomerID='$cusid'";
        return $sql;
    }
    function add($cus){

        $sql = "INSERT INTO customers (CustomerID, Password, Fullname, Address, City)
        VALUES ( NULL , '".$cus[0]."', '".$cus[1]."', '".$cus[2]."', '".$cus[3]."')";
        return $sql;
    }
?>