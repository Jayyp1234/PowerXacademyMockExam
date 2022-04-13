<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>PowerX Online Academy - PASSWORD RESET</title>
	<meta content="" name="description">
  	<meta content="" name="keywords">
    <link rel="icon" href="../assets/image/icon.png" type="type/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
	<main>
<div class="container row" style="max-width:600px;justify-content:center;margin:auto;align-items: center;display: flex;height: 100vh;">
  <form method="POST" class="needs-validation form" novalidate>

<?php 
include '../backend_data/init.php';

if(isset($_POST['submit_email'])){
$email = $_POST['email'];
$userName='';
$sql ="SELECT * FROM users WHERE email = '$email' ";
 $select= mysqli_query($conn,$sql);
  if($select){
  if(mysqli_num_rows($select)==1)
  {
    $row=mysqli_fetch_assoc($select);
    
      $emailenc= md5($row['email']);
      $pass= $row['password'];
      $userName = $row['name'];
       $link="<a style='background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;' href='https://powerxacademyschool.org.ng/forgot_password/reset.php?key=".$emailenc."&reset=".$pass."'>Click To Reset password</a>";
          $to = $email;
            // Subject
            $subject = "Password Reset";
            // Message
            $emailMsg = "You have attempted to reset your password...";
            
            #frontend...
                  //you can style this message  
            $message = '
            <html lang="en-US">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Reset Password Email</title>
    <meta name="description" content="Reset Password Email">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">You have
                                            requested to reset your password</h1>
                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            We cannot simply send you your old password. A unique link to reset your
                                            password has been generated for you. To reset your password, click the
                                            following link and follow the instructions.
                                        </p>'.$link.'
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            // To send HTML mail, the Content-type header must be set
            $headers .= 'X-Mailer: PHP/' . phpversion();
            
           mail('<'.$to.'>',$subject,$message,$headers);
              
              //create an html stuff that echo this..
      echo "<div class='alert alert-success' role='alert'>
  Check Your Email and Click on the link sent to your email
</div>";
    
  }else{
      echo "<div class='alert alert-danger' role='alert'>You Have Not Registered with this email address </div>";
  }
  }
}
  ?>
  <img src="../assets/image/icon.png" />
    <h3>Forgot Password ?</h3>
    <span>Enter your email below</span>
    <br>
    <div class="col-md-12 form-field">
      <label>email</label>
        <input type="text" class="form-control" id="email" placeholder="Email" name="email" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <br>
    <div class="col-md-12 form-field">
      <button type="submit" name='submit_email'>Submit</button>
    </div>  
    <div style="margin-top:8px;display:flex;justify-content:center;">
    <span class="ll">Don’t have an account? </span> <a href="../register" class="tt">Sign up</a>
    </div>       
    <div style="margin-top:0px;display:flex;justify-content:center;">
        <span class="ll">Forgot Password? </span> <a href="../forgot_password" class="tt">Click Here</a>
      </div>        
  </form>
</div>
	</main>
</body>
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