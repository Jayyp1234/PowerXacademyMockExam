<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location:login.php');
}
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
    <link rel="preload" href="assets/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="assets/fonts/OpenSans-SemiBold.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="assets/fonts/OpenSans-Bold.ttf" as='font' crossorigin='anonymous'>
    <link href="assets/css/dashboard.css" rel="stylesheet">
</head>
<body>
    <i class="icon-bars"></i>
    <nav>
        <br>
        <br>
        <br>
        <ul>
            <li><a href="dashboard.php"><i class="icon-dashboard"></i><span> Dashboard</span> </a></li>
            <li><a href="course.php"> <i class="icon-globe"></i> <span> Courses </span> </a></li>
            <li><a href="resources.php"> <i class="icon-hdd-o"></i> <span> Resources </span> </a></li>
            <li ><a href="challenge.php"> <i class="icon-child"></i> <span> Challenge </span> </a></li>
            <li><a href="Q&A.php"> <i class="icon-square"> </i><span> Q and A </span> </a></li>
            <li class="active"><a href="settings.php"> <i class="icon-gears"> </i> <span> Settings </span> </a></li>
        </ul>
        <ul class="logout">
            <li><a href="backend_data/logout.php"> <i class="icon-power-off"> </i> <span> Log out </span> </a></li>
        </ul>
        <br>
    </nav>
    <main>
        <div class="intro-div">
            <b>Dashboard</b>
            <span id="time" class="time"></span>
        </div>
        <div class="bread-crum">
            <a href="dashboard.php">Home</a> / 
            <a href="settings.php">Settings</a> 
        </div>
        <br>
    
        <div class="details-page">
            <div class="logout2">
                <a href="backend_data/logout.php"><button type="button" class="btn btn-primary">Log out</button></a>
            </div>
            <div style="text-align: center;margin-top: 30px;line-height: 1.2;font-size: 14.5;font-weight: 600;">
                <img src="assets/images/pngkey.com-linea-punteada-png-4149828.png" style="width: 100px;height: 100px;display: block;margin: auto;">
                <span class='name'><?php echo $_SESSION['username']; ?></span><br>
                <span class="department">Systems Engineering</span><br>
                <span class="level">100l</span>
            </div>
            <br>
            <header>Performance</header>
            <div style="display: flex;" class="perf">
                <span class="a1">A1</span>
                <div class="iota">
                    <span style="font-size: 90%;font-weight: 500;">Pratical Physics</span> <br>
                    <div style="display: flex;align-items: center;justify-content: space-between;">
                        <span class="evaluation">High Intermidiate</span>
                        <div class="progress" style="height:7px;width: 80px;">
                            <div class="progress-bar" style="width:40%;height:7px"></div>
                        </div>
                    </div>
                     
                </div>
            </div>
            <div style="display: flex;" class="perf">
                <span class="a1">A1</span>
                <div class="iota">
                    <span style="font-size: 90%;font-weight: 500;">Pratical Physics</span> <br>
                    <div style="display: flex;align-items: center;justify-content: space-between;">
                        <span class="evaluation">High Intermidiate</span>
                        <div class="progress" style="height:7px;width: 80px;">
                            <div class="progress-bar" style="width:40%;height:7px"></div>
                        </div>
                    </div>
                     
                </div>
            </div>
            <div style="display: flex;" class="perf">
                <span class="a1">A1</span>
                <div class="iota">
                    <span style="font-size: 90%;font-weight: 500;">Pratical Physics</span> <br>
                    <div style="display: flex;align-items: center;justify-content: space-between;">
                        <span class="evaluation">High Intermidiate</span>
                        <div class="progress" style="height:7px;width: 80px;">
                            <div class="progress-bar" style="width:40%;height:7px"></div>
                        </div>
                    </div>
                     
                </div>
            </div>
            <div style="display: flex;" class="perf">
                <span class="a1">A1</span>
                <div class="iota">
                    <span style="font-size: 90%;font-weight: 500;">Pratical Physics</span> <br>
                    <div style="display: flex;align-items: center;justify-content: space-between;">
                        <span class="evaluation">High Intermidiate</span>
                        <div class="progress" style="height:7px;width: 80px;">
                            <div class="progress-bar" style="width:40%;height:7px"></div>
                        </div>
                    </div>
                     
                </div>
            </div>
        </div>
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
    var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>
</html>
