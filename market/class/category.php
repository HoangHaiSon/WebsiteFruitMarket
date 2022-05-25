<?php
    function getAll(){
        $sql = "select * FROM category";
        return $sql;
    }
    function add($cate){

        $sql = "INSERT INTO category (CategoryID, Name, Description)
        VALUES ( NULL , '".$cate[0]."', '".$cate[1]."')";
        return $sql;
    }
?>