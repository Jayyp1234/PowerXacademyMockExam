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
    <link rel="preload" href="assets/fonts/OpenSans-Bold.ttf" as='font' crossorigin='anonymous'>
    
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <link href="assets/css/resources.css" rel="stylesheet">
</head>
<body>
  <style type="text/css">
    @media all and (max-width: 1180px){
      .list-anchor li:last-child{
        display: none;
      }
    }
    @media all and (max-width: 1015px){
    .list_anchor_container {
    width: 7.4375em;
}.list_anchor_container .div-image {
    width: 139px;
    height: 178px;
}
}@media all and (max-width: 970px){
  .list-anchor li:nth-child(4){
    display: none;
  }
}
.icon-search{
  cursor: pointer;
}
@media all and (max-width: 500px){
  .list_anchor_container .div-image {
    width: 90px;
    height: 118px;
}.list_anchor_container {
    width: 5.375em;
}.controls div b {
    font-size: 12px;
    }small{
      font-size: 70%;
    }code {
    font-size: 75.5%;
  }
}
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
          <form style="display:flex;align-items:center;" class="searcher" method="POST" action="resourse_search.php">
          <i class="icon-search" style=""></i>
          <input type="text" name="client_search" placeholder="Search" style="">
          </form>
          <div class="upload">
            <span data-toggle="modal" data-target="#myModal"> <i class="icon-upload"></i> Upload </span>
            <span class="bodyel"> <i class="icon-user"></i> </span>
            <span class="bodyel"> <i class="icon-bell"></i> </span>
          </div>
        </div>
        
        <div class="bread-crum">
            <a href="dashboard.php">Home</a> / 
            <a href="resources.php">Resources</a> 
        </div>
        <div class="jumbotron" style="">
            <div>
                <br>
                   <h4>Whatever you’re into, we’ve got something for you. </h4>
                   <span>Having problem finding the right materials to read?</span> <br>
                   <span>We are here to help.</span>
                   <br>
            </div>
            <div class="jj">
                <img src="assets/images/undraw_Add_files_re_v09g.png" style="width: 140px;">
            </div>
            
        </div>
        <h3 class="carousel_title">Documents Recommended For You</h3> <br>
        <div id="demo" class="carousel slide" data-ride="carousel">
          <!-- The slideshow -->
          <div class="carousel-inner">
            <?php
                include 'backend_data/init.php';

                $newdata = "SELECT * FROM `materials` WHERE type = 'textbook' OR type = 'mcqs'  order by RAND()";
                $resulte = $conn->query($newdata);
                if ($resulte->num_rows > 0) {
                // output data of each row
                  $count = 0;
                  $string = '<div class="carousel-item active">
                                <ul class="list-anchor" style="display: flex;justify-content: space-around;background-color: white;">';
                    $activestring = '';
                    $tempstring = '<div class="carousel-item">
                                <ul class="list-anchor" style="display: flex;justify-content: space-around;background-color: white;">';
                  while($row = $resulte->fetch_assoc()) {
                    $count++;
                    if ($count <= 6){
                      $string .= '<li>
                      <div class="list_anchor_container">
                          <a href="resources_id.php?id='.$row["id"].'" class="controls">
                              <div class="div-image">
                                  <img src="assets/images/textbook/'.$row["image"].'" width="100%" height="100%">
                              </div>
                              <div>
                                <b>'.mb_strimwidth($row["title"], 0, 30, "...").'</b> <br>
                                <small>'.$row["author"].'</small> <br>
                                <code>'.$row["pages"].' pages </code> 
                              </div>
                          </a>
                      </div>
                    </li>';
                    }
                    else if ($count % 7 == 0){
                      $string.='</ul> </div>'.$tempstring;
                    }
                    else if ($count > 7){
                      $string.= '<li>
                      <div class="list_anchor_container">
                          <a href="resources_id.php?id='.$row["id"].'" class="controls">
                              <div class="div-image">
                                  <img src="assets/images/textbook/'.$row["image"].'" width="100%" height="100%">
                              </div>
                              <div>
                                <b>'.mb_strimwidth($row["title"], 0, 30, "...").'</b> <br>
                                <small>'.mb_strimwidth($row["author"], 0, 20, "...").'</small> <br>
                                <code>'.$row["pages"].' pages </code>  
                              </div>
                          </a>
                      </div>
                    </li>';
                    }
                    
                  }
                  echo $string.'</ul> </div>';
                }
            ?>
          </div>
          <style type="text/css">
            .card-1 {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);width: 30px;height: 30px;
  background-color: white;
    border-radius: 50%;
    opacity: 1;
    margin-top: 86px;
}

.card-1:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
          </style>
          <!-- Left and right controls -->
          <a class="carousel-control-prev card-1" href="#demo" data-slide="prev">
            <i class="icon-chevron-left" style="color: black;"></i>
          </a>
          <a class="carousel-control-next card-1" href="#demo" data-slide="next">
            <i class="icon-chevron-right" style="color: black;"></i>
          </a>
        
        </div>
        <br>
        <h3 class="carousel_title">Similar To Introductory Physics II</h3> <br>
        <div id="demo1" class="carousel slide" data-ride="carousel">
          <!-- The slideshow -->
          <div class="carousel-inner">
            <?php
                include 'backend_data/init.php';

                $newdata = "SELECT * FROM `materials` WHERE categories LIKE '%Introductory Physics II'  order by RAND()";
                $resulte = $conn->query($newdata);
                if ($resulte->num_rows > 0) {
                // output data of each row
                  $count = 0;
                  $string = '<div class="carousel-item active">
                                <ul class="list-anchor" style="display: flex;justify-content: space-around;background-color: white;">';
                    $activestring = '';
                    $tempstring = '<div class="carousel-item">
                                <ul class="list-anchor" style="display: flex;justify-content: space-around;background-color: white;">';
                  while($row = $resulte->fetch_assoc()) {
                    $count++;
                    if ($count <= 6){
                      $string .= '<li>
                      <div class="list_anchor_container">
                          <a href="resources_id.php?id='.$row["id"].'" class="controls">
                              <div class="div-image">
                                  <img src="assets/images/textbook/'.$row["image"].'" width="100%" height="100%">
                              </div>
                              <div>
                                <b>'.mb_strimwidth($row["title"], 0, 30, "...").'</b> <br>
                                <small>'.$row["author"].'</small> <br>
                                <code>'.$row["pages"].' pages </code> 
                              </div>
                          </a>
                      </div>
                    </li>';
                    }
                    else if ($count % 7 == 0){
                      $string.='</ul> </div>'.$tempstring;
                    }
                    else if ($count > 7){
                      $string.= '<li>
                      <div class="list_anchor_container">
                          <a href="resources_id.php?id='.$row["id"].'" class="controls">
                              <div class="div-image">
                                  <img src="assets/images/textbook/'.$row["image"].'" width="100%" height="100%">
                              </div>
                              <div>
                                <b>'.mb_strimwidth($row["title"], 0, 30, "...").'</b> <br>
                                <small>'.mb_strimwidth($row["author"], 0, 20, "...").'</small> <br>
                                <code>'.$row["pages"].' pages </code>  
                              </div>
                          </a>
                      </div>
                    </li>';
                    }
                    
                  }
                  echo $string.'</ul> </div>';
                }
            ?>
          </div>
          <!-- Left and right controls -->
          <a class="carousel-control-prev card-1" href="#demo1" data-slide="prev">
            <i class="icon-chevron-left" style="color: black;"></i>
          </a>
          <a class="carousel-control-next card-1" href="#demo1" data-slide="next">
            <i class="icon-chevron-right" style="color: black;"></i>
          </a>
        
        </div>
        <br>
        <h3 class="carousel_title">Similar To Introductory Physics III</h3> <br>
        <div id="demo2" class="carousel slide" data-ride="carousel">
          <!-- The slideshow -->
          <div class="carousel-inner">
            <?php
                include 'backend_data/init.php';

                $newdata = "SELECT * FROM `materials` WHERE categories LIKE '%Introductory Physics III%'  order by RAND()";
                $resulte = $conn->query($newdata);
                if ($resulte->num_rows > 0) {
                // output data of each row
                  $count = 0;
                  $string = '<div class="carousel-item active">
                                <ul class="list-anchor" style="display: flex;justify-content: space-around;background-color: white;">';
                    $activestring = '';
                    $tempstring = '<div class="carousel-item">
                                <ul class="list-anchor" style="display: flex;justify-content: space-around;background-color: white;">';
                  while($row = $resulte->fetch_assoc()) {
                    $count++;
                    if ($count <= 6){
                      $string .= '<li>
                      <div class="list_anchor_container">
                          <a href="resources_id.php?id='.$row["id"].'" class="controls">
                              <div class="div-image">
                                  <img src="assets/images/textbook/'.$row["image"].'" width="100%" height="100%">
                              </div>
                              <div>
                                <b>'.mb_strimwidth($row["title"], 0, 30, "...").'</b> <br>
                                <small>'.$row["author"].'</small> <br>
                                <code>'.$row["pages"].' pages </code> 
                              </div>
                          </a>
                      </div>
                    </li>';
                    }
                    else if ($count % 7 == 0){
                      $string.='</ul> </div>'.$tempstring;
                    }
                    else if ($count > 7){
                      $string.= '<li>
                      <div class="list_anchor_container">
                          <a href="resources_id.php?id='.$row["id"].'" class="controls">
                              <div class="div-image">
                                  <img src="assets/images/textbook/'.$row["image"].'" width="100%" height="100%">
                              </div>
                              <div>
                                <b>'.mb_strimwidth($row["title"], 0, 30, "...").'</b> <br>
                                <small>'.mb_strimwidth($row["author"], 0, 20, "...").'</small> <br>
                                <code>'.$row["pages"].' pages </code>  
                              </div>
                          </a>
                      </div>
                    </li>';
                    }
                    
                  }
                  echo $string.'</ul> </div>';
                }
            ?>
          </div>
          <!-- Left and right controls -->
          <a class="carousel-control-prev card-1" href="#demo2" data-slide="prev">
            <i class="icon-chevron-left" style="color: black;"></i>
          </a>
          <a class="carousel-control-next card-1" href="#demo2" data-slide="next">
            <i class="icon-chevron-right" style="color: black;"></i>
          </a>
        
        </div>
    
    </main>
    <!-- The Modal -->
          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Publish to the world</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="backend_data/q&aval.php" enctype="multipart/form-data" method="POST" style="line-height: 1.1;">
                        <div class="form-group">
                          <label for="title">Title:</label>
                          <span>
                            Be specific and imagine you’re asking a question to another person
                          </span>
                          <input type="title" class="form-control" id="title" placeholder="What your Question? Be Specific." name="title">
                        </div>
                        <div class="form-group">
                          <label for="body">Upload Image: (Optional)</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="body">Body:</label>
                          <span>Include all the information someone would need to answer your question</span>
                          <textarea class="form-control" rows="5" name="body" id="body" style="border-radius: 1rem;"></textarea>
                        </div>
                          <input type="hidden" name="time" id="time" value="">
                          <div class="form-group">
                            <label for="tags">Tags:</label>
                            <span>
                              Add up to 5 tags to describe what your question is about
                            </span>
                            <input type="text" class="form-control" id="tags" placeholder="Make Use of Commas to Seperate them." name="tags">
                          </div>
                        <button type="submit" name="file" class="btn btn-primary">Submit</button>
                        <span>
                            Supported file types: pdf, txt, doc, ppt, xls, docx, and more
                        </span>
                      </form>
                    </div>
              </div>
            </div>
          </div>
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
  $('.icon-search').click(function(){
    $('.searcher').submit();
  })
  
 
	
</script>
<script>
    var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>
</html>
