<?php
    session_start();
    include '../connection.php';
    include '../class/vegetable.php';
    $conn = mysqli_connect($host, $user, $password, $database);
    $sql1 = "select * FROM category";
    $sql2 = "select * FROM vegetable";
    $category1 = mysqli_query($conn,$sql1);
    $category2 = mysqli_query($conn,$sql1);
    $stack = [];
    $n=0;
    while($row = mysqli_fetch_array($category1)){
        if(isset($_POST[$row['CategoryID']])){
            $stack[] = $row['CategoryID'];
            //array_push($stack,$row['CategoryID']);
            $n++;
        }
    }
    if(isset($_GET['Filter'])) $sql2 = getListByCateIDs($stack,$n);
    $vegetable = mysqli_query($conn,$sql2);
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
            <div class='row'>
                <div class='col-sm-2'>
                <p> </p>
                Category Name:
                <form action="index.php?Filter=t" method="post">
                <?php while($row = mysqli_fetch_array($category2)){ ?>
                <div class="form-group form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name=<?= $row['CategoryID'] ?> value=<?= $row['CategoryID'] ?>><?= $row['Name'] ?>
                    </label>
                </div>
                <?php } ?>
                <button type="submit" class="btn btn-primary">Filter</button>
                </form>
                </div>
                <div class='col-sm-10'>
                    <h2>Vegetable</h2>
                    <div class='row'>
                        <?php while ($row = mysqli_fetch_array($vegetable)) 
                        echo"
                            <div class='col-sm-4'>
                                <img class='img-fluid mx-auto sanpham' src='../".$row["Image"]."'>
                                <p></p>
                                <h5>".$row["VegetableName"]." <p class='bg-warning text-white d-inline-block'>".$row["Price"]."</p></h5>
                                <a href='../cart/index.php?id=".$row["VegetableID"]."' class='btn btn-danger' role='button'>Buy</a>
                            </div>";
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>