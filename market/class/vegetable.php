<?php
    function getAll(){
        $sql = "select * FROM vegetable";
        return $sql;
    }
    function getListByCateID($cateid){
        $sql = "select * FROM vegetable WHERE CatagoryID='$cateid'";
        return $sql;
    }
    function getListByCateIDs($cateid,$n){
        $sql = "select * FROM vegetable WHERE ";
        for ($i=0 ; $i<$n ; $i++){
            $sql .= "CategoryID=$cateid[$i]";
            if($i != $n-1){
                $sql .= " OR ";
            }
        }
        return $sql;
    }
    function getByID($vegetableID){
        $sql = "select * FROM vegetable WHERE VegetableID='$vegetableid'";
        return $sql;
    }
?>