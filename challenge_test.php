<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location:login.php');
};
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
}.questions li {
    list-style: initial;
    list-style-position: inside;
    list-style-type: unset;
}.questions span {
    font-weight: 500;
    font-family: 'Open Sans SemiBold';
    font-size: 95%;
    display: block;
    line-height: 18px;
}.questions{
    padding-left: 25px;

}
.toast.show {
    display: block;
    opacity: 1;
    position: fixed;
    top: 0;
    width: 100%;
}
.toast .text-primary {
    color: #883a8e !important;
}
.questions img{
    height: 100%;
    width: auto;
}
.options li {
    display: flex;
    margin-right: 25px;
    height: 55px;
    cursor: pointer;
    border-radius: 7px;
    margin-bottom: 15px;
    border: 1px solid #d4d4d4;
    align-items: center;
    color: color: #7b7b7b;;
}.options li:hover{
    background-color: #f3f3f3;
}.options span {
    font-weight: 400;
    font-family: 'Open Sans Regular';
    font-size: 90%;
    display: block;
    line-height: 16px;
}
.options li b {
    display: flex;
    height: 100%;
    color: white;
    align-items: center;
    padding-left: 20px;
    padding-right: 20px;
    border-top-left-radius: 7px;
    border-bottom-left-radius: 7px;
    background-color: #883a8e;
    margin-right: 10px;
    font-size: 90%;
}.options li.active{
        border: 1.7px solid #989798;
    background-color: #e9e9e9;
    color: #483f3f !important;
}.questions > li{
    margin-bottom: 30px;
}
@media all and (max-width: 450px){
    .questions img{
        width: 300px;
        height: auto;
    }
}
.php-data{
    display: none !important;

}
.remarks ul li{
    font-size: 12px;
    font-weight: 700;
    font-family: system-ui;
    color: #545050;
}
.remarks ul li span{
    display: inline-block;
    width: 170px;
    font-size: 12px;
    font-weight: 600;
    font-family: system-ui;
    color: #545050;
}.remarks button{
    padding: 7px 15px;border-radius: 20px;background-color: #102a66;color: white;font-family: 'Open Sans Regular';
}.remarks .percent{
    position: absolute;top: 50%;left: 50%;transform: translate(-50% , -50%);font-family: 'Open Sans Regular';
}.remarks .toast {
    
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
            <li><a href="resources.php"> <i class="icon-hdd-o"></i> <span> Resources </span> </a></li>
            <li class="active"><a href="challenge.php"> <i class="icon-child"></i> <span> Challenge </span> </a></li>
            <li><a href="Q&A.php"> <i class="icon-square"> </i><span> Q and A </span> </a></li>
            <li><a href="settings.php"> <i class="icon-gears"> </i> <span> Settings </span> </a></li>
        </ul>
        <ul class="logout">
            <li><a href="backend_data/logout.php"> <i class="icon-power-off"> </i> <span> Log out </span> </a></li>
        </ul>
        <br>
    </nav>
    <main>

        <?php
            include 'backend_data/init.php';
            
            function generateRandomString($length = 25) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
            $myRandomString = generateRandomString(6);
            $userid = $_SESSION['user_id'];
            if(isset($_POST['challengee'])){
                $d=strtotime("tomorrow");
                $Challenger = $_SESSION['username'];
                $Challengee = $_POST['challengee'];
                $Type = $_POST['type'];
                $time = $_POST['time'];
                $newtime = mb_strimwidth($time,0,24,"");
                $sql = "INSERT INTO `challenge`(`id`, `challenger`, `challengee`, `challengeType`, `status`, `challenger_score`, `challengee_score`, `time`, `unique_key`) VALUES ('','".$Challenger."','".$Challengee."','".$Type."','Pending','','','".$newtime."','".$myRandomString."')";
                $QUERY = mysqli_query($conn,$sql);   
                if ($QUERY) {
                    echo '';
                }
                else{
                 echo 'Error';
                }  
            }
            else{
                header('Location:dashboard.php');
            }

          ?>
        <div class="intro-div">
            <b>Dashboard</b>
            <span id="time" class="time"></span>
        </div>
        <div class="bread-crum">
            <?php
                echo $myRandomString;
            ?>
        </div>
        <br>
        <h4 style="position: fixed;width: 80px;background-color: #883a8e;color: white;bottom: -10px;right: 0;font-size: 15px;justify-content: center;display: flex;padding: 10px;font-weight: 600;font-family: 'Open Sans Regular';">
    <span class="timer"></span>
</h4>
        <div class="list-group" style="margin-bottom: 25px;">
          <a href="#" class="list-group-item list-group-item-action active" aria-current="true" style="padding: .5rem 0.75rem;background-color: #883a8e;border-color: #883a8e;">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1" style="margin-bottom: 0rem!important;font-size: 14px;font-weight: 500;font-family: system-ui;">Test</h5> <h4><span class="timer"></span></h4>
            </div>
          </a>
          <div class="remarks" style="display: flex;justify-content:center;">
          <div class="toast" style="opacity: 1;display:none;">
            <div class="toast-header">Results</div>
            <div class="toast-body"> 
                <div id="circle" style="display: flex;justify-content: center;margin-bottom: 20px;position: relative;"> 
                    <span class="percent" > <h1 style="font-size: 2rem;" class="scored"> </h1></span> 
                </div> 
                <ul> 
                    <li class="scorre"><span>Score:</span> </li> 
                    <li class="time-taken"><span>Time Taken:</span> </li> 
                    <li class="skippped"><span>Unanswered questions (no):</span></li> 
                    <li class="reemarks"><span>Remarks:</span></li> 
                    <li style="display: flex;justify-content: center;margin: 10px;">
                    <button class="show-data">Show reviews</button> 
                    </li> 
                </ul> 
            </div> 
          </div>
          </div>
          <div style="background-color: white;" class="reviews">
            <ol class="questions">
                <?php
                    include 'backend_data/init.php';
                    $answers = "";
                    $datamhen = "SELECT * FROM `questions` WHERE question_type LIKE '".trim($Type)."%' or question_topic LIKE '%".trim($Type)."%' ORDER BY RAND() LIMIT 20";
                    $result = $conn->query($datamhen);

                    function checkimage($image){
                        $allowedExt = ['img','jpeg','jpg','png'];
                        $data= '';
                        if(!empty($image)){
                            $imgSplit = explode('.',$image);
                        $imgExt = end($imgSplit);
                        if(in_array($imgExt,$allowedExt)){
                         $data = ' <div class="image-question" style="height: 80px;display: flex;justify-content: center;">
                            <img src="assets/images/integration/'.$image.'" >
                        </div>';
                        }
                        else {
                            $data = '';
                        }
                    
                        }
                       
                        
                        return $data;
                    }
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $answers .= $row['answer'].",";
                            echo '
                                <li>
                       '.checkimage($row["question_image"]).'
                       <span>'.$row["question"].'</span>
                       <hr>
                       <ul class="options" style="padding-left: 0px;">
                            <input type="hidden" name="question_id" value="'.$row["id"].'">
                            <input type="hidden" name="answer" class="solution">
                           <li>
                               <b>A</b> <span> '.$row["option_A"].' </span>
                           </li>
                           <li>
                               <b>B</b> <span> '.$row["option_B"].' </span>
                           </li>
                           <li>
                               <b>C</b> <span> '.$row["option_C"].' </span>
                           </li>
                           <li>
                               <b>D</b> <span> '.$row["option_D"].' </span>
                           </li>
                       </ul>
                       <span style="    float: right;
                       margin-right: 20px;
                       padding: 5px 10px;
                       border: 1px solid darkgrey;
                       border-radius: 20px;
                       font-size: small;
                       font-family:Open Sans Regular;
                       font-weight: 600;
                       cursor: pointer;" id="'.$row["id"].'" class="report">Report</span>
                       <div class="data">
                       </div>
                </li>
                            ';
                        }
                    } else {
                        echo "0 results".$chapter;
                    }
                    $conn->close();
                    
                ?>
                <?php

                    echo '<span class="php-data">'.$answers.'</span>';
                ?>
            </ol>
            <button class="btn btn-primary submit"> Submit</button>
          </div>
          
        </div>
        <div class="toast" data-autohide="false">
    <div class="toast-header">
      <strong class="mr-auto text-primary">Are you sure?</strong>
      <small class="text-muted">< 1 mins ago</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
    </div>
    <div class="toast-body">
    </div>
  </div>
    </main>
       
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/circle-progress.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        updata_user_activity();
        setInterval(() => {
            updata_user_activity();
        }, 5000);
        var m = 29;
        var s = 59;
        var news = 1;
        var seconds = 0;
        let int = setInterval(() => {
            seconds++;
            if (s === 0) {
                s = 59;
                m = m - 1;
                $(".timer").html(m + ":00");
                $("h4.timer").prepend(" TIMER: ");
            } else if (s < 10) {
                $(".timer").html(m + ":0" + s--);
                $("h4.timer").prepend(" TIMER: ");
            } else if (m < 0) {
                $('.timer').hide();
                clearInterval(int);
                submit()
            } else {
                $(".timer").html(m + ":" + s--);
                $("h4.timer").prepend(" TIMER: ");
            }
            $(".time-taken").val(news++);
        }, 1000);
        $('.submit').on("click", ()=> {
            clearInterval(int);
            submit();
        });
        const review = data => {
            if (data > 70 || data === 70) return'Congratulations You Have Passed this Module.';
            else if (data>50 && data < 70) return 'Wow you are getting there, try harder.';
            else return 'Opps Sorry Try Again.';
        }
        var phpsol = $(".php-data").html().split(',');
        var sol = [];
        const submit = ()=>{    
        questions = 0;
        score = 0;
        prompt = 0;
        let i = 0;
        setTimeout(function(){
            $('.reviews').fadeOut();
            $('input.solution').each(function(){
                sol.push($(this).val());
                if ($(this).val() == ""){
                    questions++;
                }
            });
            const skipped = ()=> {
                var count = 0;
                sol.forEach(function(data){
                    if (data==="") count ++;
                });
                return count;
            }
            
            $('.options').each(function(){
                if (phpsol[i] === sol[i]){
                    score ++;
                    if(phpsol[i] =="A"){
                        $(this).children('li').eq(0).css('border', '2px solid #4fb64f');
                        $(this).children('li').eq(0).children('b').css('background-color', '#4fb64f');
                    }
                    else if(phpsol[i] =="B"){
                        $(this).children('li').eq(1).css('border', '2px solid #4fb64f');
                        $(this).children('li').eq(1).children('b').css('background-color', '#4fb64f');
                    }
                    else if(phpsol[i] =="C"){
                        $(this).children('li').eq(2).css('borderr', '2px solid #4fb64f');
                        $(this).children('li').eq(2).children('b').css('background-color', '#4fb64f');
                    }
                    else if(phpsol[i] =="D"){
                        $(this).children('li').eq(3).css('border', '2px solid #4fb64f');
                        $(this).children('li').eq(3).children('b').css('background-color', '#4fb64f');
                    }
                    $(this).siblings('div.data').html('<span style="color:#4fb64f">Correct: Option '+phpsol[i]+' is Correct <i class="icon-check"> </i> </span>');
                }
                else{
                    if (sol[i]==""){
                        $(this).siblings('div.data').html('<span style="color:red"> No Option was Selected </span>');
                    }
                    else {
                        if(phpsol[i] =="A"){
                        $(this).children('li').eq(0).css('border', '2px solid #4fb64f');
                        $(this).children('li').eq(0).children('b').css('background-color', '#4fb64f');
                        $(this).siblings('div.data').html('<span style="color:red"> Wrong: Option '+sol[i]+' is Wrong <i class="icon-close"> </i> </span>');
                        }
                        else if(phpsol[i] =="B"){
                        $(this).children('li').eq(1).css('border', '2px solid #4fb64f');
                        $(this).children('li').eq(1).children('b').css('background-color', '#4fb64f');
                        $(this).siblings('div.data').html('<span style="color:red"> Wrong: Option '+sol[i]+' is Wrong <i class="icon-close"> </i> </span>');
                        }
                        else if(phpsol[i] =="C"){
                        $(this).children('li').eq(2).css('border', '2px solid #4fb64f');
                        $(this).children('li').eq(2).children('b').css('background-color', '#4fb64f');
                        $(this).siblings('div.data').html('<span style="color:red"> Wrong: Option '+sol[i]+' is Wrong <i class="icon-close"> </i> </span>');
                        }
                        else if(phpsol[i] =="D"){
                        $(this).children('li').eq(3).css('border', '2px solid #4fb64f');
                        $(this).children('li').eq(3).children('b').css('background-color', '#4fb64f');
                        $(this).siblings('div.data').html('<span style="color:red"> Wrong: Option '+sol[i]+' is Wrong <i class="icon-close"> </i> </span>');
                        }   
                    }
                }
                             
                i++;
                
            });
            if (true){
                var courseId = $('#courseId').val();
                var chapterId = $('.bread-crum').text();
                $.ajax({
                    type:'POST',
                    url:'push.php',
                    data:'Score='+eval(score/20 * 100)+'&unique_key='+chapterId.trim()+'',
                    success:function(data){
                        console.log(data);
                    },
              });
            }
            
            if (eval(score/20 * 100) > 70 || eval(score/20 * 100) === 70) $('.nextt').show();
            $('.scored').html(eval(score/20 * 100).toFixed(2)+'%');
            $('.scorre').append(score);
            $('.time-taken').append(seconds+' s');
            $('.skippped').append(skipped());
            $('.reemarks').append(review(score/20 * 100));
            $('.remarks .toast').show();
            let newscore = score/20;
            $('#circle').circleProgress({value: newscore, size: 150, fill: { gradient: ["#102a66", "#102a66"] }});
            console.log(score);
        },1000)
        }
    });
    $('.report').click(function(){
        $.ajax({
            url:"backend_data/report.php",
            data:"id="+$(this).attr('id'),
            method:"POST",
            success:function(data){
                $(this).text(data);
            }
            
    });
    $(this).text('Reported'); 
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
    $(document).bind("contextmenu", function(e){
        e.preventDefault();
    });
    
    $(".options li").click(function(){
        $(this).siblings("input.solution").val($(this).children('b').html());
        $(this).parent().children("li").removeClass("active");
        $(this).addClass("active");
    });

    $('.show-data').click(function(){
        $('.reviews').slideToggle();
    });
</script>
<script>
    var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
window.onbeforeunload = function() { 
    window.setTimeout(function () { 
        window.location = 'challenge.php';
    }, 0); 
    window.onbeforeunload = null; // necessary to prevent infinite loop, that kills your browser 
}
</script>
</html>
