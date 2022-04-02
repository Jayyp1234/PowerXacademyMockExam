<?php
include '../backend_data/init.php';
session_start();

if(!isset($_SESSION['user_id'])){
    header('location:../login/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	  <title>Power X Academy - Create Exam </title>
	  <meta content="" name="description">
  	<meta content="" name="keywords">
    <link rel="icon" href="../assets/image/icon.png" type="type/png">
  	<!--icons link-->
  	<link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="preload" href="../assets/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/form.css" rel="stylesheet">
    <link href="../assets/datatables.min.css" rel="stylesheet">
    <link href="../assets/css/ui.css?v=1.1" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/responsive.css?v=1.1" rel="stylesheet" />
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
    .abb {
    color: white !important;
    background-color: #23b315;
    padding: 0.5rem;
    font-size: 14px;
    font-weight: 600;
}

.menu-aside .submenu a {
    font-size: 13px;
}
</style>
<body>

<b class="screen-overlay"></b>

<aside class="navbar-aside" id="offcanvas_aside">
<div class="aside-top">
  <a href="page-index-1.html" class="brand-wrap">
    <img src="../assets/image/icon-pro.png" height="46" class="logo" alt="Ecommerce dashboard template">
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
    
    <li class="menu-item">
      <a class="menu-link" href="student.php"> <i class="icon material-icons md-person_outline"></i> 
        <span class="text">Students</span> 
      </a> 
    </li>
    <li class="menu-item has-submenu active"> 
      <a class="menu-link" href="#"> <i class="icon material-icons md-book"></i>  
        <span class="text">Assessments</span> 
      </a> 
      <div class="submenu">
        <a href="exams.php">Exams</a>
        <a href="create_exam.php">Generate Exam for Students</a>
        <a href="upload_result.php">Upload Results</a>
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
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty(test_input($_POST['title'])) && !empty(test_input($_POST['start'])) && !empty(test_input($_POST['finish'])) && !empty(test_input($_POST['type']))){
      $name = test_input($_POST['title']);
      $start = test_input($_POST['start']);
      $finish = test_input($_POST['finish']);
      $no = test_input($_POST['no']);
      $type = test_input($_POST['type']);
      $duration = test_input($_POST['duration']);
      $class = test_input($_POST['class_id']);
      $publish = $_POST['publish'];
      $upload = $_POST['just_upload'];
      $emailcheck = "INSERT INTO `exams`(`id`, `title`, `start_time`, `close_time`, `duration`, `status`, `length`, `view_score`, `type`, `published`, `upload`, `class`) 
      VALUES ('','$name','$start','$finish','$duration','0','$no','yes','$type', '$publish', '$upload', '$class')";
      if($conn->query($emailcheck)){
        header('Location:exams.php');
      }
      else{
        echo "Record Not Succesful";
      }
      $conn->close();
    }
  }

?>
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
      <li class="nav-item" style="display: flex;flex-direction: column;text-align: end;height: 30px;margin: 8px;">
        <b style="font-size: 12px;font-weight: 700;font-family: system-ui;line-height: 15px;color: #222133;"><?php echo $_SESSION['name']; ?></b>
        <span style="font-size: 11px;font-weight: 500;color: #7C7C7A;font-family: system-ui;"><?php echo $_SESSION['email']; ?></span>
      </li>
      <li class="nav-item">
        <a class="nav-link abb" href="#"> OE </a>
      </li>

    </ul> 
  </div>
	</header>

<section class="content-main">
    <div style="display:flex;justify-content:space-between;flex-wrap:wrap;">
        <div class="content-header" style="margin-bottom:0" >
            <h4> Create Exam </h4>
	    </div>
    </div>
    <div class="row container" style="margin:0;">
            <form method="POST" class="container-fluid form" >
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" placeholder="Title">
                </div>
                <div class="mb-3">
                    <label>Start Time</label>
                    <input name="start" type="datetime-local"  >
                </div>
                <div class="mb-3">
                    <label>Finish Time</label>
                    <input name="finish" type="datetime-local" >
                </div>
                <div class="mb-3">
                    <label>Questions No</label>
                    <input name="no" type="number">
                </div>
                <div class="mb-3">
                    <label>Duration</label>
                    <input name="duration" type="number" placeholder="In Minutes">
                </div>
                <div class="mb-3">
                    <label>Type</label>
                    <select name="type">
                        <option value="exam">Exam</option>
                        <option value="test">Test</option>
                        <option value="quiz">Short Quiz</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Class</label>
                    <select name="class_id" class="wlsm-form-control" id="wlsm_school_class">
                      <option value="">Select Class</option>
                      <option value="Grade 1">
                        Grade 1 </option>
                      <option value="Grade 2">
                        Grade 2 </option>
                      <option value="Grade 3">
                        Grade 3 </option>
                      <option value="Grade 4">
                        Grade 4 </option>
                      <option value="Grade 5">
                        Grade 5 </option>
                      <option value="Grade 6">
                        Grade 6 </option>
                      <option value="Grade 7">
                        Grade 7 </option>
                      <option value="Grade 8">
                        Grade 8 </option>
                      <option value="Grade 9">
                        Grade 9 </option>
                      <option value="Grade 10">
                        Grade 10 </option>
                      <option value="Grade 11">
                        Grade 11 </option>
                      <option value="Grade 12">
                        Grade 12 </option>
                      <option value="College">
                        College </option>
                      <option value="University">
                        University </option>
                      <option value="Vocational Course">
                        Vocational Course </option>
                      <option value="Professional Course">
                        Professional Course </option>
                      <option value="Others">
                        Others </option>
                      <option value="Qur’an (Boys)">
                        Qur’an (Boys) </option>
                      <option value="Qur’an (Girls)">
                        Qur’an (Girls) </option>
                      <option value="Arabic (Beginners)">
                        Arabic (Beginners) </option>
                      <option value="Arabic (Advanced)">
                        Arabic (Advanced) </option>
                      <option value="Physics">
                        Physics </option>
                      <option value="Chemistry">
                        Chemistry </option>
                      <option value="Biology">
                        Biology </option>
                      <option value="Coding &amp; STEM Course">
                        Coding &amp; STEM Course </option>
                      <option value="Business &amp; Investment Coaching">
                        Business &amp; Investment Coaching </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Do you want exam to be visible now ?</label>
                    <select name="publish">
                        <option value="yes">Yes</option>
                        <option value="no">no</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label style="margin-top:7px;">Just Upload</label>
                    <select name="just_upload">
                        <option value="yes">Yes</option>
                        <option value="no">no</option>
                    </select>
                </div>
                <button  type="submit" class="btn">Submit</button>
            </form>
        </div>
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
<script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../assets/datatables.min.js"></script>

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
