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
                echo '<li class="active"><a href="admin.php"><i class="icon-dashboard"></i><span> Admin Dashboard</span> </a></li>
                      <li><a href="create_exam.php"><i class="icon-question"></i><span> Create Exam</span> </a></li>
                      <li><a href="exams.php"><i class="icon-book"></i><span> Exams</span> </a></li>
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
            <b>Admin Dashboard</b>
            <span id="time" class="time"></span>
        </div>
        <br>
            
        
    </main>
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
