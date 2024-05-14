<!doctype html>
<html>
<head>
<title>
login page
</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
if (isset($_POST['adminlogin'])) {
  	$errors = [];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name= $_POST['admin-name'];
    $pdo = new pdo("mysql:host=localhost;dbname=blogdb", "root", "");
    $data = $pdo->query("select * from admins where email='$email'");
    $admin = $data->fetch(pdo::FETCH_ASSOC);
    if ($admin) {
      if ($admin['password'] == $password && $admin['email']==$email) {
        session_start();
      $_SESSION['admin'] = $name;
        header("Location:dashboard.php");
      } else {
           header("Location:admin-login.php");
      }
      
    }else {
      $errors['emailErr'] = "This emial doesnt exist";
      $errors['passErr'] = "This password doesnt match";
      $errors['nameErr'] = "This name doesnt exist";
    } 
    
  }


?>
<section>
<div class="container mt-5 ">
<legend class=" col-md-4 offset-md-6 "> dashboard login</legend>
<br>
<form class="col-md-8 offset-md-4" method="post" >

 <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="name" name="admin-name">
    </div>
   <span style="color:red"> <?php if(isset ( $errors['nameErr'])) {echo " please enter your name " ;}     ?></span>
  </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
    </div>
   <span style="color:red"> <?php if(isset ( $errors['emailErr'])) {echo " please enter your email " ;}     ?></span>
  </div>
  
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
    </div>
    <span style="color:red"> <?php if(isset ( $errors['passErr'])) {echo " please enter your password " ;}     ?></span>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="adminlogin">login</button>
    </div>
  </div>
</form>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
