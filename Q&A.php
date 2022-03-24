
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
            <a href="Q&A.php">Q&A</a> 
        </div>
        <div style="margin-bottom: 10px !important;width: auto !important;">
          <i class="icon-search" style="position: absolute;margin-top: 14px;margin-left: 5px;color: #883a8e;"></i>
          <input type="text" name="client_search" placeholder="Search questions on Pypid" style="border-radius:15px;width:100%;height: 29px;font-size: 14px;font-weight: 400;padding-left: 27px;">
        </div>
        <br>
        <div style="background-color:white;padding-top:10px;">
          <div class="category-name-wrapper" style="padding-right:10px;padding-left:10px;">
            <h1 class="category-name">All Questions<span class="category-count">( 54 Questions)</span>
            </h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="box-shadow:inset 0 1px 0 0 rgb(255 255 255 / 40%);"> Ask Question </button>
          </div>
          <hr>
          <?php
              include 'backend_data/init.php';
              
              if(isset($_GET['tag'])){
                $val = $_GET['tag'];
                $newdata = "SELECT * FROM `q&a` WHERE question_tags LIKE '%".$val."%' ORDER BY `question_id` ASC";
                $resulte = $conn->query($newdata);
                if ($resulte->num_rows > 0) {
                // output data of each row
                while($row = $resulte->fetch_assoc()) {
                  echo '
                    <div class="question-container">
                <div class="question-frame">
                  <span class="small-data">'.$row["question_views"].' views</span><span class="small-data">'.$row["question_comment_count"].' answers</span>
                  <a href="question_id.php?title='.$row["question_title"].'"> <h6 class="question-title">'.$row["question_title"].'</h6> </a>
                  <span class="question-body">'.$row["question_content"].'</span>
                </div>
                <div class="question-content">
                  <div class="question-tag">
                    <span class="tag" style="display:none;">'.$row["question_tags"].'</span>
                  </div>
                  <div class="question-info">
                    <img src="assets/images/pngkey.com-linea-punteada-png-4149828.png" width="40px" height="40px" style="border-radius: 3px;border:0.2px solid #b7babd;margin-right: 5px;">
                    <div>
                      <span style="color: #6a737c;font-size: 12px;">'.$row["posted_date"].'</span><br>
                      <span style="color: #569cd2;font-size: 12px;">'.$row["question_author"].'</span>
                    </div>
                  </div>
                </div>
                <hr>
                    </div>
                  ';
                }
              }
                else {
                  echo "0 results";
                }
              }
              else{
                $newdata = "SELECT * FROM `q&a` ORDER BY `question_id` DESC";
                $resulte = $conn->query($newdata);
                if ($resulte->num_rows > 0) {
                // output data of each row
                while($row = $resulte->fetch_assoc()) {
                  echo '
                    <div class="question-container">
                <div class="question-frame">
                  <span class="small-data">'.$row["question_views"].' views</span><span class="small-data">'.$row["question_comment_count"].' answers</span>
                  <a href="question_id.php?title='.$row["question_title"].'"> <h6 class="question-title">'.$row["question_title"].'</h6> </a>
                  <span class="question-body">'.$row["question_content"].'</span>
                </div>
                <div class="question-content">
                  <div class="question-tag">
                    <span class="tag" style="display:none;">'.$row["question_tags"].'</span>
                  </div>
                  <div class="question-info">
                    <img src="assets/images/pngkey.com-linea-punteada-png-4149828.png" width="40px" height="40px" style="border-radius: 3px;border:0.2px solid #b7babd;margin-right: 5px;">
                    <div>
                      <span style="color: #6a737c;font-size: 12px;">'.$row["posted_date"].'</span><br>
                      <span style="color: #569cd2;font-size: 12px;">'.$row["question_author"].'</span>
                    </div>
                  </div>
                </div>
                <hr>
                    </div>
                  ';
                }
              }
                else {
                  echo "0 results";
                }
              }
                
              
              
            ?>
            <div id="dynamic-posts2">
                
            </div>

            <div id="ajax-loader" style="display: flex;justify-content: center;">
                <div class="spinner-border text-dark"></div>
            </div>
        </div>
        
          <!-- The Modal -->
          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Ask Question</h4>
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
                        <div class="form-group">
                            <label for="categories">Select Categories:</label>
                            <select class="form-control" id="categories" name="categories">
                              <option value="GEG124">Engineering Applied Maths II</option>
                              <option value="GEG126">Engineering Algebra II</option>
                              <option value="GEG128">Engineering Calculus II</option>
                              <option value="CHM121">Introductory Chemistry II</option>
                              <option value="PHS121">Introductory Physics II</option>
                              <option value="PHS122">Introductory Physics III</option>
                              <option value="PHS123">Introductory Pratical Physics</option>
                            </select>
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
                      </form>
                    </div>
              </div>
            </div>
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
