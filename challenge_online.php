<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location:login.php');
}
else if(!isset($_POST['data'])){
    header('Location:challenge.php');
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
<style>
.list-group li{
    height:50px !important;
    cursor: pointer;
}.list-group li span:first-child{
    display:none !important;
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
    <main style="margin-right: 5px;">
        <div class="intro-div">
            <b>Dashboard</b>
            <span id="time" class="time"></span>
        </div>
        <div class="bread-crum">
            <a href="dashboard.php">Home</a> / 
            <a href="challenge.php">Challenge</a> 
        </div>
        <br/>
        <div style="#">
            <ul class="list-group activeusers">

            </ul>
        </div>
        <form action="challenge_start.php" class="pipo" method="POST">
            <input type="hidden" name="data_type" class="data" value="<?php echo $_POST['data']; ?>"/>
            <input type="hidden" name="name_id" class="name_id"  />
            <input type="hidden" name="name_department" class="departmanet" />

        </form>

    </main>
    <input type='hidden' id='userId' value="<?php echo $_SESSION['user_id'] ?>" />
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
        fetch_user_status();
    setInterval(() => {
      fetch_user_status();
    },1000 * 60 * 30);
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

function fetch_user_status(){
    $.ajax({
      url:"backend_data/fetch_user_status.php",
      method:"POST",
      success:function(data){
          if(data !== ""){
            $('.list-group.activeusers').html(data);
          }
          else{
            $('.list-group.activeusers').html("<b>NO USER IS ONLINE</b>");
          }
        
      }
    })
  }
$('.card form a').click(function(e){
        e.preventDefault();
        $(this).parent().submit();
    });
    $(document).on("click" ,'.list-group-item' ,function(e){
        e.preventDefault();
    $('.name_id').val($(this).attr('name'));
    $('.department').val($(this).attr('department'));
    $('.pipo').submit();

});
</script>
<script>
    var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>
</html>
