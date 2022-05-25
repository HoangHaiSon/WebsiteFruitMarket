<?php
    include 'checkLogin.php';
?>
<link rel="stylesheet" href="../css/bootstrap.css">
<div class="container">
  <h2>Login</h2>
  <form action="login.php" method="post">
    <div class="form-group">
      <label for="text">Your's ID:</label>
      <input type="text" class="form-control" id="id" placeholder="Enter ID" name="id">
    </div>
    <div class="form-group">
      <label for="pass">Password:</label>
      <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pass">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <a href='register.php' class='btn btn-primary' role='button'>Register</a>
  </form>
</div>
<?php
if(isset($_POST['id']) & isset($_POST['pass']))
{
    login();
}
?>