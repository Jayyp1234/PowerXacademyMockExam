<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location:login.php');
}
else if(!isset($_GET["data"])){
    header('Location:challenge.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Challenge</title>
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
.table td{
    vertical-align: middle;
    color:grey;
    font-size:14px;font-family: 'Open Sans Regular';
}
.table tr{
    cursor: pointer;
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
            <a href="challenge.php">Challenge</a> /
            <a <?php echo 'href="challenge_id.php?data='.$_GET["data"].'"' ?>. > Challenge Type:<?php echo $_GET['data']; ?> </a>
        </div>
        <br/>
        <div>
        <table class="table table-hover">
            <tbody>
            <?php
              include 'backend_data/init.php';
                $newdata = "SELECT * FROM `courses`";
                $resulte = $conn->query($newdata);
                if ($resulte->num_rows > 0) {
                // output data of each row
                while($row = $resulte->fetch_assoc()) {
                  echo '<tr>
                  <form action="challenge_online.php" method="POST">
                    <input type="hidden" name="data" value="'.$row["title"].'"/>
                  </form>
                  <td><img class="f-img img-fluid mx-auto img-thumbnail rounded-circle" style="width:50px !important;height:50px;" src="assets/images/course/'.$row["image"].'" alt="" /></td>
                  <td>'.$row["title"].'</td>
              </tr> 
                   ';
                }
              }
              ?>
            </tbody>
        </table>
        </div>

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
	$('table tr').click(function(e){
        $(this).children('form').submit();
    });
</script>
<script>
    var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>
</html>
