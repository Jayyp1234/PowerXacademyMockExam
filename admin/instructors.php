<?php
include '../backend_data/init.php';
session_start();
ob_start();

if(!isset($_SESSION['user_id'])){
    header('location:../login/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>PowerX Academy - Instructors</title>
	<meta content="" name="description">
  	<meta content="" name="keywords">
    <link rel="icon" href="../assets/image/icon.png" type="type/png">
  	<!--icons link-->
  	<link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="preload" href="../assets/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/datatables.min.css" rel="stylesheet">
    <link href="../assets/css/ui.css?v=1.1" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/responsive.css?v=1.1" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" >
    <!-- iconfont -->
    <link rel="stylesheet" href="../assets/fonts/material-icon/css/round.css"/>

</head>
<style>
    .menu-aside .menu-link {
        padding: 10px;
        color: #7C7C7A;
        font-family: system-ui;
        font-weight: 600;
        font-size: 14.2px;
    }.menu-aside .menu-item {
        margin-bottom: 10px;
    }.menu-aside .menu-item.active .menu-link {
    color: #39bc2d;
    background-color: #ebf0fd;
    border-left: 5px solid #23b315;
    border-radius: 0;
}.menu-aside .menu-item.active .icon {
    color: #23b315;
}.pip{
        background: #F5F5F5;
        font-size: 14px;
        font-family: system-ui;
        border-radius: 0px 7px 7px 0px;
    }.pip2{
        background: #F5F5F5;
        font-size: 14px;
    }
    table, table label{
      font-family:system-ui !important;
      font-size:15px !important;
    }
    table tr th{
        color: #6B6F7B !important;
        font-weight: 400 !important;
        font-size: 16px !important;
        font-family:system-ui;
    }
    table tr td{
        color:#313A4E;
        font-family:system-ui;
    }
    table tr span{
        color: #6B6F7B;
        font-weight:500;

    }.btn.dropdown-toggle.bs-placeholder.btn-light{
      width: 100% !important;
      height: 50px !important;
    }
    .inner {
      padding:0 !important;
    }
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
    .content-header1{
        display: flex;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: wrap;
        margin-bottom: 30px;
    }.content-header1 button, .btn-group > button{
        background: #F7F7F7;
        border: 0.967351px solid #F0F0F0;
        border-radius: 9.67351px;
        color: #888888;
        font-size:14px;
        margin-right:15px;
        font-weight:400;
    }.content-section1 button.active{
        background-color: #707EFF;
        color:white;
        font-weight:500 !important;
        font-family: system-ui !important;
    }.abb {
    color: white !important;
    background-color: #23b315;
    padding: 0.5rem;
    font-size: 14px;
    font-weight: 600;
}
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: #333;
    font-size: 15px;
    font-family: system-ui;
}
.menu-aside .submenu a {
    font-size: 13px;
}table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd {
    background-color: #ebf0fd;
}table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1 {
    background-color: #f1f1f100;
}.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #fff !important;
    border: none !important; 
    background-color: #23b315 !important;
    PADDING: 5PX 12PX;
    border-radius: 8px;
    background: linear-gradient(to bottom, #23b315 0%, #23b315 100%);
}td{
  white-space: nowrap !important;
}
</style>
<body>

<b class="screen-overlay"></b>

<aside class="navbar-aside" id="offcanvas_aside">
<div class="aside-top">
  <a href="page-index-1.html" class="brand-wrap">
    <img src="../assets/image/icon-pro.png" height="46" class="logo" alt="template">
  </a>
  <div>
    <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
  </div>
</div> <!-- aside-top.// -->

<nav>
  <ul class="menu-aside">
    <li class="menu-item "> 
      <a class="menu-link" href="dashboard.php"> <i class="icon material-icons md-show_chart"></i> 
        <span class="text">Dashboard</span> 
      </a> 
    </li>
    <li class="menu-item active">
      <a class="menu-link" href="instructors.php"> <i class="icon material-icons md-person"></i> 
        <span class="text">Instructors</span> 
      </a> 
    </li>
    <li class="menu-item">
      <a class="menu-link" href="student.php"> <i class="icon material-icons md-person_outline"></i> 
        <span class="text">Students</span> 
      </a> 
    </li>
    <!--
    <li class="menu-item has-submenu"> 
      <a class="menu-link" href="card.php"> <i class="icon material-icons md-book"></i>  
        <span class="text">Assessments</span> 
      </a> 
      <div class="submenu">
        <a href="exams.php">Exams</a>
        <a href="create_exam.php">Generate Exam for Students</a>
        <a href="upload_result.php">Upload Results</a>
      </div>
    </li>
    -->
    <li class="menu-item has-submenu"> 
      <a class="menu-link" href="card.php"> <i class="icon material-icons md-payment"></i>  
        <span class="text">Payments and Bill</span> 
      </a> 
      <div class="submenu">
        <a href="bills.php">Bills</a>
        <a href="bill_student.php">Student Bill</a>
        <a href="bill_transaction.php">Transactions</a>
      </div>
    </li>
    <li class="menu-item has-submenu "> 
      <a class="menu-link" href="card.php"> <i class="icon material-icons md-book"></i>  
        <span class="text">Results</span> 
      </a> 
      <div class="submenu">
        <a href="assement-result/generate.php">Generate Exam Results</a>
        <a href="assement-result/upload.php">Upload Exam Results</a>
        <a href='assement-result/generatem.php'>Generate Mid Term Results </a>
        <a href="assement-result/upload_mid.php">Upload Mid Term Results</a>
        
      </div>
    </li>
  </ul>
  <hr>
  <ul class="menu-aside">
    <li class="menu-item"> 
      <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i> 
        <span class="text">Settings</span> 
      </a>
      
    </li>
    <li class="menu-item">
      <a class="menu-link" href="../logout"> <i class="icon material-icons md-log_out"></i> 
        <span class="text"> Logout </span>
      </a> 
    </li>
  </ul>
  <br>
  <br>
</nav>
</aside>

<main class="main-wrap">
	<header class="main-header navbar">
		<div class="col-search">
			<form class="searchform">
				<div class="input-group">
                <button class="btn btn-light bg pip2" type="button"> <i class="material-icons md-search"></i> </button>
				  <input type="text" class="form-control pip" placeholder="Search...">
				</div>
			</form>
		</div>
		<div class="col-nav">
     <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="md-28 material-icons md-menu"></i> </button>
     <ul class="nav">
      <li class="nav-item">
          <a class="nav-link btn-icon" onclick="darkmode(this)" title="Dark mode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn-icon abb" style="border-radius:50%;" href="#"> <i class="material-icons md-notifications_active"></i> </a>
      </li>
      <li class="nav-item" style="display: flex;
    flex-direction: column;
    text-align: end;
    height: 30px;
    margin: 8px;">
        <b style="font-size: 12px;font-weight: 700;font-family: system-ui;line-height: 15px;color: #222133;"><?php echo $_SESSION['name']; ?></b>
        <span style="font-size: 11px;font-weight: 500;color: #7C7C7A;font-family: system-ui;"><?php echo $_SESSION['email']; ?></span>
      </li>
    </ul> 
  </div>
	</header>
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
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty(test_input($_POST['name'])) && !empty(test_input($_POST['email'])) && !empty($_POST['class_id'])  ){
      $name = test_input($_POST['name']);
      $email = test_input($_POST['email']);
      $gender = 'data';
      $religion = 'data';
      $address = 'data';
      $phoneno = 'data';
      $city = 'data';
      $state = 'data';
      $country = 'data';
      $class = implode(",",$_POST['class_id']);;
      $loginname = 'data';
      $loginemail = test_input($_POST['email']);
      $password = test_input($_POST['password']);
      $password1 = test_input($_POST['password']);
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
          Passwords does not match, please try again.
        </div>';
      }
      else {
          $nameErr = $emailErr= '';
          $insertdetails = "INSERT INTO `users`(`id`, `name`, `student_id`, `email`, `password`, `gender`, `religion`, `address`, `phoneno`, `city`, `state`, `country`, `class`, `image`, `section`, `login_username`, `login_email`, `activity`, `role`, `payment_time`, `expiry_time`, `payment_status`) 
          VALUES 
          ('','$name','$key','$email','$password','$gender','$religion','$address','$phoneno','$city','$state','$country','$class','','','$loginname','$loginemail','','instructor','0','0','paid')";
          if($conn->query($insertdetails)){
              header('Location:instructors.php');
          }
          else{
            echo "Record Not Succesful";
          }
      }
      $conn->close();
    }
  }
?>
<section class="content-main">
    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;margin-bottom:20px;">
            <h4>  Instructors </h4>
        
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Instructor</button>      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action='instructors.php'>
          <div class="mb-3">
            <label class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" name='name'>
          </div>
          <div class="mb-3">
            <label class="col-form-label">Email:</label>
            <input type="text" class="form-control" name='email'>
          </div>
          <div class="mb-3">
            <label class="col-form-label">Class:</label>
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
          <div class="mb-3">
            <label  class="col-form-label">Password:</label>
            <input type="password" name='password' class="form-control">
          </div>
          <input type='submit' name='signup' class="btn btn-primary" value="Create" >
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
    </div>
	<div class="card mb-4">
          <div class="card-body">
          	<div class="table-responsive">
          	<table id="example" class="display" style="width:100%">
            <?php
                include '../backend_data/init.php';
                $sql = "SELECT * FROM users where role = 'instructor' ORDER BY id DESC  ";
                $query = mysqli_query($conn,$sql);
                 if($query){
                     if(mysqli_num_rows($query) > 0){
                         
                         $output = "<thead>
                         <tr>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Class</th>
                             <th>Password</th>
                         </tr>
                     </thead><tbody>";
                     while($row = mysqli_fetch_assoc($query)){
                         
                         $output .="<tr>
                         <td>".$row['name']."</td>
                         <td>".$row['email']."</td>
                         <td>".$row['class']."</td>
                         <td>".$row['password']."</td>
                
                         </tr>";
                     }
                 }else{
                     $output = '<b>You do not have any Instructors</b>';
                 }
                 echo $output."</tbody>";
                 }
                
                ?>
          </table>
          	</div> <!-- table-responsive end// -->
          </div> <!-- card-body end// -->
    </div> <!-- card end// -->

</section> <!-- content-main end// -->
</main>

<script type="text/javascript">
	if(localStorage.getItem("darkmode")){
		var body_el = document.body;
		body_el.className += 'dark';
	}
</script>


<script type="text/javascript" src="../assets/js/custom.js"></script>
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Custom JS -->
<script src="../assets/js/script.js?v=1.0" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf'
        ]
    } );
});
</script>
</body>
</html>
