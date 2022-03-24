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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" >
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
}main{
    margin-right: 5px;
}.list-item-group{
    padding: .5rem 1rem;
}.d-flex {
    display: flex!important;
    flex-direction: column-reverse;
}.well{
    font-size: smaller;
    padding: 1px 12px !important;
    border-radius: 15px;
    height: 30px;
    white-space: nowrap;
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
        <?php
            $userid = $_SESSION['user_id'];
            $username = $_SESSION['username'];
            if(isset($_POST['course_id'])){
                 $courseid = $_POST['course_id'];
                 $chapter = $_POST['course_title'];
                 $chapter_id = $_POST['chapter_id']; 
            }
            else{
                header('Location:dashboard.php');
            }

          ?>
          <?php
                include 'backend_data/init.php';
                $datamhen = "SELECT * FROM `course_activity` INNER JOIN courses ON courses.id = course_activity.course_id WHERE course_id = $courseid AND user_id = $userid ";
                $result = $conn->query($datamhen);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $course_title = $row['title'];
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
            ?>
        <div class="intro-div">
            <b>Dashboard</b>
            <span id="time" class="time"></span>
        </div>
        <div class="bread-crum">
            <a href="dashboard.php">Home</a> / 
            <a href="course.php">Courses</a> / <?php echo '<a href="course_id.php?id='. $courseid .'">'.$course_title.'</a>' ?>/ <?php echo $chapter; ?>
        </div>
        <br>
        
        <div class="list-group" style="margin-bottom: 25px;">
          <a href="#" class="list-group-item list-group-item-action active"         aria-current="true" style="padding: .5rem 0.75rem;background-color: #883a8e;border-color: #883a8e;">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1" style="margin-bottom: 0rem!important;font-size: 14px;font-weight: 500;font-family: system-ui;">Modules: <?php echo $chapter; ?></h5>
            </div>
          </a>
          
          
          <div style="background-color: white;padding: 40px 20px;text-align: center;font-family: 'Open Sans Regular';">
              <span style="font-weight: 600;">Welcome to the module test - where you get to test your skills for the entire unit.</span>  <br>
              <u><br><b>Instructions</b>  </u>
              <ul>
                <br>
                  <small>1. You will be presented with <b>20 Mutiple Choice Questions (MCQs) to be answered in 20 minutes.</b> <br> </small>
                  <small>2. In the test, Each questions will have 4/5 Options to Choose from. <br> </small>
                  <small>3. Once you submit answers to all questions, you will be given your final test score.<br> </small>
                  <small>4, <b>Pass mark is 70% .</b> <br> </small>
              </ul>
          </div>
          <a href="#" class="list-group-item list-group-item-action active" aria-current="true" style="padding: .5rem 0.75rem;background-color: #883a8e;border-color: #883a8e;">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1" style="margin-bottom: 0rem!important;font-size: 14px;font-weight: 500;font-family: system-ui;display: contents;">
                <form method="POST" action="test.php">
                  <?php echo '<input type="hidden" name="chapter" value= "'.$chapter.'" >'; ?>
                  <?php echo '<input type="hidden" name="course_id" value= "'.$courseid.'" >'; ?>
                  <?php echo '<input type="hidden" name="chapter_id" value= "'.$chapter_id.'" >'; ?>
                  <button class="btn btn-primary" style="    background-color: white !important;color: black !important;border-color: none !important;">Start Quiz</button>
                </form>
                  
              </h5>
            </div>
          </a>
        </div>
        
    </main>
       
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
        updata_user_activity();
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
            console.log(data)
        }
    })

}
</script>
<script>
    var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>
</html>
