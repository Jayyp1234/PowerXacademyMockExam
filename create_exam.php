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
                      <li class="active"><a href="create_exam.php"><i class="icon-question"></i><span> Create Exam</span> </a></li>
                      <li><a href="exams.php"><i class="icon-book"></i><span> Exams</span> </a></li>
                ';
              }
            ?>
            <li><a href="dashboard.php"><i class="icon-dashboard"></i><span> Dashboard</span> </a></li>
            <li><a href="backend_data/logout.php"> <i class="icon-power-off"> </i> <span> Log out </span> </a></li>
        </ul>
        <br>
    </nav>
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
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty(test_input($_POST['title'])) && !empty(test_input($_POST['start'])) && !empty(test_input($_POST['finish'])) && !empty(test_input($_POST['type']))){
      $name = test_input($_POST['title']);
      $start = test_input($_POST['start']);
      $finish = test_input($_POST['finish']);
      $no = test_input($_POST['no']);
      $type = test_input($_POST['type']);
      $duration = test_input($_POST['duration']);
      $emailcheck = "INSERT INTO `exams`( `title`, `start_time`, `close_time`, `duration`, `status`, `length`, `view_score`, `type`) 
      VALUES
       ('$name','$start','$finish','$duration','0','$no','yes','$type')";
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
    <main style="margin-right:5px;">
        <div class="intro-div">
            <b>Create Exam</b>
            <span id="time" class="time"></span>
        </div>
        <br>
        <div class="row container">
            <form method="POST" class="container-fluid" style="background-color:white;border-radius:20px;margin-left:20px;">
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" id="exampleInputEmail1" placeholder="Title">
                </div>
                <div class="mb-3">
                    <label>Start Time</label>
                    <input name="start" type="datetime-local" id="exampleInputEmail1" >
                </div>
                <div class="mb-3">
                    <label>Finish Time</label>
                    <input name="finish" type="datetime-local" id="exampleInputEmail1" >
                </div>
                <div class="mb-3">
                    <label>Questions No</label>
                    <input name="no" type="number" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label>Duration</label>
                    <input name="duration" type="number" id="exampleInputEmail1" placeholder="In Minutes">
                </div>
                <div class="mb-3">
                    <label>Type</label>
                    <select name="type">
                        <option value="exam">Exam</option>
                        <option value="test">Test</option>
                        <option value="quiz">Short Quiz</option>
                    </select>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
        
    </main>
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<script>
    var d = new Date();
    document.getElementById("time").innerHTML = d.toDateString();
</script>
</html>
