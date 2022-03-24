<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location:login.php');
}
else if (!isset($_POST['client_search'])){
  header('Location:resources.php');
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
    <link href="assets/css/resources.css" rel="stylesheet">
</head>

<body>
<style>
</style>
    <i class="icon-bars"></i>
    <nav>
        <br>
        <br>
        <br>
        <ul>
            <li><a href="dashboard.php"><i class="icon-dashboard"></i><span> Dashboard</span> </a></li>
            <li><a href="course.php"> <i class="icon-globe"></i> <span> Courses </span> </a></li>
            <li class="active"><a href="resources.php"> <i class="icon-hdd-o"></i> <span> Resources </span> </a></li>
            <li ><a href="challenge.php"> <i class="icon-child"></i> <span> Challenge </span> </a></li>
            <li><a href="Q&A.php"> <i class="icon-square"> </i><span> Q and A </span> </a></li>
            <li><a href="settings.php"> <i class="icon-gears"> </i> <span> Settings </span> </a></li>
        </ul>
        <ul class="logout">
            <li><a href="backend_data/logout.php"> <i class="icon-power-off"> </i> <span> Log out </span> </a></li>
        </ul>
        <br>
    </nav>
    <main>
        <div class="search-container">
          <i class="icon-search" style=""></i>
          <input type="text" name="client_search" placeholder="Search" style="">
          <div class="upload">
            <span data-toggle="modal" data-target="#myModal"> <i class="icon-upload"></i> Upload </span>
            <span> <i class="icon-user"></i> </span>
          </div>
        </div>
        
        <div class="bread-crum">
            <a href="dashboard.php">Home</a> / 
            <a href="resources.php">Resources</a> / Resources Search Query : <b><?php echo strtoupper($_POST['client_search'])  ?> </b>
        </div>
       
        <div class="question-container" style="display: flex;
    flex-wrap: wrap;
    justify-content: space-around;background-color:white;">
          
        <?php
include 'backend_data/init.php';
  $searchquery = $_POST['client_search'];
  $sql = "SELECT * FROM `materials` WHERE title LIKE '%$searchquery%' OR author LIKE '%$searchquery%' OR categories LIKE '%$searchquery%' OR type LIKE '%$searchquery%' OR contents LIKE '%$searchquery%' OR intro LIKE '%$searchquery%'";
  $resulte = $conn->query($sql);
                if ($resulte->num_rows > 0) {
                // output data of each row
                $GLOBALS['count'] = 0;
                while($row = $resulte->fetch_assoc()) {
                  $count = $count + 1;
                  echo '
                    
                    <div class="list_anchor_container" style="display:inline-block;margin-bottom:15px;">
                    <a href="resources_id.php?id='.$row["id"].'" class="controls">
                        <div class="div-image">
                            <img src="assets/images/textbook/'.$row["image"].'" width="100%" height="100%">
                        </div>
                        <div>
                          <b>'.mb_strimwidth($row["title"], 0, 35, "...").'</b> <br>
                          <small>'.$row["author"].'</small> <br>
                          <code>'.$row["pages"].' pages </code> 
                        </div>
                    </a>
                </div>
                    
                  ';
                }
              }
                else {
                  echo  '<div style="display:flex;width:100%;justify-content:center;background-color:white;width:200px;height:150px;align-items:center;border-radius:20px;margin:auto;box-shadow:0 10px 10px rgb(0 0 0 / 20%);">
                  <button type="button" style="    background-color: #883a8e;
                  border: 1px solid;font-size: 13px;font-weight: 600;font-family:Open Sans SemiBold;" class="btn btn-primary">0 Results</button>';
                }

?>
      </div>
    </main>

</body>
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
</script>
</html>
