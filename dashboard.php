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
   
</style>
<body>
    <i class="icon-bars"></i>
    <nav>
        <br>
        <br>
        <br>
        <ul>
            <?php 
              if ($_SESSION['user_id'] == 1 || $_SESSION['user_id'] == 2){
                echo '<li><a href="admin.php"><i class="icon-dashboard"></i><span> Admin Dashboard</span> </a></li>';
              }
            ?>
            <li class="active"><a href="dashboard.php"><i class="icon-dashboard"></i><span> Dashboard</span> </a></li>
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
    <main>
        <div class="intro-div">
            <b>Dashboard</b>
            <span id="time" class="time"></span>
        </div>
        <br>
        <div class="jumbotron">
            <br>
            <h4>Welcome back, <?php echo $_SESSION['username']; ?>. </h4>
            <span>You've Learnt About 0% of your goals this week</span> <br>
            <span>Keep it up to improve your results</span>
            <br>
        </div>
        <!--
        <div>
            <header>Performance</header>
            <div style="background-color: white;padding: 5px;border-radius:5px;">
            <div style="display: flex;" class="perf">
                <span class="a1">A1</span>
                <div class="iota">
                    <span style="font-size: 90%;font-weight: 500;">Pratical Physics</span> <br>
                    <div style="display: flex;align-items: center;justify-content: space-between;">
                        <span class="evaluation">High Intermidiate</span>
                        <div class="progress" style="height:7px;width: 80px;">
                            <div class="progress-bar" style="width:40%;height:7px"></div>
                        </div>
                    </div>
                     
                </div>
            </div>
            <div style="display: flex;" class="perf">
                <span class="a1">A1</span>
                <div class="iota">
                    <span style="font-size: 90%;font-weight: 500;">Pratical Physics</span> <br>
                    <div style="display: flex;align-items: center;justify-content: space-between;">
                        <span class="evaluation">High Intermidiate</span>
                        <div class="progress" style="height:7px;width: 80px;">
                            <div class="progress-bar" style="width:40%;height:7px"></div>
                        </div>
                    </div>
                     
                </div>
            </div>
            <div style="display: flex;" class="perf">
                <span class="a1">A1</span>
                <div class="iota">
                    <span style="font-size: 90%;font-weight: 500;">Pratical Physics</span> <br>
                    <div style="display: flex;align-items: center;justify-content: space-between;">
                        <span class="evaluation">High Intermidiate</span>
                        <div class="progress" style="height:7px;width: 80px;">
                            <div class="progress-bar" style="width:40%;height:7px"></div>
                        </div>
                    </div>
                     
                </div>
            </div>
            <div style="display: flex;" class="perf">
                <span class="a1">A1</span>
                <div class="iota">
                    <span style="font-size: 90%;font-weight: 500;">Pratical Physics</span> <br>
                    <div style="display: flex;align-items: center;justify-content: space-between;">
                        <span class="evaluation">High Intermidiate</span>
                        <div class="progress" style="height:7px;width: 80px;">
                            <div class="progress-bar" style="width:40%;height:7px"></div>
                        </div>
                    </div>
                     
                </div>
            </div>
            </div>
        </div>-->
        <header>My Courses</header>

        <div class="row">
            <?php
              include 'backend_data/init.php';
              $userid = $_SESSION['user_id'];
                function per($num , $den){
                    $total = (intval($num) - 1) / intval($den) * 100;
                    return strval($total);
                }
                function enroll($userid, $courseid){
                    include 'backend_data/init.php';
                    $newdata = "SELECT * FROM `course_activity` WHERE course_id= $courseid AND user_id = $userid";
                    $resulte = $conn->query($newdata);
                    $string = '';
                        if ($resulte->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $string = '<a href="course_id.php?id='.$courseid.'"<button class="btn">Continue</button></a>';
                            }
                        }
                        else {
                            $string = '<a href="course_id.php?id='.$courseid.'"<button class="btn">Enroll</button></a>';
                        }
                    return $string;
                }
                $newdata = "SELECT * FROM `course_activity` INNER JOIN courses ON courses.id = course_activity.course_id WHERE user_id = $userid";
                $resulte = $conn->query($newdata);
                if ($resulte->num_rows > 0) {
                // output data of each row
                while($row = $resulte->fetch_assoc()) {
                  echo '
                    <div class="col-lg-6 col-md-12 course-data">
               <div class="courses-container">
                    <div class="course">
                        <div class="course-preview">
                            <h6>Course</h6>
                            <h2>'.$row["title"].'</h2>
                            <a href="#">View all chapters <i class="fas fa-chevron-right"></i></a>
                        </div>
                        <div class="course-info">
                            <div class="progress-container">
                                <div class="progress" style="height: 5px;">
                                  <div class="progress-bar" role="progressbar" style="width:'. per($row["completed"] , $row["chapters"]).'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="progress-text">
                                    '.strval(intval($row["completed"]) - 1).'/'.$row["chapters"].' Challenges
                                </span>
                            </div>
                            <h6>Chapter '.$row["completed"].'</h6>
                            <h2 class="outline"> '.$row["completed"].', '.$row["outline"].'</h2>
                            <a href="course_id.php?id='.$row["course_id"].'"<button class="btn">Continue</button></a>
                        </div>
                    </div>
                </div> 
            </div>
                ';
                }
              }else{
                echo  '
                <div style="display:flex;width:100%;justify-content:center;background-color:white;width:200px;height:150px;align-items:center;border-radius:20px;margin:auto;box-shadow:0 10px 10px rgb(0 0 0 / 20%);">
                <a href="course.php"><button type="button" style="    background-color: #883a8e;
                border: 1px solid;font-size: 13px;font-weight: 600;font-family:Open Sans SemiBold;" class="btn btn-primary">Add New Courses</button></a>';
              }
            ?>
            
        </div>
        <div class="details-page" style="overflow-y: scroll;">
            <div class="logout2">
                <a href="backend_data/logout.php"><button type="button" class="btn btn-primary">Log out</button></a>
            </div>
            <div style="text-align: center;margin-top: 30px;line-height: 1.2;font-size: 14.5;font-weight: 600;">
                <img src="assets/images/pngkey.com-linea-punteada-png-4149828.png" style="width: 100px;height: 100px;display: block;margin: auto;">
                <span class='name'><?php echo $_SESSION['username']; ?></span><br>
                <span class="department"><?php echo $_SESSION['department']; ?></span><br>
                <span class="level">100l</span>
            </div>
            <br>
            <header>Challenges</header>

            <div>
                <?php
                    include 'backend_data/init.php';

                    function checkChall($data){
                        include 'backend_data/init.php';
                        if ($_SESSION['username'] == $data){
                            return true;
                        }
                        else{
                            return false;
                        }
                    }
                    function checkName($data, $id){
                        include 'backend_data/init.php';
                        $string;
                        if($data == true){
                            $newdata = "SELECT * FROM `challenge` WHERE id='".$id."' ";
                            $resulte = $conn->query($newdata);
                            if ($resulte->num_rows > 0) {
                                while($row = $resulte->fetch_assoc()) {
                                    $string = $row['challengee'];
                                }
                            }
                        }
                        else{
                            $string = $data;
                        }
                        return $string;
                    }
                    function checkCount($data, $id){
                        include 'backend_data/init.php';
                        if($data == true){
                            $string ="";
                            $newdata = "SELECT * FROM `challenge` WHERE id='".$id."' ";
                            $resulte = $conn->query($newdata);
                            if ($resulte->num_rows > 0) {
                                while($row = $resulte->fetch_assoc()) {
                                    $string = $row['challenger_score'].':'.$row['challengee_score'];
                                }
                            }
                        }
                        else{
                            $string ="";
                            $newdata = "SELECT * FROM `challenge` WHERE id='".$id."'";
                            $resulte = $conn->query($newdata);
                            if ($resulte->num_rows > 0) {
                                while($row = $resulte->fetch_assoc()) {
                                    $string = $row['challengee_score'].':'.$row['challenger_score'];
                                }
                            }
                        }
                        return $string;
                    };
                    
                    function checkStatus($data, $id,$stat){
                        include 'backend_data/init.php';
                        if($data == true){
                            $string ="";
                            $newdata = "SELECT * FROM `challenge` WHERE id='".$id."' ";
                            $resulte = $conn->query($newdata);
                            if ($resulte->num_rows > 0) {
                                while($row = $resulte->fetch_assoc()) {
                                    $string = '';
                                }
                            }
                        }
                        else{
                            $string ="";
                            $newdata = "SELECT * FROM `challenge` WHERE id='".$id."'";
                            $resulte = $conn->query($newdata);
                            if ($resulte->num_rows > 0) {
                                while($row = $resulte->fetch_assoc()) {
                                    $string = '<span class="evaluation" style="color: #fffcfc;background-color: grey;padding: 3px 7px;    font-size: 10px;font-weight: 400;text-transform: uppercase;">Pending</span>';
                                }
                            }
                        }
                        return $string;

                    }
                    $newdata = "SELECT * FROM `challenge` WHERE challenger ='".$_SESSION['username']."' or challengee='".$_SESSION['username']."' ORDER BY id DESC limit 6 ";
                        $resulte = $conn->query($newdata);
                        if ($resulte->num_rows > 0) {
                            while($row = $resulte->fetch_assoc()) {
                        echo '
                            <div style="display: flex;border-bottom: 1px solid #d8d3d3;justify-content: space-between;align-items: center;" class="perf">
                <div style="display: grid;height: 40px;">
                    <span style="font-size: 11px;color: grey;white-space: nowrap;margin-right: 7px;">'.checkName(checkChall($row["challenger"]),$row["id"] ).'</span>
                    <small style="font-size: 8px;color: black;"> '.mb_strimwidth($row["time"], 0, 21).' </small>
                </div>
                '.checkStatus(checkChall($row["challenger"]), $row["id"],$row["status"]).'
                <span style="font-weight: 600;color: #747474;font-size: 14px;">'.checkCount(checkChall($row["challenger"]), $row["id"]).'</span>
                </div>

                        ';
                    }
                }
                ?>
                
           
            

            </div>
            

           
        </div>
    </main>
    <input type='hidden' id='userId' value="<?php echo $_SESSION['user_id'] ?>" />
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
    function nicomp(data){
      var tags = data.split(',');
      return tags[parseInt(tags[0])];
    }
    $('.outline').each(function(){
      $(this).html(''+nicomp(this.innerHTML)+'');
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
    document.getElementById("time").innerHTML = d.toDateString();
</script>
</html>
