<?php
session_start();
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
.modal-body .btn-primary {
    color: #fff;
    background-color: #89398d;
    border-color: #89398d;
    width: 100%;
    border-radius: 15px;
    font-size: 13px;
    font-weight: 500;
    }
.custom-file-label::after {
  color: #ffffff;
  background-color: #89398d;
  font-weight: 500;
}
.btn-primary, 
.btn-primary:hover, 
.btn-primary:focus {
    color: #fff;
    background-color: #883a8e;
    border-color: #883a8e;
    font-size: 13px;
    font-weight: 500;
}
.modal-header {
    background-color: #89398d;
    color: white;
}
.close {
    color: #ffffff;
    text-shadow: 0 1px 0 #fff;
    opacity: 1;
}.category-name-wrapper{
  display:flex;
  color: #5a5a59;
  justify-content:space-between;
  
}.category-name{
  font-size:23px ;
}.category-count{
  color: #999;
    margin-left: 5px;
    font-size: 13px;
    vertical-align: 2px;
}
hr{
  border-top: 1px solid rgb(165 165 162 / 48%);
}
.question-container{
  min-height:70px;
  line-height:1;
  padding-bottom:10px;
}
.question-container h6{
  line-height:1;
  margin-bottom: 0.1rem !important;
  margin-top: 3px;
}
.question-body, 
.question-tag span{
  font-size: 13.5px;
  font-weight:400;
  color:#5a5a59;
}
.question-frame, 
.question-content{
  padding-left:10px;
  padding-right:10px;
}.question-tag{
  display: inline-block;
  margin-top:10px;
}.question-tag button{
    font-size: 11.5px;
    border-radius: 10px;
    border: 0.5px solid #883a8e;
    color: #883a8e;
    padding: 1px 6px;
    margin-right:4px;
    margin-bottom: 5px;
    display: inline-block;
}
.question-content{
  display: flex;
  justify-content: space-between;
}
.question-tag button:hover, 
.question-tag button:active, 
.question-tag button:focus{
  color: white !important;
  background-color: #883a8e !important;
  border: 0.5px solid #883a8e !important;
}
.small-data{
  color: #6a737c;
  font-size: 11.5px;
  margin-right: 10px;
  margin-bottom: 6px;
}.question-info{
  display: flex;
}
</style>
<body>
   <i class="icon-bars"></i>
    <nav>
        <br>
        <br>
        <ul>
            <li><a href="dashboard.php"><i class="icon-dashboard"></i><span> Dashboard</span> </a></li>
            <li><a href="course.php"> <i class="icon-globe"></i> <span> Courses </span> </a></li>
            <li><a href="resources.php"> <i class="icon-hdd-o"></i> <span> Resources </span> </a></li>
            <li><a href="challenge.php"> <i class="icon-child"></i> <span> Challenge </span> </a></li>
            <li class="active"><a href="Q&A.php"> <i class="icon-square"> </i><span> Q and A </span> </a></li>
            <li><a href="settings.php"> <i class="icon-gears"> </i> <span> Settings </span> </a></li>
        </ul>
        <ul class="logout">
            <li><a href="backend_data/logout.php"> <i class="icon-power-off"> </i> <span> Log out </span> </a></li>
        </ul>
        <br>
    </nav>
    <main>
        <div class="intro-div">
            <b>Q&A</b>
            <span id="time" class="time"></span>
        </div>
        <div class="bread-crum">
            <a href="dashboard.php">Home</a> / 
            <a href="Q&A.php">Q&A</a> <?php echo  '/<a href="Q&A.php"> '.$_GET["title"].'</a>'; ?>
        </div>
        <div style="margin-bottom: 10px !important;width: auto !important;">
          <i class="icon-search" style="position: absolute;margin-top: 14px;margin-left: 5px;color: #883a8e;"></i>
          <input type="text" name="client_search" placeholder="Search questions on Pypid" style="border-radius:15px;width:100%;height: 29px;font-size: 14px;font-weight: 400;padding-left: 27px;">
        </div>
        <br>
        <div style="background-color:white;padding-top:10px;">
          
        </div>
        
         
          
        </div>
    </main>
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#time').val(returndate());
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
  function nicomp(data){
    var tags = data.split(',');
    var result = '';
    for (i=0; i<tags.length ; i++){
      result += '<a href="Q&A.php?tag='+tags[i]+'"><button type="button" class="btn btn-outline-primary">'+tags[i]+'</button></a>';
    }
    return result;
  }
  function returndate(){
    var d = new Date();
    var time = d.toString().slice(0,10);
    return time;
  }
    $(window).on('load', function() {
      if ($('#preloader').length) {
          $('#preloader').delay(100).fadeOut('slow', function() {
              $(this).remove();
          });
      }
      $(".header-container").css("transform" , "scale(1.0)");
    });
    $('.question-tag span').each(function(){
      $(this).parent().append().html(''+nicomp(this.innerHTML)+'');
    });
/*    var page_num = 1;
    load_page(page_num, false);
    $(window).scroll(function() {
      if ($(window).scrollTop() + $(window).height() > $(document).height() - 10) {
          page_num++;
          load_page(page_num, false)
      }
    });

function load_page(page_num, loading) {
    if (loading == false) {
        loading = true;
        $.ajax({
            url: 'backend_data/post.php',
            type: "post",
            data: {
                page_num: page_num
            },
            beforeSend: function() {
                $('#ajax-loader').show();
                return;
            }
        }, 3000).done(function(data) {
            $('#ajax-loader').hide();
            loading = false;
            $("#dynamic-posts2").before(data);
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
            $('#ajax-loader').hide();
        });

    }

}*/

</script>
<script>
  var d = new Date();
  document.getElementById("time").innerHTML = d.toDateString();
</script>
<script>
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</html>
