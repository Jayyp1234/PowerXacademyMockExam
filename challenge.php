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
<style>
.card input, .card button{
    height: 50px;
    border-radius: 20px;
    width: 230px;
    padding-left: 20px;
    background-color: #e5e5eb99;
    font-size: 14px;
    font-weight: 400;
    text-transform: unset;
    margin-bottom:20px;
}
.card button{
    background-color:purple;
    color:white;
    padding-left:0px;
    font-size:14px;
}
.card .form{
    display:none;
    margin:auto;
}
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
        <div style="display: flex;
    flex-wrap: wrap;
    justify-content: space-around;">
            <div class="card">
                <form method="GET" action="challenge_id.php">
                    <input type="hidden" name="data" value="courses"/>
                    <a href="#">By Course Title </a>
                </form>
            </div>
            <div class="card">
                <form method="POST" class="form" action="challenge_online.php">
                    <input type="text" name="data" placeholder="Input a Chapter Name"/>
                    <button> Submit </button>
                </form>
                <a href="#" class="bnn">By Tag name </a>
            </div>
            <div class="card">
                <form method="POST" action="challenge_online.php">
                    <input type="hidden" name="data" value="random"/>
                    <a href="#">Random Problem </a>
                </form>
                
            </div>
        </div>

    </main>
    <input type='hidden' id='userId' value="<?php echo $_SESSION['user_id'] ?>" />
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
    $('.bnn').click(function(){
        $(this).prev('form').css('display', 'contents');
        $(this).hide();
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
</script>
</html>
