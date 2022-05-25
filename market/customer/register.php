<?php
    include 'saveRegister.php';
?>
<link rel="stylesheet" href="../css/bootstrap.css">
<div class="container">
  <h2>Register</h2>
  <form action="register.php" method="post">
    <div class="form-group">
      <label for="text">Your's Fullname:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Fullname" name="name">
    </div>
    <div class="form-group">
      <label for="pass">Password:</label>
      <input type="password" class="form-control" id="pass" placeholder="Enter Password" name="pass">
    </div>
    <div class="form-group">
      <label for="text">Address:</label>
      <input type="text" class="form-control" id="addr" placeholder="Enter Address" name="addr">
    </div>
    <div class="form-group">
      <label for="text">City:</label>
      <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>
<?php
if(isset($_POST['name']) & isset($_POST['pass']) & isset($_POST['addr']) & isset($_POST['city']))
{
    register();
}
?>