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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="preload" href="assets/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="assets/fonts/OpenSans-SemiBold.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="assets/fonts/OpenSans-Bold.ttf" as='font' crossorigin='anonymous'>
    <link href="assets/css/dashboard.css" rel="stylesheet">
</head>
<style type="text/css">
    .course {
            width: 100% !important;
            display: grid;
        }
        .course-preview {
     padding: 0px;}
     .course-preview {
    padding: 0px;
    height: 150px;
    overflow: hidden;
}main{
    margin-right: 5px;
}.list-item-group{
    padding: .5rem 1rem;
}.d-flex {
    display: flex!important;
    flex-direction: column-reverse;
}.well{
    font-size: smaller;
    padding: 1px 12px !important;
    border-radius: 15px;
    height: 30px;
    white-space: nowrap;
}
</style>
<body>
    <?php
    include 'backend_data/init.php';
        $userid = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        $courseid = $_GET['id'];
        if(isset($_GET["id"])){
            function data($userid, $courseid){
                include 'backend_data/init.php';
                $userid = $_SESSION['user_id'];
                $username = $_SESSION['username'];
                $courseid = $_GET['id'];
                $datamhen = "SELECT * FROM `course_activity` INNER JOIN courses ON courses.id = course_activity.course_id WHERE course_id = $courseid AND user_id = $userid ";
                $insertdetails = "INSERT INTO `course_activity`(`id`, `user_id`, `username`, `course_id`, `enroll_status`, `completed`, `scores`) VALUES ('','$userid','$username','$courseid','1' ,1 ,'' )";
                $result = $conn->query($datamhen);
                if ($result->num_rows > 0) {
                    $insertdetails = "SELECT * FROM `course_activity` INNER JOIN courses ON courses.id = course_activity.course_id WHERE course_id = $courseid AND user_id = $userid ";
                    while($row = $result->fetch_assoc()) {
                        $GLOBALS["course_title"] = $row["title"];
                        $GLOBALS['scrore'] = $row["scores"];
                    }
                    return $insertdetails;
                } 
                else {
                    return $insertdetails;
                }
            }
            $result = $conn->query(data($userid, $courseid));
            data($userid, $courseid);
        }
        

    ?>
    <?php 
    $sql = "SELECT * FROM course_activity where user_id = $userid and course_id = $courseid ";
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<span class="newscore" style="display:none;"> '.$row["scores"].'</span>';
          }
        }
        else{
            echo "";
        }

    ?>
    <i class="icon-bars"></i>
    <nav>
        <br>
        <br>
        <br>
        <ul>
            <li><a href="dashboard.php"><i class="icon-dashboard"></i><span> Dashboard</span> </a></li>
            <li class="active"><a href="course.php"> <i class="icon-globe"></i> <span> Courses </span> </a></li>
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
    <main>
        <div class="intro-div">
            <span class="active-module" style="display:none;"> <?php echo $scrore; ?> </span>
            <b>Courses </b>
            <span id="time" class="time"></span>
        </div>
        <div class="bread-crum">
            <a href="dashboard.php">Home</a> / 
            <a href="course.php">Courses</a> / <?php echo '<a href="course_id.php?id='. $_GET['id'] .'">'.$course_title.'</a>' ?>
        </div>
        <br>
        <span class="user-id"> <?php echo $userid; ?> </span>
        <span class="course-id"> <?php echo $courseid; ?> </span>
        <div class="list-group" style="margin-bottom: 25px;">
          <a href="#" class="list-group-item list-group-item-action active" aria-current="true" style="padding: .5rem 0.75rem;background-color: #883a8e;border-color: #883a8e;">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1" style="margin-bottom: 0rem!important;font-size: 14px;font-weight: 500;font-family: system-ui;">Modules</h5>
            </div>
          </a>
          <?php
            $userid = $_SESSION['user_id'];
            $username = $_SESSION['username'];
            $courseid = $_GET['id'];
            $datamhen = "SELECT * FROM `course_activity` INNER JOIN courses ON courses.id = course_activity.course_id WHERE course_id = $courseid AND user_id = $userid ";
                $result = $conn->query($datamhen);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<span class="dang" > '.$row["outline"].' </span>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
            ?>
          
        </div>
        
    </main>
       
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
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
    var ddddd = $('.active-module').html();
    ;
    var ssch = $('.newscore').text().split(",");
    function nicomp(data , len){
      var tags = data.split(',');
        var result = '';
        var count = 0;
        for (i=0; i<tags.length ; i++){
          
          if (count < len){
            result += '<li class="list-group-item list-group-item-action"><div class="d-flex w-100 justify-content-between"><h5 class="mb-1" style="font-size: 17px;font-weight: 600;">'+tags[i]+'</h5><small class="text-muted" style="width: 70px;display: inline-table;">Chapter '+(i+1)+'</small></div><small class="text-muted">'+eval(ssch[i]/2)+'/50 Points.</small><div style="display: flex;flex-flow: row-reverse;"><a href="#"><button type="button" class="btn project-test btn-outline-secondary well"><span style="display:none">'+(i+1)+'</span>Take Test </button></a><form action="test_instructions.php" class="take" method="POST"> <input type="hidden" name="course_id" class="courseid"> <input type="hidden" name="chapter_id" class="chapter_id" /> <input type="hidden" name="course_title" class="course_title"> <a href="#"><button type="button" class="btn btn-outline-secondary well">Module</button></a> </form></div></li>';
          }
          else{
             result += '<li class="list-group-item list-group-item-action" style="background-color: #ededed;pointer-events: none;"><div class="d-flex w-100 justify-content-between"><h5 class="mb-1" style="font-size: 17px;font-weight: 600;">'+tags[i]+'</h5><small class="text-muted" style="width: 70px;display: inline-table;">Chapter '+(i+1)+'</small></div><small class="text-muted">0/50 Points.</small><div style="display: flex;flex-flow: row-reverse;"><a href="#"><button type="button" class="btn project-test btn-outline-secondary well"><span style="display:none">'+(i+1)+'</span>Take Test </button></a><form action="test_instructions.php" class="take" method="POST"> <input type="hidden" name="course_id" class="courseid"> <input type="hidden" name="chapter_id" class="chapter_id" /> <input type="hidden" name="course_title" class="course_title"> <a href="#"><button type="button" class="btn btn-outline-secondary well">Module</button></a> </form></div></li>';
          }
          count++;
        }
        console.log(tags);
        return result;
    }
    $('.dang').each(function(){
      $(this).parent().append(''+nicomp(this.innerHTML , ddddd.split(',').length)+'');
      $(this).hide();
    });
	$('.project-test').parent().click(function(e){
      e.preventDefault();
      var userid = $('.user-id').html();
      $('.courseid').val($('.course-id').html());
      $('.course_title').val($(this).parent().siblings(".d-flex").children().html());
      $('.chapter_id').val($(this).children().children().html());
      
      $('.take').submit();
    });
</script>
<script>
    var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>
</html>
