<?php
setcookie('user_id',null, time() - 3600,'/' );
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Login-Page</title>
	<meta content=" Web Developer with a focus on Front-end and Mobile application." name="description">
  	<meta content="Okeke , Okeke Johnpaul , john's Biography , Johnpaul's Portfolio" name="keywords">
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
.login-box{
  height:500px;
}
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
<?php
  include 'backend_data/init.php';
  $name = $email = $username = $password = $department = '';
  $nameErr = $emailErr = $errormessage = '';
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  function confirmemail($data){
    include 'backend_data/init.php';
    $emailval = "SELECT * FROM registable WHERE email = '$data' ";
    $validator = $conn->query($emailval);
      if ($validator->num_rows > 0) {
        return false;
      }
    else{
      return true;
    }
    $conn->close();
  }
  function checkusername($data){
    include 'backend_data/init.php';
    $emailval = "SELECT * FROM registable WHERE username = '$data' ";
    $validator = $conn->query($emailval);
      if ($validator->num_rows > 0) {
        return false;
      }
    else{
      return true;
    }
    $conn->close();
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty(test_input($_POST['fname'])) && !empty(test_input($_POST['email'])) && !empty(test_input($_POST['username'])) && !empty(test_input($_POST['pswd']))){
      $name = test_input($_POST['fname']);
      $email = test_input($_POST['email']);
      $username = test_input($_POST['username']);
      $password = test_input($_POST['pswd']);
      $department = test_input($_POST['department']);
      $emailcheck = "SELECT * FROM `registable` WHERE 'email' = $email";
      $resulte = $conn->query($emailcheck);
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
      }
      else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
      else if(!confirmemail($email)){
        $errormessage ='<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        Email Address Already Exists</div>';
      }
      else if(!checkusername($username)){
        $errormessage ='<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        Username Already Exists</div>';
      }
      else if(!checkusername($username) && !confirmemail($email)){
        $errormessage ='<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        Username and Email Already Exists</div>';
      }
      else {
          $nameErr = $emailErr= '';
          
          $insertdetails = "INSERT INTO registable (id, name, email, username, department, password) 
          VALUES ('', '$name', '$email', '$username','$department', '$password')";
          if($conn->query($insertdetails)){
            $name = $email = $username = $password = $department= '';
            header('Location:dashboard.php');
          }
          else{
            echo "Record Not Succesful";
          }
      }
      $conn->close();
    }
  }

?>
	<main>
        <div class="back"><a href="index.php"><i class="icon-arrow-left"> </i> <span class="back-key"> Back to Home Screen </span> </a> </div>
        <section class="login_container"> 
            <div class="first-phase">
                <h2> REGISTER </h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    llendus a, provident repellat totam ex reiciendis 
                    impedit maxime optio tempora, dolores nemo, dolor molestiae ipsa 
                    beatae veritatis quam! Laboriosam, repudiandae 
                    obcaecati. </p>
                <img src="assets/images/cuate.png" title=""> 
            </div>
            <div class="second-phase">
                <div class="login-box">
                    <h3>MEMBER REGISTER</h3>
                    <br>
                    <?php echo $errormessage ?>
                    <form action="register.php" class="needs-validation" novalidate method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="icon-envelope-o"></i></span>
                            </div>
                            <input type="text" value='<?php echo $name ?>' class="form-control" id="fname" placeholder="Full Name" name="fname" required>
                            <?php echo '<span> '.$nameErr.' </span>'; ?>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="icon-envelope-o"></i></span>
                            </div>
                            <input type="text" value='<?php echo $email ?>' class="form-control" id="email" placeholder="Enter Email " name="email" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="icon-envelope-o"></i></span>
                            </div>
                            <input type="text" value='<?php echo $username ?>' class="form-control" id="username" placeholder="Enter Username" name="username" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="icon-envelope-o"></i></span>
                            </div>
                            <input type="text" value='<?php echo $department ?>' class="form-control" id="department" placeholder="Enter Department" name="department">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">  <i class="icon-lock_outline" style="font-size: 113%;"></i>  </span>
                            </div>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                      <br>
                      <label style="text-align: center;">A member? <a href="login.php">Log In</a></label>
                </div>
            </div>
        </section>
	</main>


</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	});

	// Preloader
    $(window).on('load', function() {
        if ($('#preloader').length) {
            $('#preloader').delay(100).fadeOut('slow', function() {
                $(this).remove();
            });
        }
        $(".header-container").css("transform" , "scale(1.0)");
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
