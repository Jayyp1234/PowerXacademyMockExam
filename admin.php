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
   form input, form textarea{
     width:100%;
     display: block;
     border:1px solid #d4d4d4;
     margin-bottom:7px;
     border-radius:7px;
   }
</style>
<body>
    <i class="icon-bars"></i>
    <nav>
        <br>
        <br>
        <div class="profiler" style="text-align: center;margin-top: 10px;line-height: 1.2;font-size: 14.5;font-weight: 600;">
            <img src="assets/images/pngkey.com-linea-punteada-png-4149828.png" style="width: 100px;height: 100px;display: block;margin: auto;">
            <span class='name'><?php echo $_SESSION['username']; ?></span><br>
            <span class="department"><?php echo $_SESSION['department']; ?></span><br>
            <span class="level">100l</span>
        </div>
        <br>
        <ul>
            <?php 
              if ($_SESSION['user_id'] == 1 || $_SESSION['user_id'] == 2){
                echo '<li class="active"><a href="admin.php"><i class="icon-dashboard"></i><span> Admin Dashboard</span> </a></li>';
              }
            ?>
            <li ><a href="dashboard.php"><i class="icon-dashboard"></i><span> Dashboard</span> </a></li>
            <li><a href="course.php"> <i class="icon-globe"></i> <span> Courses </span> </a></li>
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
    <main style="margin-right:5px;">
        <div class="intro-div">
            <b>Dashboard</b>
            <span id="time" class="time"></span>
        </div>
        <br>
        <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Online Users
    <span class="badge badge-primary badge-pill">12</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Recent Users
    <span class="badge badge-primary badge-pill">50</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Reports
    <span class="badge badge-primary badge-pill">50</span>
  </li>
</ul>
<div class="row">
     <div class="col-md-6">
     <div id="accordion">

<div class="card"  style="margin-top:20px;">
  <div class="card-header" style="padding: .5rem 0.75rem;">
    <a class="card-link" data-toggle="collapse" href="#collapseOne" style="font-weight: 700;font-family: 'Open Sans Regular';">
      Online Users
    </a>
  </div>
  <div id="collapseOne" class="collapse show" data-parent="#accordion">
    <div class="card-body" style="padding:0;">
    <ul class="list-group activeusers">
    
    </ul>
    </div>
  </div>
  <div class="card-header" style="padding: .5rem 0.75rem;">
    <a class="card-link" data-toggle="collapse" href="#collapseTwo" style="font-weight: 700;font-family: 'Open Sans Regular';">
      Reported Problems
    </a>
  </div>
  <div id="collapseTwo" class="collapse show" data-parent="#accordion">
    <div class="card-body" style="padding:0;">
    <ul class="list-group reports">
    <label style="font-size:13px;text-align:center;font-family:'Open Sans Regular';display:block;margin:auto;font-weight:500;">Question Id</label>
    <ul class="pagination pagination-sm" style="flex-wrap:wrap;">
        <?php 
          include 'backend_data/init.php';
          $sql = "SELECT * FROM `questions` WHERE no_reported >= 1";
          $resulte = $conn->query($sql);
          if ($resulte->num_rows > 0) {
            while($row = $resulte->fetch_assoc()) {
              echo '<li class="page-item" data-toggle="modal" data-target="#myModal"><a class="page-link" href="#">'.$row["id"].'</a></li>';
            }
          }
          else{
            echo '';
          }
        ?>
    </ul>
    </ul>
    </div>
  </div>
</div>
</div>
     </div>

     <div class="col-md-6">
     <div id="accordion">

<div class="card"  style="margin-top:20px;">
  <div class="card-header" style="padding: .5rem 0.75rem;">
    <a class="card-link" data-toggle="collapse" href="#collapseThree" style="font-weight: 700;font-family: 'Open Sans Regular';">
      Intro Chemistry Questions
    </a>
  </div>
  <div id="collapseThree" class="collapse" data-parent="#accordion">
    <div class="card-body" style="padding:0;">
    <ul class="pagination pagination-sm" style="flex-wrap:wrap;">
        <?php 
          include 'backend_data/init.php';
          $sql = "SELECT * FROM `questions` WHERE question_topic = 'Introductory Chemistry II'";
          $resulte = $conn->query($sql);
          if ($resulte->num_rows > 0) {
            while($row = $resulte->fetch_assoc()) {
              echo '<li class="page-item" data-toggle="modal" data-target="#myModal"><a class="page-link" href="#">'.$row["id"].'</a></li>';
            }
          }
          else{
            echo '';
          }
        ?>
    </ul>
    </div>
  </div>
  <div class="card-header" style="padding: .5rem 0.75rem;">
    <a class="card-link" data-toggle="collapse" href="#collapseFour" style="font-weight: 700;font-family: 'Open Sans Regular';">
      Engineering Calculus II
    </a>
  </div>
  <div id="collapseFour" class="collapse " data-parent="#accordion">
    <div class="card-body" style="padding:0;">
    <ul class="list-group reports">
    <label style="font-size:13px;text-align:center;font-family:'Open Sans Regular';display:block;margin:auto;font-weight:500;">Question Id</label>
    <ul class="pagination pagination-sm" style="flex-wrap:wrap;">
        <?php 
          include 'backend_data/init.php';
          $sql = "SELECT * FROM `questions` WHERE question_topic = 'Engineering Calculus II'";
          $resulte = $conn->query($sql);
          if ($resulte->num_rows > 0) {
            while($row = $resulte->fetch_assoc()) {
              echo '<li class="page-item" data-toggle="modal" data-target="#myModal"><a class="page-link" href="#">'.$row["id"].'</a></li>';
            }
          }
          else{
            echo '';
          }
        ?>
    </ul>
    </ul>
    </div>
  </div>
  <div class="card-header" style="padding: .5rem 0.75rem;">
    <a class="card-link" data-toggle="collapse" href="#collapseFive" style="font-weight: 700;font-family: 'Open Sans Regular';">
      Engineering Algebra II
    </a>
  </div>
  <div id="collapseFive" class="collapse " data-parent="#accordion">
    <div class="card-body" style="padding:0;">
    <ul class="list-group reports">
    <label style="font-size:13px;text-align:center;font-family:'Open Sans Regular';display:block;margin:auto;font-weight:500;">Question Id</label>
    <ul class="pagination pagination-sm" style="flex-wrap:wrap;">
        <?php 
          include 'backend_data/init.php';
          $sql = "SELECT * FROM `questions` WHERE question_topic = 'Engineering Algebra II'";
          $resulte = $conn->query($sql);
          if ($resulte->num_rows > 0) {
            while($row = $resulte->fetch_assoc()) {
              echo '<li class="page-item" data-toggle="modal" data-target="#myModal"><a class="page-link" href="#">'.$row["id"].'</a></li>';
            }
          }
          else{
            echo '';
          }
        ?>
    </ul>
    </ul>
    </div>
  </div>
  <div class="card-header" style="padding: .5rem 0.75rem;">
    <a class="card-link" data-toggle="collapse" href="#collapseSix" style="font-weight: 700;font-family: 'Open Sans Regular';">
    Introduction Physics III
    </a>
  </div>
  <div id="collapseSix" class="collapse " data-parent="#accordion">
    <div class="card-body" style="padding:0;">
    <ul class="list-group reports">
    <label style="font-size:13px;text-align:center;font-family:'Open Sans Regular';display:block;margin:auto;font-weight:500;">Question Id</label>
    <ul class="pagination pagination-sm" style="flex-wrap:wrap;">
        <?php 
          include 'backend_data/init.php';
          $sql = "SELECT * FROM `questions` WHERE question_topic = 'Introduction Physics III'";
          $resulte = $conn->query($sql);
          if ($resulte->num_rows > 0) {
            while($row = $resulte->fetch_assoc()) {
              echo '<li class="page-item" data-toggle="modal" data-target="#myModal"><a class="page-link" href="#">'.$row["id"].'</a></li>';
            }
          }
          else{
            echo '';
          }
        ?>
    </ul>
    </ul>
    </div>
  </div>
  <div class="card-header" style="padding: .5rem 0.75rem;">
    <a class="card-link" data-toggle="collapse" href="#collapseSeven" style="font-weight: 700;font-family: 'Open Sans Regular';">
    Engineering Applied Mathematics II
    </a>
  </div>
  <div id="collapseSeven" class="collapse " data-parent="#accordion">
    <div class="card-body" style="padding:0;">
    <ul class="list-group reports">
    <label style="font-size:13px;text-align:center;font-family:'Open Sans Regular';display:block;margin:auto;font-weight:500;">Question Id</label>
    <ul class="pagination pagination-sm" style="flex-wrap:wrap;">
        <?php 
          include 'backend_data/init.php';
          $sql = "SELECT * FROM `questions` WHERE question_topic = 'Engineering Applied Mathematics II'";
          $resulte = $conn->query($sql);
          if ($resulte->num_rows > 0) {
            while($row = $resulte->fetch_assoc()) {
              echo '<li class="page-item" data-toggle="modal" data-target="#myModal"><a class="page-link" href="#">'.$row["id"].'</a></li>';
            }
          }
          else{
            echo '';
          }
        ?>
    </ul>
    </ul>
    </div>
  </div>
  <div class="card-header" style="padding: .5rem 0.75rem;">
    <a class="card-link" data-toggle="collapse" href="#collapseEight" style="font-weight: 700;font-family: 'Open Sans Regular';">
    Introductory Physics II
    </a>
  </div>
  <div id="collapseEight" class="collapse " data-parent="#accordion">
    <div class="card-body" style="padding:0;">
    <ul class="list-group reports">
    <label style="font-size:13px;text-align:center;font-family:'Open Sans Regular';display:block;margin:auto;font-weight:500;">Question Id</label>
    <ul class="pagination pagination-sm" style="flex-wrap:wrap;">
        <?php 
          include 'backend_data/init.php';
          $sql = "SELECT * FROM `questions` WHERE question_topic = 'Introductory Physics II'";
          $resulte = $conn->query($sql);
          if ($resulte->num_rows > 0) {
            while($row = $resulte->fetch_assoc()) {
              echo '<li class="page-item" data-toggle="modal" data-target="#myModal"><a class="page-link" href="#">'.$row["id"].'</a></li>';
            }
          }
          else{
            echo '';
          }
        ?>
    </ul>
    </ul>
    </div>
  </div>
</div>
</div>

     </div>
</div>
        
            
        
    </main>
    <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="preview">
          
       </div>
       <div class="form-box">

       </div>
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn btn-primary preview" >Preview</button>
        <button type="button" class="btn btn-success submit" >Update</button>
      </div>

    </div>
  </div>
</div>
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    fetch_user_status();
  //  fetch_user_activies();
    setInterval(() => {
      fetch_user_status();
   //   fetch_user_activities();
    },1000 * 60 * 30);
	});
  $('.submit').click(function(){
    $('.updata').submit();
  })
  function fetch_user_status(){
    $.ajax({
      url:"backend_data/fetch_user_status.php",
      method:"POST",
      success:function(data){
        $('.list-group.activeusers').html(data);
      }
    })
  }
  $('.pagination-sm .page-item').click(function(){
    $.ajax({
      url:"backend_data/getques.php",
      data:"id="+$(this).text(),
      method:"POST",
      success:function(data){
        $('.modal-body').html(data);
      }
    });
  })
$('.preview').click(function(){
  $('.data_question').html($('.input_question').val());
  $('.data_optiona').html($('.input_optiona').val());
  $('.data_optionb').html($('.input_optionb').val());
  $('.data_optionc').html($('.input_optionc').val());
  $('.data_optiond').html($('.input_optiond').val());
  $('.data_answer').html($('.input_answer').val());
  $('.data_solution').html($('.input_solution').val());
})
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
