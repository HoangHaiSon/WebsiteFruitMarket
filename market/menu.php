<?php
if(isset($_SESSION["name"])){
    echo "
    <div class='row'>
        <div class='col-sm-1'>Website</div>
        <div class='col-sm-3'><a href='../vegetable/index.php' class='btn btn-outline-secondary btn-block' role='button'>Vegetable</a></div>
        <div class='col-sm-3'><a href='../cart/index.php' class='btn btn-outline-secondary btn-block' role='button'>Cart</a></div>
        <div class='col-sm-3'><a href='../cart/history.php' class='btn btn-outline-secondary btn-block' role='button'>History</a></div>
        <div class='col-sm-1'><a href='../customer/log.php' class='btn btn-outline-secondary btn-block' role='button'>Logout</a></div>
        <div class='col-sm-1'><p class='text-center'>".$_SESSION['name']."</p></div>
    </div>";
}
else{
    echo "
    <div class='row'>
        <div class='col-sm-1'>Website</div>
        <div class='col-sm-5'><button type='button' class='btn btn-outline-secondary btn-block'>Vegetable</button></div>
        <div class='col-sm-5'><button type='button' class='btn btn-outline-secondary btn-block'>Cart</button></div>
        <div class='col-sm-1'><a href='customer/login.php' class='btn btn-outline-secondary btn-block' role='button'>Login</a></div>
    </div>";
};

?>