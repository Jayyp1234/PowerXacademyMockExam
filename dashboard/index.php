<?php
session_start();
if(!isset($_SESSION['user_id']) && !isset($_SESSION['class'])){
    header('location:../login/');
}
else{
  include '../backend_data/init.php';
  $id = $_SESSION['user_id'];
  $data1 = "SELECT * FROM `users` WHERE id='$id' ";
  $result = $conn->query($data1);
  if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
       $start = $row['payment_time'];
       $finsh = $row['expiry_time'];
     }
     $GLOBALS['moment'] = ($finsh - $start)/(3600);
     if ($finsh == 0 ){

     }
     else{
      if ($moment < 0){
        header('Location:../checkout.php');
      }
     }
     
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PowerX Academy - Dashboard </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="icon" href="../assets/image/icon.png" type="type/png">
  <!--icons link-->
  <link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/animate/animate.min.css" type="text/css">
  <link rel="preload" href="../assets/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/card.css" rel="stylesheet">
  <link href="../assets/css/ui.css?v=1.1" rel="stylesheet" type="text/css" />
  <link href="../assets/css/responsive.css?v=1.1" rel="stylesheet" />
  <!-- iconfont -->
  <link rel="stylesheet" href="../assets/fonts/material-icon/css/round.css" />

</head>
<style>
  .menu-aside .menu-link {
    padding: 10px;
    color: #7C7C7A;
    font-family: system-ui;
    font-weight: 600;
    font-size: 14.2px;
  }

  .menu-aside .menu-item {
    margin-bottom: 10px;
  }

  .menu-aside .menu-item.active .menu-link {
    color: #39bc2d;
    background-color: #ebf0fd;
    border-left: 5px solid #23b315;
    border-radius: 0;
  }

  .menu-aside .menu-item.active .icon {
    color: #23b315;
  }

  .pip {
    background: #F5F5F5;
    font-size: 14px;
    font-family: system-ui;
    border-radius: 0px 7px 7px 0px;
  }

  .pip2 {
    background: #F5F5F5;
    font-size: 14px;
  }

  .abb {
    color: white !important;
    background-color: #23b315;
    padding: 0.5rem;
    font-size: 14px;
    font-weight: 600;
  }

  .jumbotron {
    background-color: #23b315;
    border-radius: 20px;
    padding: 30px 15px;
    color: white;
    font-family: system-ui;
    margin-bottom: 20px;
  }

  .menu-aside .submenu a {
    font-size: 13px;
  }.bg-success {
    background-color: #23b315 !important;
    font-weight:500;
    font-family:'Open Sans Regular';
    color:white;
}.title{
  font-weight: 500;
    font-family: 'Open Sans Regular';
    font-size: small;
}
</style>

<body>

  <b class="screen-overlay"></b>

  <aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
      <a href="../dashboard" class="brand-wrap">
        <img src="../assets/image/icon-pro.png" height="46" class="logo" alt="Ecommerce dashboard template">
      </a>
      <div>
        <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i>
        </button>
      </div>
    </div> <!-- aside-top.// -->

    <nav>
      <ul class="menu-aside">
        <li class="menu-item active">
          <a class="menu-link" href="../dashboard"> <i class="icon material-icons md-show_chart"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li class="menu-item has-submenu">
          <a class="menu-link" href="card.php"> <i class="icon material-icons md-book"></i>
            <span class="text">Results</span>
          </a>
          <div class="submenu">
            <a href="exams.php">Exams</a>
          </div>
        </li>
      </ul>
      <hr>
      <ul class="menu-aside">
        <li class="menu-item">
          <a class="menu-link" href="#"> <i class="icon material-icons md-email"></i>
            <span class="text">Messages</span>
          </a>
        </li>
        <li class="menu-item">
          <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i>
            <span class="text">Settings</span>
          </a>
        </li>

        <li class="menu-item">
          <a class="menu-link" href="../logout"> <i class="icon material-icons md-log_out"></i>
            <span class="text"> Logout </span>
          </a>
        </li>
      </ul>
      <br>
      <br>
    </nav>
  </aside>
<?php
if (isset($_POST['class'])){
  $_SESSION['class'] = $_POST['class'];
}
?>
  <main class="main-wrap">
    <header class="main-header navbar">
      <div class="col-search">
        <form class="searchform" method="POST">
          <div class="input-group">
            <button class="btn btn-light bg pip2" type="button"> Class </button>
            <select class="custom-select pip2" name="class" id="inputGroupSelect04" style="width: calc(100% - 70px);border-radius: 0px 10px 10px 0px;border: 1px solid rgba(108, 117, 125, 0.25);">
            <?php
                include '../backend_data/init.php';
                $id = $_SESSION['user_id'];
                $data1 = "SELECT * FROM `users` WHERE id='$id' ";
                $result = $conn->query($data1);
                if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {
                     $class = $row['class'];
                   }
                   $data = explode(',', $class);
                   foreach ($data as $value) {
                     if ($_SESSION['class'] == $value){
                      echo '<option value="'.$value.'" selected>'.$value.'</option>';
                     }
                     else{
                      echo '<option value="'.$value.'">'.$value.'</option>';
                     }
                    
                  }
                }
            ?>
          </select>
          </div>
        </form>
      </div>
      <div class="col-nav">
        <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i
            class="md-28 material-icons md-menu"></i> </button>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link btn-icon" onclick="darkmode(this)" title="Dark mode" href="#"> <i
                class="material-icons md-nights_stay"></i> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-icon abb" style="border-radius:50%;" href="#"> <i
                class="material-icons md-notifications_active"></i> </a>
          </li>
          <li class="nav-item" style="display: flex;flex-direction: column;text-align: end;height: 30px;margin: 8px;">
            <b
              style="font-size: 12px;font-weight: 700;font-family: system-ui;line-height: 15px;color: #222133;"><?php echo $_SESSION['name'] ; ?></b>
            <span
              style="font-size: 11px;font-weight: 500;color: #7C7C7A;font-family: system-ui;"><?php echo $_SESSION['email'] ; ?></span>
          </li>

        </ul>
      </div>
    </header>

    <section class="content-main">
      <div class="intro-div" style="display: flex;justify-content: space-between;align-items: center;">
        <b>Dashboard</b>
        <?php
          if ($finsh == 0 ){

          }
          else{
           echo '<span id="time" class="time" style="font-family: system-ui;"> '.$moment .' days remaining</span>';
          }

        ?>
        
      </div>
      <br>
      <div class="jumbotron wow fadeInDownBig">
        <br>
        <h4>Welcome back, <?php echo $_SESSION['name']; ?>. </h4>
        <span>Executive dashboard for analytics and reports.</span> <br>
        <span>Keep it up to improve your results</span>
        <br>
      </div>
      <br>
      <!--
      <b>Exams</b>

      <div class="row">
        <?php
                function pub($data){
                    include '../backend_data/init.php';
                    $id = $_SESSION['user_id'];

                    $data1 = "SELECT * FROM `results` WHERE user_id='$id' and exam_id='$data' ";
                    $result = $conn->query($data1);
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        $newid = $row['id'];
                      }
                    }
                    else {
                      $newid='';
                    }
                    $newdata = "SELECT * FROM `exams` WHERE id = '$data'";
                    $resulte = $conn->query($newdata);
                    if ($resulte->num_rows > 0) {
                        // output data of each row
                        while($row = $resulte->fetch_assoc()) {
                            $result = $row['upload'];
                        }
                        if ($result == 'yes'){
                            return '<a href="result.php?id='.$newid.'"> <button class="btn" style="right:20px;">View Result</button></a>';
                        }
                        else{
                            return '<a href="exam_question.php?id='.$data.'"> <button class="btn" style="right:10px;">Start</button></a>';
                        }
                    }
                }
            
                include '../backend_data/init.php';
                $id = $_SESSION["user_id"];
                $data = "SELECT * FROM `users` WHERE id = '$id' ";
                $resulte = $conn->query($data);
                    if ($resulte->num_rows > 0) {
                        // output data of each row
                        while($row = $resulte->fetch_assoc()) {
                            $class = $row['class'];
                        }
                    }
                $newdata = "SELECT * FROM `exams` WHERE published = 'yes' and class = '$class' ";
                $resulte = $conn->query($newdata);
                if ($resulte->num_rows > 0) {
                // output data of each row
                while($row = $resulte->fetch_assoc()) {
                  echo '
                  <div class="col-lg-6 col-md-12 wow fadeInRightBig course-data">
                  <div class="courses-container">
                       <div class="course">
                           <div class="course-preview">
                               <h6>Type :'.$row["type"].' </h6>
                               <h2>'.$row["title"].'</h2>
                           </div>
                           <div class="course-info">
                               <div style="display:flex;justify-content:space-between;align-items:center;">
                                   <h6 style="display:flex;align-items:center;"><i class="icon-calendar"></i>'.$row["start_time"].'</h6>
                                   <h6><i class="icon-arrow-right"></i></h6>
                                   <h6 style="display:flex;align-items:center;"><i class="icon-calendar"></i>'.$row["close_time"].'</h6>
                               </div>
                               <div style="display:flex;justify-content:space-between;align-items:center;">
                                   <h6 style="display:flex;align-items:center;"><i class="icon-clock-o"></i>'.$row["duration"].' min </h6>
                                   <h6 style="display:flex;align-items:center;"><i class="icon-question-circle"></i>'.$row["length"].' questions </h6>
                               </div>
                               <div style="display:flex;justify-content:space-between;align-items:center;">
                                   <h6 style="display:flex;align-items:center;"><i class="icon-users"></i> 50 Enrolled </h6>
                               </div>
                               <br><br>'.pub($row["id"]).'
                           </div>
                       </div>
                   </div> 
               </div>
                ';
                }
              }else{
                echo  '
                <div style="display:flex;width:100%;justify-content:center;background-color:white;width:200px;height:150px;align-items:center;border-radius:20px;margin:auto;box-shadow:0 10px 10px rgb(0 0 0 / 20%);">
                <a href="#"><button type="button" style="background-color: #408e3a;
                border: 1px solid;font-size: 13px;font-weight: 600;font-family:Open Sans SemiBold;" class="btn btn-primary">No Exam Available</button></a>';
              }
            ?>

      </div>
            -->
      <div class="row">
       <div class="col-md-6" style="margin-top:30px;">
       <ul class="list-group">
        <button type="button" class="list-group-item bg-success list-group-item-action " aria-current="true">
          Exam Results
        </button>
        <?php
            include '../backend_data/init.php';
            $id = $_SESSION['user_id'];
            $class = $_SESSION['class'];
            $data1 = "SELECT * FROM `exam_result` WHERE `user_id` ='$id' and class='$class' ";
            $result = $conn->query($data1);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $tenure = $row['tenure'];
                $id = $row['user_id'];
                echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="title">'.$tenure.'</span>
                <form action="../admin/assement-result/result.php" METHOD="POST">
                  <input type="hidden" name="session" value="'.$tenure.'">
                  <input type="hidden" name="class" value="'.$class.'">
                  <input type="hidden" name="name" value="'.$id.'">
                  <button class="badge bg-success rounded-pill">Download</button>
                </form>
              </li>';
              }
            }
            else{
              echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="title">No result available</span>
              </li>';
            }
          ?>
      </ul>
       </div>
       <div class="col-md-6" style="margin-top:30px;">
       <ul class="list-group">
        <button type="button" class="list-group-item bg-success list-group-item-action " aria-current="true">
          Mid Term Exam Results
        </button>
        <?php
            $data1 = "SELECT * FROM `midterm_result` WHERE `user_id` ='$id' and class='$class' ";
            $result = $conn->query($data1);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $tenure = $row['tenure'];
                $id = $row['user_id'];
                echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="title">'.$tenure.'</span>
                <form action="../admin/assement-result/mid_result.php" METHOD="POST">
                  <input type="hidden" name="session" value="'.$tenure.'">
                  <input type="hidden" name="class" value="'.$class.'">
                  <input type="hidden" name="name" value="'.$id.'">
                  <button class="badge bg-success rounded-pill">Download</button>
                </form>
              </li>';
              }
            }
            else{
              echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="title">No result available</span>
              </li>';
            }
          ?>
      </ul>
       </div>
      </div>
    </section> <!-- content-main end// -->
  </main>

  <script type="text/javascript">
    if (localStorage.getItem("darkmode")) {
      var body_el = document.body;
      body_el.className += 'dark';
    }
  </script>


  <script type="text/javascript" src="../assets/js/custom.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../assets/js/wow/wow.min.js"></script>
  <script type="text/javascript" src="../assets/js/wow/main.js"></script>
  <!-- Custom JS -->
  <script src="../assets/js/script.js?v=1.0" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    $('.pip2').on('change', function(){
      $('.searchform').submit();
    });
});
</script>
</body>

</html>