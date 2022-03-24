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
    <link href="assets/css/resources.css" rel="stylesheet">
</head>
<?php
include 'backend_data/init.php';
   $newdata = "SELECT * FROM `materials` WHERE id = ".$_GET["id"]."";
   $resulte = $conn->query($newdata);
    if ($resulte->num_rows > 0) {
      while($row = $resulte->fetch_assoc()) {
                    $title = $row['title'];
                    $author = $row['author'];
                    $intro = $row['intro'];
                    $categories = $row['categories'];
                    $type = $row['type'];
                    $postedby = $row['posted_by'];
                    $download = $row['download_link'];
                    $image = $row['image'];
                    $year = $row['year'];
                    //$edition = $row['edition'];
                    $pages = $row['pages'];
                    $contents = $row['contents'];
      }
    }

?>
<body>
  <style>
    .table td, .table th {
    padding: 0rem !important;
}.line{
  width: 100%;
  height: 2px;
  background-color: #883a8e;
}.terms{
  width: 100%;padding-top: 15px;padding-bottom: 15px;padding-left: 10px;
}table tr td:first-child{
  color: #888;
    font-size: 10pt;
    display: block;
    width: 80px;
    }table tr td:last-child{
      font-size: 10pt;
    }.col-sm-9 +  .btn-primary {
    color: #fff;
    background-color: #89398d;
    border-color: #89398d;
    width: 100%;
    border-radius: 15px;
    font-size: 13px;
    margin-top: 17px;
    margin-bottom: 17px;
    font-weight: 500;
}.terms a{
  text-decoration: underline;
    font-weight: 450;
    color: #883a8e;
    font-size: 90%;
    display: inline-block;
    margin-right: 6px;
    transition: all 0.3s ease-in-out;
}.terms a:hover{
  color: #56225a;
  font-weight: 500;
}
  @media all and (max-width: 575px){
    .div-image{
      width: 225px;
      display: block;
      margin: auto;
    }
    .table:first-child{
      margin-bottom: 0px;
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
            <span> <i class="icon-user"></i> </span>
          </div>
        </div>
        
        <div class="bread-crum">
            <a href="dashboard.php">Home</a> / 
            <a href="resources.php">Resources</a> / <?php echo $title ?>
        </div>
        <div class="row container">
          <div class="col-sm-3">
            <div class="div-image">
              <?php echo  '<img src="assets/images/textbook/'.$image.'" width="100%" height="100%">' ?>
            </div>
          </div>
          <div class="col-sm-9">
            <h2 style="font-size: 20pt;padding: 5px 0;margin: 0;font-weight: 400;"><?php echo $title ?></h2>
            <i style="text-decoration: underline;font-weight: 450;color: #883a8e;font-size: 90%;"><?php echo '<a href="resources_id.php?author='.$author.'"> '.$author.' </a>'; ?></i> <br>
            <code><?php echo $intro ?></code>
            <br>
            <div class="row">
              <div class="col-sm-6">
                <table class="table" >
                  <tr>
                    <td>Year</td>
                    <td><?php echo $year; ?></td>
                  </tr>
                  <tr>
                    <td>Pages</td>
                    <td><?php echo $pages; ?></td>
                  </tr>
                  <tr>
                    <td>File</td>
                    <td><?php echo 'PDF 30MB'; ?></td>
                  </tr>
                  
                </table>
              </div>
              <div class="col-sm-6">
                <table class="table">
                  <tr>
                    <td>Language</td>
                    <td>English</td>
                  </tr>
                  <tr>
                    <td>Edition</td>
                    <td>12th Edition</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          
          <button type="button" class="btn btn-primary btn-block"> <a href = <?php echo $download; ?> > <i class="icon-download"> </i> Download (Pdf, 30MB) </a></button> 
          
          <b>Most Frequent Terms </b>
          <div class="line"></div>
          <div class="terms">
            <?php echo $contents ?>
          </div>
          <div class="line"></div>
          <br>
          <div class="commemts">
            
          </div>
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
  $('.icon-search').click(function(){
    $('.searcher').submit();
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
  function nicomp(data){
    var tags = data.split(',');
    var result = '';
    for (i=0; i<tags.length ; i++){
      result += '<a href="#">'+tags[i].toLowerCase()+'</a>';
    }
    return result;
  }
  $('.terms').each(function(){
      $(this).html(''+nicomp(this.innerHTML)+'');
    })
	
</script>
<script>
    var d = new Date();
</script>
</html>


























