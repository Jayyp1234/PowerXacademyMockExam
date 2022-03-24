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
<style type="text/css">
    .course {
            width: 100% !important;
            display: grid;
        }
        .course-preview {
     padding: 0px;}
     .course-preview {
    padding: 0px;
    height: 150px;
    overflow: hidden;
}
</style>
<body>
    <i class="icon-bars"></i>
    <nav>
        <br>
        <br>
        <br>
        <ul>
            <li><a href="dashboard.php"><i class="icon-dashboard"></i><span> Dashboard</span> </a></li>
            <li class="active"><a href="course.php"> <i class="icon-globe"></i> <span> Courses </span> </a></li>
            <li><a href="resources.php"> <i class="icon-hdd-o"></i> <span> Resources </span> </a></li>
            <li><a href="challenge.php"> <i class="icon-child"></i> <span> Challenge </span> </a></li>
            <li><a href="Q&A.php"> <i class="icon-square"> </i><span> Q and A </span> </a></li>
            <li><a href="settings.php"> <i class="icon-gears"> </i> <span> Settings </span> </a></li>
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
            <a href="course.php">Courses</a> 
        </div>
        <br>
        <div class="row">
        <?php
              include 'backend_data/init.php';
              $userid = $_SESSION['user_id'];
                function enroll($userid, $courseid){
                    include 'backend_data/init.php';
                    $newdata = "SELECT * FROM `course_activity` WHERE course_id= $courseid AND user_id = $userid";
                    $resulte = $conn->query($newdata);
                    $string = '';
                        if ($resulte->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $string = '<a href="course_id.php?id='.$courseid.'"<button class="btn">Continue</button></a>';
                            }
                        }
                        else {
                            $string = '<a href="course_id.php?id='.$courseid.'"<button class="btn">Enroll</button></a>';
                        }
                    return $string;
                }
                $newdata = "SELECT * FROM `courses`";
                $resulte = $conn->query($newdata);
                if ($resulte->num_rows > 0) {
                // output data of each row
                while($row = $resulte->fetch_assoc()) {
                  echo '
                    <div class="col-lg-6 col-md-12 course-data">
                <div class="courses-container">
                    <div class="course">
                        <div class="course-preview" style="display: block;margin: auto;background-color: white;">
                            <img src="assets/images/course/'.$row["image"].'" height="120%">
                        </div>
                        <div class="course-info" style="background-color: #d8d0ec;">
                            <h2>'.$row["title"].'</h2>
                            <h6>'.$row["chapters"].' Chapters</h6>
                            '.enroll($userid, $row["id"]).'
                            
                        </div>
                    </div>
                </div>
                </div>
                  ';
                }
              }
              ?>
         
            
            </div>

           
        </div>
    </main>
    <input type='hidden' id='userId' value='<?php echo $_SESSION['userid'] ?>' />
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
        setInterval(() => {
            updata_user_activity();
        }, 5000);
	});

    function updata_user_activity(){
    const userId = $('#userId').val();
    $.ajax({
        url:"backend_data/update_user_activity.php",
        method:"POST",
        data:{userId},
        success:function(data){
            console.log(data);
        }
    })

}
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
