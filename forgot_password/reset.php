<?php
ob_start();
?>
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
if(isset($_POST['submit_password']))
{

$email= $_POST['email'];
$pass= $_POST['password'];
$sql = "UPDATE users set password = '$pass' where email = '$email' ";
$query = mysqli_query($conn,$sql);
if($query){
  //  echo "user password successfully updated...";
    header('location:../login');
}else{
    echo "error updating user details.";
}

}


if($_GET['key'] && $_GET['reset'])
{   
    $key = $_GET['key'];
    $hash = $_GET['reset'];
  //  print_r($_GET);
    $sql = "SELECT * FROM user where md5(email) = '$key' and password ='$hash' ";
    $query = mysqli_query($conn , $sql);
    if($query){
        if(mysqli_num_rows($query) == 1){
        $row = mysqli_fetch_assoc($query);
        $email = $row['email'];
        ?>
        <img src="../assets/image/icon.png" />
    <h3>RESET PASSWORD</h3>
    <span>Enter New password</span>
    <br>
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <div class="col-md-12 form-field">
      <label>Enter Password</label>
        <input type="text" class="form-control" id="password" name="password" required>
    </div>
    <br>
    <div class="col-md-12 form-field">
      <button type = 'submit' name='submit_password'>Submit</button>
    </div>  
    
  </form>
    <?php
  }else{
      header('location:../login');
      ob_end_flush();
  }
}
}
?>

    
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
