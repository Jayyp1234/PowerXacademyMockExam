<?php
include '../backend_data/init.php';
session_start();
ob_start();
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'] ;
  $sql = "SELECT * FROM users where id ='$user_id'  ";
  $query = mysqli_query($conn,$sql);
  if ($query) {
    while ($row = mysqli_fetch_assoc($query)) {
      $_SESSION['user_id'] = $row["id"];
      $_SESSION['name'] = $row["name"];
      $_SESSION['email'] = $row["email"];
      $_SESSION['role'] = $row["role"];
    }
    if($_SESSION['role'] == 'user'){
      header('Location: ../dashboard/');
      ob_end_flush();
    }
    else if($_SESSION['role'] == 'admin'){
      header('Location: ../admin/dashboard.php');
      ob_end_flush();
    }
    else{
      header('Location: ../instructor/dashboard.php');
      ob_end_flush();
    }
  }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	  <title>Power X Academy - Login</title>
	  <meta content="" name="description">
  	<meta content="" name="keywords">
    <link rel="icon" href="../assets/image/icon.png" type="type/png">
  	<!--icons link-->
  	<link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="preload" href="../assets/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="../assets/fonts/OpenSans-SemiBold.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="../assets/fonts/OpenSans-Bold.ttf" as='font' crossorigin='anonymous'>
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
	<main>
  <?php 
  include '../backend_data/init.php';
  $name = $email = $username = $password = '';
  $nameErr = $passwordErr = $errormessage = '';
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $username = $passwd = ''; 
    if(isset($_POST['loginBTN'])){
    $email = test_input($_POST['email']);
    $passwd = test_input($_POST['pswd']);
    $sqle = "SELECT * FROM users WHERE login_email = '$email' AND password = '$passwd' ";
    $resulte = $conn->query($sqle);
      if ($resulte->num_rows > 0) {
      // output data of each row
        while($row = $resulte->fetch_assoc()) {
          if (isset( $_POST['remember'])) {
            setcookie('user_id',$row['id'],time() + 86400 * 30,'/');
          }
          $_SESSION['user_id'] = $row["id"];
          $_SESSION['name'] = $row["name"];
          $_SESSION['email'] = $row["email"];
          $_SESSION['role'] = $row["role"];
        }
        if($_SESSION['role'] == 'user'){
          header('Location: ../dashboard/');
          ob_end_flush();
        }
        else if($_SESSION['role'] == 'admin'){
          header('Location: ../admin/dashboard.php');
          ob_end_flush();
        }
        else{
          header('Location: ../instructor/dashboard.php');
          ob_end_flush();
        }
    } 
    else{
      $errormessage = '<div class="alert alert-danger alert-dismissible fade show" style="font-size: 14px !important;padding: .5rem 1.0rem !important;">
      <button type="button" class="close" data-dismiss="alert" style="padding: .5rem 0.4rem !important;">&times;</button>
      Invalid Username or Password</div>';
    }
    
    }
  $conn->close();
?>
<div class="container row" style="max-width:600px;justify-content:center;margin:auto;align-items: center;display: flex;height: 100vh;">
  <form method="POST" class="needs-validation form" novalidate>
    <img src="../assets/image/icon.png" />
    <?php echo $errormessage ?>
    <h3>Log In to Power X Academy</h3>
    <span>Enter your email and password below</span>

    <br>

    <div class="col-md-12 form-field">
      <label>email</label>
        <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
    </div>
    <br>
    <div class="col-md-12 form-field">
      <label>Password</label>
        <input type="password" class="form-control" id="pwd" placeholder="Password" name="pswd" required>
    </div>
    <br>
    <div class="checkbox">
    <label><input type="checkbox"  name='remember'> Remember me</label>
  </div>
    <br>
    <div class="col-md-12 form-field">
      <button type="submit" name='loginBTN'>Log In</button>
    </div>  
    <div style="margin-top:8px;display:flex;justify-content:center;">
    <span class="ll">Don’t have an account? </span> <a href="../register" class="tt">Sign up</a>
    </div>               
  </form>
</div>
	</main>
</body>
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    
	});
  </script>
<script>
    (function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</html>
