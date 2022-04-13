<?php
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
	  <title>PowerX Online Academy - Dashoard </title>
	  <meta content="" name="description">
  	<meta content="" name="keywords">
    <link rel="icon" href="../assets/image/icon.png" type="type/png">
  	<!--icons link-->
  	<link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/animate/animate.min.css" type="text/css" >
    <link rel="preload" href="../assets/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
    <link href="../assets/css/style.css" rel="stylesheet">
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
    }.abb {
    color: white !important;
    background-color: #23b315;
    padding: 0.5rem;
    font-size: 14px;
    font-weight: 600;
}.jumbotron{
  background-color: #23b315;
    border-radius: 20px;
    padding: 30px 15px;
    color: white;
    font-family: system-ui;
    margin-bottom:20px;
}
.menu-aside .submenu a {
    font-size: 13px;
}

</style>
<body>

<b class="screen-overlay"></b>

<aside class="navbar-aside" id="offcanvas_aside">
<div class="aside-top">
  <a href="dashboard.php" class="brand-wrap">
    <img src="../assets/image/icon-pro.png" height="46" class="logo" alt="Ecommerce dashboard template">
  </a>
  <div>
    <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
  </div>
</div> <!-- aside-top.// -->

<nav>
  <ul class="menu-aside">
    <li class="menu-item active"> 
      <a class="menu-link" href="dashboard.php"> <i class="icon material-icons md-show_chart"></i> 
        <span class="text">Dashboard</span> 
      </a> 
    </li>
    <li class="menu-item">
      <a class="menu-link" href="student.php"> <i class="icon material-icons md-person_outline"></i> 
        <span class="text">Students</span> 
      </a> 
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
      <li class="nav-item" style="display: flex;flex-direction: column;text-align: end;height: 30px;margin: 8px;">
        <b style="font-size: 12px;font-weight: 700;font-family: system-ui;line-height: 15px;color: #222133;"><?php echo $_SESSION['name'] ; ?></b>
        <span style="font-size: 11px;font-weight: 500;color: #7C7C7A;font-family: system-ui;"><?php echo $_SESSION['email'] ; ?></span>
      </li>

    </ul> 
  </div>
	</header>

<section class="content-main">
<div class="intro-div">
            <b>Dashboard</b>
            <span id="time" class="time"></span>
        </div>
        <br>
        <div class="jumbotron wow fadeInDownBig">
            <br>
            <h4>Welcome back, <?php echo $_SESSION['name']; ?>. </h4>
            <span>Executive dashboard for analytics and reports.</span> <br>
            <span>Keep it up to improve your results</span>
            <br>
        </div>
	
<div class="row" style="background-clip: border-box;border: 1px solid rgba(0,0,0,.125);border-radius: 0.25rem;">
            <div class="col-md-6 col-lg-3 card wow fadeInUpBig" data-wow-delay="0.1s">
                <div class="card-body" style="text-align:center"> 
                    <h6 class="card-subtitle mb-2 text-muted" style="system-ui">Administrators</h6>
                    <?php 
                      include '../backend_data/init.php';
                      $sql = "SELECT * FROM `users` WHERE role = 'instructor'";
                      $query = mysqli_query($conn,$sql);
                      echo '<h1 class="card-title" style="font-weight:900">'.mysqli_num_rows($query).'</h1>';
                      $conn->close();
                    ?>
                </div>
            </div> 
            <div class="col-md-6 col-lg-3 card wow fadeInUpBig" data-wow-delay="0.3s">
                <div class="card-body" style="text-align:center"> 
                    <h6 class="card-subtitle mb-2 text-muted" style="system-ui">Students</h6>
                    <?php 
                      include '../backend_data/init.php';
                      $sql = "SELECT * FROM `users` WHERE role = 'user'";
                      $query = mysqli_query($conn,$sql);
                      echo '<h1 class="card-title" style="font-weight:900">'.mysqli_num_rows($query).'</h1>';
                      $conn->close();
                    ?>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 card wow fadeInUpBig" data-wow-delay="0.5s">
                <div class="card-body" style="text-align:center"> 
                    <h6 class="card-subtitle mb-2 text-muted" style="system-ui">Classes</h6>
                    <h1 class="card-title" style="font-weight:900">17</h1>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 card wow fadeInUpBig" data-wow-delay="0.7s">
                <div class="card-body" style="text-align:center"> 
                    <h6 class="card-subtitle mb-2 text-muted" style="system-ui">Exams</h6>
                    <?php 
                      include '../backend_data/init.php';
                      $sql = "SELECT * FROM `exams` WHERE published = 'yes'";
                      $query = mysqli_query($conn,$sql);
                      echo '<h1 class="card-title" style="font-weight:900">'.mysqli_num_rows($query).'</h1>';
                      $conn->close();
                    ?>
                </div>
            </div>

	</div>
    <br>


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
<script type="text/javascript" src="../assets/js/wow/wow.min.js"></script>
<script type="text/javascript" src="../assets/js/wow/main.js"></script>
<!-- Custom JS -->
<script src="../assets/js/script.js?v=1.0" type="text/javascript"></script>

</body>
</html>
