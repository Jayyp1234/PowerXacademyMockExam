<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PowerX Online Academy - Register</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="icon" href="../assets/image/icon.png" type="type/png">
  <!--icons link-->
  <link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="preload" href="../assets/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
  <link rel="preload" href="../assets/fonts/OpenSans-SemiBold.ttf" as='font' crossorigin='anonymous'>
  <link rel="preload" href="../assets/fonts/OpenSans-Bold.ttf" as='font' crossorigin='anonymous'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" >
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/form.css" rel="stylesheet">
</head>
<style>
  .dropdown-menu.show {
    height: 300px !important;
    overflow-y: auto;
    width: 300px !important;
}.wlsm-form-group1 button {
    background: #eeeeee;
    box-shadow: none;
    border-radius: 12.3566px;
    color: #797575;
  }
</style>
<body>

  <?php
  include '../backend_data/init.php';
  $name = $email = $username = $password = $department = '';
  $nameErr = $emailErr = $errormessage = '';
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  function createKey() { 
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 
    while ($i <= 10) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
        } 
         return $pass; 
    }
  function confirmemail($data){
    include '../backend_data/init.php';
    $emailval = "SELECT * FROM users WHERE email = '$data' ";
    $validator = $conn->query($emailval);
      if ($validator->num_rows > 0) {
        return false;
      }
    else{
      return true;
    }
    $conn->close();
  }
  
  if(isset($_POST['signup'])){
  $errorMessage = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty(test_input($_POST['name'])) && !empty(test_input($_POST['email'])) && !empty(test_input($_POST['gender'])) && !empty(test_input($_POST['login_username'])) && !empty($_POST['class_id']) && !empty(test_input($_POST['login_email'])) && !empty(test_input($_POST['login_password'])) ){
      $name = test_input($_POST['name']);
      $email = test_input($_POST['email']);
      $gender = test_input($_POST['gender']);
      $religion = test_input($_POST['religion']);
      $address = test_input($_POST['address']);
      $phoneno = test_input($_POST['phone']);
      $city = test_input($_POST['city']);
      $state = test_input($_POST['state']);
      $country = test_input($_POST['country']);
      $class = implode(",",$_POST['class_id']);
      $loginname = test_input($_POST['login_username']);
      $loginemail = test_input($_POST['login_email']);
      $password = test_input($_POST['login_password']);
      $password1 = test_input($_POST['login_conpassword']);
      $key = createKey();
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errormessage .='<div class="alert alert-warning alert-dismissible fade show" role="alert">
          Only letters and white space allowed
        </div>';
      }
      else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errormessage .='<div class="alert alert-warning alert-dismissible fade show" role="alert">
          Invalid email address
        </div>';
      }
      else if(!confirmemail($email)){
        $errormessage .='<div class="alert alert-warning alert-dismissible fade show" role="alert">
          Email address already exists.
        </div>';
      }
      else if($password != $password1){
        $errormessage .='<div class="alert alert-warning alert-dismissible fade show" role="alert">
          Passwords does not match, please try again.</div>';
      }
      else {
        $recaptcha = $_POST['g-recaptcha-response'];
        $secretKey = SECRETKEY;
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey . '&response=' . $recaptcha;
        $res = json_decode(file_get_contents($url));
        if($res->success == 1){
          $nameErr = $emailErr= '';
          $insertdetails = "
          INSERT INTO `users`(`id`, `name`, `student_id`, `email`, `password`, `gender`, `religion`, `address`, `phoneno`, `city`, `state`, `country`, `class`, `image`, `section`, `login_username`, `login_email`, `activity`, `role`, `payment_time`, `expiry_time`, `payment_status`) 
          VALUES 
          ('','$name','$key','$email','$password','$gender','$religion','$address','$phoneno','$city','$state','$country','$class','','','$loginname','$loginemail','','user','0','0','owing')";
          
          if($conn->query($insertdetails)){
            echo $name;
            $sql = "SELECT * FROM users where name ='$name' ";
              $query = mysqli_query($conn,$sql);
              if ($query) {
                while ($row = mysqli_fetch_assoc($query)) {
                  $_SESSION['user_id'] = $row["id"];
                  $_SESSION['name'] = $row["name"];
                  $_SESSION['email'] = $row["email"];
                  $_SESSION['role'] = $row["role"];
                }
                if($_SESSION['role'] == 'user'){
                  header('Location:../checkout.php?id='.$_SESSION['user_id']);
                  ob_end_flush();
                  
                }
                else if($_SESSION['role'] == 'admin'){
                  header('Location:..admin/dashboard/');
                  ob_end_flush();
                }
                else{
                  header('Location:..instructor/dashboard/');
                  ob_end_flush();
                }
                
              }
              
          }
          else{
            echo "Record Not Succesful";
          }
        }else{
            //echo agba  hacker or robot..
            echo "invalid...";
        }
          
      }
      $conn->close();
    }
  }
  }

?>

  <main>
    <div class="container row"
      style="justify-content:center;margin:auto;align-items: center;display: flex;height: 100vh;margin-top:20px;margin-bottom:25px;">
      <br>
      <form method="POST" class="needs-validation form" novalidate id="wlsm-submit-registration-form">
        <img src="../assets/image/icon.png" />
        <?php echo $errormessage ?>
        <h3>PowerX Online Academy Registration</h3>
        <span>PowerX Academy Digital Campus</span>
        <div class="wlsm-form-section">
          <div class="wlsm-row">
            <div class="wlsm-col-12">
              <div class="wlsm-form-sub-heading wlsm-font-bold">
                Personal Detail </div>
            </div>
          </div>

          <div class="row">
            <div class="wlsm-form-group col-md-12">
              <label for="wlsm_name" class="wlsm-font-bold">
                <span class="wlsm-important">*</span> Student Name:
              </label>
              <input type="text" name="name" class="wlsm-form-control" id="wlsm_name" placeholder="Enter student name"
                value="">
            </div>

            <div class="wlsm-form-group col-md-12">
              <label class="wlsm-font-bold wlsm-d-block">
                <span class="wlsm-important">*</span> Gender:
              </label>
              <div class="wlsm-form-check wlsm-form-check-inline">
                <input class="wlsm-form-check-input" type="radio" name="gender" id="wlsm_gender_Male" value="male"
                  checked="checked" style="width:auto;display:inline;">
                <label class="wlsm-ml-1 wlsm-form-check-label wlsm-font-bold" for="wlsm_gender_Male">
                  Male </label>
              </div>
              <div class="wlsm-form-check wlsm-form-check-inline">
                <input class="wlsm-form-check-input" type="radio" name="gender" style="width:auto;display:inline;" id="wlsm_gender_Female" value="female">
                <label class="wlsm-ml-1 wlsm-form-check-label wlsm-font-bold" for="wlsm_gender_Female">
                  Female </label>
              </div>
    
            </div>

          </div>

          <div class="wlsm-row">

            <div class="wlsm-form-group wlsm-col-4" id="registration_religion">
              <label for="wlsm_religion" class="wlsm-font-bold">
                Religion:
              </label>
              <input type="text" name="religion" class="wlsm-form-control" id="wlsm_religion"
                placeholder="Enter religion" value="">
            </div>


          </div>

          <div class="row">
            <div class="wlsm-form-group col-md-12">
              <label for="wlsm_address" class="wlsm-font-bold">
                Address:
              </label>
              <textarea name="address" class="wlsm-form-control" id="wlsm_address" cols="30" rows="3"
                placeholder="Enter student address"></textarea>
            </div>

            <div class="wlsm-form-group col-md-6" id="registration_phone">
              <label for="wlsm_phone" class="wlsm-font-bold">
                Phone:
              </label>
              <input type="text" name="phone" class="wlsm-form-control" id="wlsm_phone"
                placeholder="Enter student phone number" value="">
            </div>

            <div class="wlsm-form-group col-md-6">
              <label for="wlsm_email" class="wlsm-font-bold">
                Email:
              </label>
              <input type="email" name="email" class="wlsm-form-control" id="wlsm_email"
                placeholder="Enter student email address" value="">
            </div>
          </div>

          <div class="row">
            <div class="wlsm-form-group col-md-4" id="registration_city">
              <label for="wlsm_city" class="wlsm-font-bold">
                City:
              </label>
              <input type="text" name="city" class="wlsm-form-control" id="wlsm_city" placeholder="Enter city" value="">
            </div>

            <div class="wlsm-form-group col-md-4" id="registration_state">
              <label for="wlsm_state" class="wlsm-font-bold">
                State:
              </label>
              <input type="text" name="state" class="wlsm-form-control" id="wlsm_state" placeholder="Enter state"
                value="">
            </div>

            <div class="wlsm-form-group col-md-4" id="registration_country">
              <label for="wlsm_country" class="wlsm-font-bold">
                Country:
              </label>
              <input type="text" name="country" class="wlsm-form-control" id="wlsm_country" placeholder="Enter country"
                value="">
            </div>
          </div>

        </div>

        <!-- Admission Detail -->
        <div class="wlsm-form-section">
          <div class="row">
            <div class="wlsm-col-12">
              <div class="wlsm-form-sub-heading wlsm-font-bold">
                Admission Detail </div>
            </div>
          </div>

          <div class="row">
            <div class="wlsm-form-group wlsm-form-group1 col-md-6">
              <label for="wlsm_school_class" class="wlsm-font-bold">
                <span class="wlsm-important">*</span> Class:
              </label>
              <select class="selectpicker" name="class_id[]" style="display:none;" multiple aria-label="Default select example" data-live-search="true">
                <option value="">Select Class</option>
                <?php
                include '../backend_data/init.php';
                $sql = "SELECT * FROM classes ORDER BY title ASC";
                $query = mysqli_query($conn,$sql);
                if($query){
                    if(mysqli_num_rows($query) > 0){
                        while($row = mysqli_fetch_assoc($query)){
                            echo '<option value="'.$row['title'].'">'.$row['title'].'</option>';
                        }
                    }
                }
                
            ?>

              </select>
              </div>

            <div class="wlsm-form-group col-md-6">
              <div class="wlsm-photo-box wlsm-mt-2">
                <div class="wlsm-photo-section">
                  <label for="wlsm_photo" class="wlsm-font-bold">
                    Upload Student Photo:
                  </label>
                  <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="wlsm_photo" name="photo">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Parent / Guardian Name and Login Detail -->
        <div class="wlsm-form-section" id="registration_parent_login">
          <div class="wlsm-row">
            <div class="wlsm-col-12">
              <div class="wlsm-form-sub-heading wlsm-font-bold">
                Student / Parent Login Detail </div>
            </div>
          </div>

        

          <div class="wlsm-parent-new-user">
            <div class="row">
              <div class="wlsm-form-group col-md-6">
                <label for="wlsm_parent_username" class="wlsm-font-bold">
                  <span class="wlsm-important">*</span> Username:
                </label>
                <input type="text" name="login_username" class="wlsm-form-control" id="wlsm_parent_username"
                  placeholder="Enter username">
              </div>

              <div class="wlsm-form-group col-md-6">
                <label for="wlsm_parent_login_email" class="wlsm-font-bold">
                  <span class="wlsm-important">*</span> Login Email:
                </label>
                <input type="email" name="login_email" class="wlsm-form-control" id="wlsm_parent_login_email"
                  placeholder="Enter login email">
              </div>

              <div class="wlsm-form-group col-md-6">
                <label for="wlsm_parent_login_password" class="wlsm-font-bold">
                  <span class="wlsm-important">*</span> Password:
                </label>
                <input type="password" name="login_password" class="wlsm-form-control" autocomplete="true"
                  placeholder="Enter password">
              </div>
              <div class="wlsm-form-group col-md-6">
                <label for="wlsm_parent_login_password" class="wlsm-font-bold">
                  <span class="wlsm-important">*</span> Confirm Password:
                </label>
                <input type="password" name="login_conpassword" class="wlsm-form-control" autocomplete="true"
                  placeholder="Confirm password">
              </div>
            </div>
          </div>
        </div>
      <br>
        <!-- div to show reCAPTCHA -->
      <div class="g-recaptcha" 
      data-sitekey="<?php echo SITEKEY ?>">
      </div>
      <br>
      <div class="col-md-12 wlsm-form-group">
        <button type="submit" name='signup'>Sign Up</button>
      </div>
      <div style="margin-top:8px;display:flex;justify-content:center;">
        <span class="ll">Already have an account? </span> <a href="../login" class="tt">Log In</a>
      </div>
      
      </form>
      <br><br>
    </div>
  </main>
</body>
<script type="text/javascript" src="../assets/js/custom.js"></script>
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
  (function () {
    'use strict';
    window.addEventListener('load', function () {
      // Get the forms we want to add validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
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
