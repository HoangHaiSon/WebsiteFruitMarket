<?php
    session_start();
    include '../connection.php';
    include '../class/vegetable.php';
    $conn = mysqli_connect($host, $user, $password, $database);
    $sql1 = "select * FROM category";
    $category = mysqli_query($conn,$sql1);
    
    
    
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
            
            <h2>Add Vegetable</h2>
            <form action="add.php" method="post">
                <div class='row'>
                    <div class='col-sm-8'>
                            <div class="form-group">
                                <label for="text">Vegetable Name:</label>
                                <input type="text" class="form-control" placeholder="Enter text" name="vegetable">
                            </div>
                            <div class="row">
                                <div class='col-sm-6'>
                                    <div class="form-group">
                                        <label for="text">Unit:</label>
                                            <select name="unit" id="unit" class="custom-select">                                            
                                                <option value="kg">kg</option>
                                                <option value="bag">bag</option>
                                                <option value="per fruit">per fruit</option>
                                                <option value="bunch">bunch</option>
                                            </select>
                                    </div>
                                </div>
                                <div class='col-sm-6'>
                                    <div class="form-group">
                                        <label for="text">Amount:</label>
                                        <input type="text" class="form-control" placeholder="Enter Amount" name="amount">
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="text">Image:</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                    </div>
                    <div class='col-sm-4'>
                            <div class="form-group">
                                <label for="pwd">Category Name:</label>
                                    <select name="category" id="category" class="custom-select">
                                        <?php while($row = mysqli_fetch_array($category)){                                          
                                            echo "<option value=".$row['CategoryID'].">". $row['Name']." </option>";
                                        } 
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" placeholder="Enter price" name="price">
                            </div>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </body>
</html>