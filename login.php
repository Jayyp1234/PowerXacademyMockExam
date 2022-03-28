<?php
include 'backend_data/init.php';
session_start();
if (isset($_COOKIE['user_id'])) {
  $user_id = $_COOKIE['user_id'];
  $sql = "SELECT * FROM users where id ='$user_id'  ";
  $query = mysqli_query($conn,$sql);
  if ($query) {
    while ($row = mysqli_fetch_assoc($query)) {
      $_SESSION['user_id'] = $row["id"];
      $_SESSION['username'] = $row["name"];
      $_SESSION['email'] = $row["email"];
    }
       header('Location:dashboard.php');
  }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	  <title>Login-Page</title>
	  <meta content="PowerXacademyMockExam is an award winning unified learning platform that includes a learning management system (LMS), it helps you to manage your school mock exams in a better way." name="description">
  	<meta content="mock,exam,online,dashboard,admin" name="keywords">
    <link rel="icon" href="img/logo.jpeg" type="image/jpeg">
  	<!--icons link-->
  	<link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="preload" href="/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="/fonts/OpenSans-SemiBold.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="/fonts/OpenSans-Bold.ttf" as='font' crossorigin='anonymous'>
    <link href="assets/css/login.css" rel="stylesheet">
</head>
<body>
<style>
@media all and (max-width:775px){
  main{
    height:100%;
  }
  .login-box{
    padding: 14px;
  }
}
@media all and (max-width:500px){
  main{
    margin:0px;
    padding: 3% 3%;
  }
}
</style>
	<main>
  <?php 
  include 'backend_data/init.php';
  $name = $email = $username = $password = '';
  $nameErr = $passwordErr = $errormessage = '';
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $username = $passwd = ''; 
  if (isset($_POST['email']) && isset($_POST['pswd'])) {
    $email = test_input($_POST['email']);
    $passwd = test_input($_POST['pswd']);
    $sqle = "SELECT * FROM users WHERE email = '$email' AND password = '$passwd' ";
    $resulte = $conn->query($sqle);
      if ($resulte->num_rows > 0) {
      // output data of each row
        while($row = $resulte->fetch_assoc()) {
          if (isset( $_POST['remember'])) {
            setcookie('user_id',$row['id'],time() + 86400 * 30,'/');
          }
          $_SESSION['user_id'] = $row["id"];
          $_SESSION['username'] = $row["name"];
          $_SESSION['email'] = $row["email"];
               header('Location:dashboard.php');
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
        <section class="login_container"> 
            <div class="first-phase">
                <h2> PowerXacademy </h2>
                <p>PowerXacademyMockExam is an award winning unified learning platform that includes a learning management system (LMS), it helps you to manage your school mock exams in a better way.</p>
                <img src="assets/images/cuate.png" title=""> 
            </div>
            <div class="second-phase">
                <div class="login-box">
                    <h3>LOGIN</h3>
                    <br>
                    <?php echo $errormessage ?>
                    <form action="login.php" method="POST" class="needs-validation" novalidate>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="icon-envelope-o"></i></span>
                            </div>
                            <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="icon-lock_outline" style="font-size: 113%;"></i></span>
                            </div>
                            <input type="password" class="form-control" id="pwd" placeholder="Password" name="pswd" required>
                        </div>
                        <div class="form-group form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember Me
                          </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                      <br>
                      <br>
                      <label style="text-align: center;">Not a member? <a href="register.php">Create Account</a></label>
                </div>
            </div>
        </section>
	</main>
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	});
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
