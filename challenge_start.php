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
	<title>Challlenge_Page</title>
	<meta content=" Web Developer with a focus on Front-end and Mobile application." name="description">
  	<meta content="Test,Challenge,Education,Page" name="keywords">
  	<!--icons link-->
  	<link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="preload" href="assets/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="assets/fonts/OpenSans-SemiBold.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="assets/fonts/OpenSans-Bold.ttf" as='font' crossorigin='anonymous'>
    <link href="assets/css/dashboard.css" rel="stylesheet">
</head>
<style>
.card{
    box-shadow:0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
    background-color:white;
    height:175px;
    width:300px;
    display:flex;
    border-radius:7px;
    justify-content:center;
    align-items:center;
    position: relative;
    outline-offset: -4px;
    vertical-align: top;
    white-space: normal;
    margin-bottom:30px;
}.card a {
    text-transform: uppercase;
    color: #8b8f8f;
    font-weight: 600;
    font-family: 'Open Sans Regular';
}
.card span{
    display: block;
    text-align: center;
    font-size: 14px;
    font-weight: 500;
    color: #949494;
    font-family: system-ui;
}
.card-style{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
}
@media all and (max-width:720px){
    .card{
        width:200px;
        height:125px;
    }
}
@media all and (max-width:510px){
    .card-style{
    display: grid;
    justify-items: center;
    justify-content:center;
}
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
            <li><a href="course.php"> <i class="icon-globe"></i> <span> Courses </span> </a></li>
            <li ><a href="resources.php"> <i class="icon-hdd-o"></i> <span> Resources </span> </a></li>
            <li class="active"><a href="challenge.php"> <i class="icon-child"></i> <span> Challenge </span> </a></li>
            <li><a href="Q&A.php"> <i class="icon-square"> </i><span> Q and A </span> </a></li>
            <li><a href="settings.php"> <i class="icon-gears"> </i> <span> Settings </span> </a></li>
        </ul>
        <ul class="logout">
            <li><a href="backend_data/logout.php"> <i class="icon-power-off"> </i> <span> Log out </span> </a></li>
        </ul>
        <br>
    </nav>
    <main style="margin-right: 5px;position:relative;">
        <div class="intro-div">
            <b>Dashboard</b>
            <span id="time" class="time"></span>
        </div>
        <div class="bread-crum">
            <a href="dashboard.php">Home</a> / 
            <a href="challenge.php">Challenge</a> 
        </div>
        <br/>
        <div class="card-style">
            <div class="card">
                <form method="GET" action="challenge_id.php">
                    <input type="hidden" name="data" value="courses"/>
                    <span> <?php echo $_SESSION["username"]; ?> </span>
                </form>
            </div>
            <div class="card" style="width:50px;height:50px;">
                <b>VS</b>
            </div>
            <div class="card">
                <form method="POST" action="challenge_online.php">
                    <input type="hidden" name="data" value="random"/>
                    <span> <?php echo $_POST["name_id"]; ?> </span> 
                </form>
                
            </div>
        </div>
        <div style="height: 5px;display: block;background-color: #883a8e;">
        </div>
    <div style="background-color: white;padding: 40px 20px;text-align: center;font-family: 'Open Sans Regular';">
              <span style="font-weight: 600;">Welcome to the module test - where you pratice with your peers for the entire unit.</span>  <br>
              <u><br><b>Instructions</b>  </u>
              <ul>
                <br>
                  <small>1. You will be presented with <b>20 Mutiple Choice Questions (MCQs) to be answered in 20 minutes.</b> <br> </small>
                  <small>2. In the test, Each questions will have 4/5 Options to Choose from. <br> </small>
                  <small>3. Once you submit answers to all questions, you will be given your final test score.<br> </small>
                  <small>4, <b>When your peers accepts the challenge request, your final score will be released to your challenge dashboard.</b> <br> </small>
              </ul>
          </div>
          <br><br>
        <form method="POST" action="challenge_test.php">
            <input type='hidden' name='me' <?php echo 'value="'.$_SESSION["username"].'"' ?> />
            <input type='hidden' name='challengee' <?php echo 'value="'.$_POST["name_id"].'"' ?> />
            <input type='hidden' name='type' <?php echo 'value="'.$_POST["data_type"].'"' ?> />
            <input type='hidden' name='time' id="time1"  />
            <input type='hidden' name='attempts' value="0"  />
            <button style="color: white;position: fixed;left: 0px;background-color: #883a8e;font-size: 15px;font-family: 'Open Sans Bold';width: 100%;padding: 12px;bottom: 0;text-transform: uppercase;">Submit</button>
        </form>
        <input type='hidden' id='userId' value='<?php echo $_SESSION["user_id"]; ?> ' />
    </main>
    
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
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
$('.card form a').click(function(e){
        e.preventDefault();
        $(this).parent().submit();
    });
</script>
<script>
    var d = new Date();
    document.getElementById("time").innerHTML = d.toDateString();
    document.getElementById("time1").value = d;
</script>
</html>
