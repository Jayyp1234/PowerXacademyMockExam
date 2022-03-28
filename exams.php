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
	<title>Admin Dashboard</title>
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
    <link href="assets/css/form.css" rel="stylesheet">
</head>
<style>
    @media (max-width: 1200px){
        .course-info {
            height: 140px;
        }
    }
    .icon-calendar, .icon-question-circle, .icon-users,.icon-clock-o{
        margin-right:7px;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff !important;
    background-color: #408e3a !important;
}
</style>
<?php
  include 'backend_data/init.php';
  $name = $email = $username = $password = $department = '';
  $nameErr = $emailErr = $errormessage = '';
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $emailcheck = "DELETE FROM `exams` WHERE id = '$id'";
            $resulte = $conn->query($emailcheck);
            if($conn->query($resulte)){
                header('Location:exams.php');
            }
            else{
                echo "Record Not Succesful";
            }
            $conn->close();
        }  
    }
?>
<body>
    <i class="icon-bars"></i>
    <nav>
        <br>
        <br>

        <br>
        <ul>
            <?php 
              if ($_SESSION['user_id'] == 1 || $_SESSION['user_id'] == 2){
                echo '<li><a href="admin.php"><i class="icon-dashboard"></i><span> Admin Dashboard</span> </a></li>
                      <li><a href="create_exam.php"><i class="icon-question"></i><span> Create Exam</span> </a></li>
                      <li class="active"><a href="exams.php"><i class="icon-book"></i><span> Exams</span> </a></li>
                ';
              }
            ?>
            <li><a href="dashboard.php"><i class="icon-dashboard"></i><span> Dashboard</span> </a></li>
            <li><a href="backend_data/logout.php"> <i class="icon-power-off"> </i> <span> Log out </span> </a></li>
        </ul>
        <br>
    </nav>
    <main style="margin-right:5px;">
        <div class="intro-div">
            <b>Exams</b>
            <span id="time" class="time"></span>
        </div>
        <br>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Drafts</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Published</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <?php
                include 'backend_data/init.php';
                $newdata = "SELECT * FROM `exams` WHERE published = 'no' ";
                $resulte = $conn->query($newdata);
                if ($resulte->num_rows > 0) {
                // output data of each row
                while($row = $resulte->fetch_assoc()) {
                  echo '
                  <div class="col-lg-6 col-md-12 course-data">
                  <div class="courses-container">
                       <div class="course">
                           <div class="course-preview">
                               <h6>Type : '.$row["type"].' </h6>
                               <h2>'.$row["title"].'</h2>
                           </div>
                           <div class="course-info">
                               <div style="display:flex;justify-content:space-between;align-items:center;">
                                   <h6 style="display:flex;align-items:center;"><i class="icon-calendar"></i>'.$row["start_time"].'</h6>
                                   <h6><i class="icon-arrow-right"></i></h6>
                                   <h6 style="display:flex;align-items:center;"><i class="icon-calendar"></i>'.$row["close_time"].'</h6>
                               </div>
                               <div style="display:flex;justify-content:space-between;align-items:center;">
                                   <h6 style="display:flex;align-items:center;"><i class="icon-clock-o"></i>'.$row["duration"].' min </h6>
                                   <h6 style="display:flex;align-items:center;"><i class="icon-question-circle"></i>'.$row["length"].' questions </h6>
                               </div>
                               <div style="display:flex;justify-content:space-between;align-items:center;">
                                   <h6 style="display:flex;align-items:center;"><i class="icon-users"></i> 50 Enrolled </h6>
                               </div>
                               <br><br>
                               <a href="exam_question.php?id='.$row["id"].'"> <button class="btn" style="right:150px;">Upload Questions</button></a>
                               <a href="course_id.php?id='.$row["id"].'"> <button class="btn">Delete Exam</button></a>
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
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
        </div>
        
    </main>
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

<script>
    var d = new Date();
    document.getElementById("time").innerHTML = d.toDateString();
</script>
</html>
