<?php
    session_start();
    include '../connection.php';
    include '../class/vegetable.php';
    $conn = mysqli_connect($host, $user, $password, $database);
    $sql = "select * FROM category";
    $category = mysqli_query($conn,$sql);
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
                <form action="add.php" method="post">
                    <div class="form-group">
                    <label for="text">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                    <label for="pass">Decription:</label>
                    <input type="text" class="form-control" id="de" name="de">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
                </div>
                <div class='col-sm-10'>
                    <h2>Category</h2>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Desciption</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while($row = mysqli_fetch_array($category)){
                        ?>
                        <tr>
                            <td><?= $row['CategoryID'] ?></td>
                            <td><?= $row['Name'] ?></td>
                            <td><?= $row['Description'] ?></td>
                        </tr>
                        <?php }?>
                        </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>