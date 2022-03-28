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
	  <title>Dashboard</title>
	  <meta content="PowerXacademyMockExam is an award winning unified learning platform that includes a learning management system (LMS), it helps you to manage your school mock exams in a better way." name="description">
  	<meta content="mock,exam,online,dashboard,admin" name="keywords">
    <link rel="icon" href="img/logo.jpeg" type="image/jpeg">
  	<!--icons link-->
  	<link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="preload" href="/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="/fonts/OpenSans-SemiBold.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="/fonts/OpenSans-Bold.ttf" as='font' crossorigin='anonymous'>
    <link href="assets/css/dashboard.css" rel="stylesheet">
</head>
<style type="text/css">
   
</style>
<body>
    <i class="icon-bars"></i>
    <nav>
        <br>
        <br>
        <br>
        <ul>
            <?php 
              if ($_SESSION['user_id'] == 1 || $_SESSION['user_id'] == 2){
                echo '<li><a href="admin.php"><i class="icon-dashboard"></i><span> Admin Dashboard</span> </a></li>';
              }
            ?>
            <li class="active"><a href="dashboard.php"><i class="icon-dashboard"></i><span> Dashboard</span> </a></li>
            <li><a href="course.php"> <i class="icon-globe"></i> <span> Courses </span> </a></li>
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
        <br>
        <div class="jumbotron">
            <br>
            <h4>Welcome back, <?php echo $_SESSION['username']; ?>. </h4>
            <span>You've Learnt About 0% of your goals this week</span> <br>
            <span>Keep it up to improve your results</span>
            <br>
        </div>
        <header>My Avalible Exam/Test</header>
        <div class="row">
            <?php
              include 'backend_data/init.php';
              $userid = $_SESSION['user_id'];
                function per($num , $den){
                    $total = (intval($num) - 1) / intval($den) * 100;
                    return strval($total);
                }
                $newdata = "SELECT * FROM `exams` WHERE status = 1";
                $resulte = $conn->query($newdata);
                if ($resulte->num_rows > 0) {
                // output data of each row
                while($row = $resulte->fetch_assoc()) {
                  echo '
                  <div class="col-lg-6 col-md-12 course-data">
                  <div class="courses-container">
                       <div class="course">
                           <div class="course-preview">
                               <h6>Type : Exam </h6>
                               <h2>Biology Test</h2>
                           </div>
                           <div class="course-info">
                               <div style="display:flex;justify-content:space-between;align-items:center;">
                                   <h6 style="display:flex;align-items:center;"><i class="icon-calendar"></i>21th Apr, 10:00pm </h6>
                                   <h6><i class="icon-arrow-right"></i></h6>
                                   <h6 style="display:flex;align-items:center;"><i class="icon-calendar"></i>21th Apr, 02:00pm </h6>
                               </div>
                               <div style="display:flex;justify-content:space-between;align-items:center;">
                                   <h6 style="display:flex;align-items:center;"><i class="icon-clock-o"></i>5 min </h6>
                                   <h6 style="display:flex;align-items:center;"><i class="icon-question-circle"></i>30 questions </h6>
                               </div>
                               <div style="display:flex;justify-content:space-between;align-items:center;">
                                   <h6 style="display:flex;align-items:center;"><i class="icon-users"></i> 50 Enrolled </h6>
                               </div>
                               <br>
                               <a href="course_id.php"> <button class="btn">Start Exam</button></a>
                           </div>
                       </div>
                   </div> 
               </div>
                ';
                }
              }else{
                echo  '
                <div style="display:flex;width:100%;justify-content:center;background-color:white;width:200px;height:150px;align-items:center;border-radius:20px;margin:auto;box-shadow:0 10px 10px rgb(0 0 0 / 20%);">
                <a href="#"><button type="button" style="background-color: #408e3a;
                border: 1px solid;font-size: 13px;font-weight: 600;font-family:Open Sans SemiBold;" class="btn btn-primary">No Exam Available</button></a>';
              }
            ?>
            
        </div>
        <style>
            .icon-calendar, .icon-question-circle, .icon-users,.icon-clock-o{
                margin-right:7px;
            }
        </style>
        
    </main>
    <input type='hidden' id='userId' value="<?php echo $_SESSION['user_id'] ?>" />
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	});
    function nicomp(data){
      var tags = data.split(',');
      return tags[parseInt(tags[0])];
    }
    $('.outline').each(function(){
      $(this).html(''+nicomp(this.innerHTML)+'');
    });

</script>
<script>
    var d = new Date();
    document.getElementById("time").innerHTML = d.toDateString();
</script>
</html>
