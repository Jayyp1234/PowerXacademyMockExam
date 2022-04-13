<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:../login/');
}
else if(isset($_POST['session']) && isset($_POST['class'])){
    $GLOBALS['session'] = $_POST['session'];
    $GLOBALS['class'] = $_POST['class'];
}
include '../../backend_data/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PowerX Online Academy - Dashoard </title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="icon" href="../../assets/image/icon.png" type="type/png">
    <!--icons link-->
    <link rel="stylesheet" href="../../assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link href="../../assets/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/animate/animate.min.css" type="text/css">
    <link rel="preload" href="../../assets/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/ui.css?v=1.1" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/responsive.css?v=1.1" rel="stylesheet" />
    <!-- iconfont -->
    <link rel="stylesheet" href="../../assets/fonts/material-icon/css/round.css" />

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
    }
</style>

<body>

    <b class="screen-overlay"></b>

    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="dashboard.php" class="brand-wrap">
                <img src="../../assets/image/icon-pro.png" height="46" class="logo" alt="Ecommerce dashboard template">
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i>
                </button>
            </div>
        </div> <!-- aside-top.// -->

        <nav>
  <ul class="menu-aside">
    <li class="menu-item"> 
      <a class="menu-link" href="../dashboard.php"> <i class="icon material-icons md-show_chart"></i> 
        <span class="text">Dashboard</span> 
      </a> 
    </li>
    <li class="menu-item">
      <a class="menu-link" href="../instructors.php"> <i class="icon material-icons md-person"></i> 
        <span class="text">Instructors</span> 
      </a> 
    </li>
    <li class="menu-item">
      <a class="menu-link" href="../student.php"> <i class="icon material-icons md-person_outline"></i> 
        <span class="text">Students</span> 
      </a> 
    </li>
    <!--
    <li class="menu-item has-submenu"> 
      <a class="menu-link" href="card.php"> <i class="icon material-icons md-book"></i>  
        <span class="text">Assessments</span> 
      </a> 
      <div class="submenu">
        <a href="exams.php">Exams</a>
        <a href="create_exam.php">Generate Exam for Students</a>
        <a href="upload_result.php">Upload Results</a>
      </div>
    </li>
    -->
    <li class="menu-item has-submenu"> 
      <a class="menu-link" href="#"> <i class="icon material-icons md-payment"></i>  
        <span class="text">Payments and Bill</span> 
      </a> 
      <div class="submenu">
        <a href="../bills.php">Bills</a>
        <a href="../bill_student.php">Student Bill</a>
        <a href="../bill_transaction.php">Transactions</a>
      </div>
    </li>
    <li class="menu-item has-submenu active"> 
      <a class="menu-link" href="card.php"> <i class="icon material-icons md-book"></i>  
        <span class="text">Results</span> 
      </a> 
      <div class="submenu">
        <a href="generate.php">Generate Exam Results</a>
        <a href="upload.php">Upload Exam Results</a>
        <a href='generatem.php'>Generate Mid Term Results </a>
        <a href="upload_mid.php">Upload Mid Term Results</a>
        
      </div>
    </li>
  </ul>
  <hr>
  <ul class="menu-aside">
    <li class="menu-item"> 
      <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i> 
        <span class="text">Settings</span> 
      </a>
      
    </li>
    <li class="menu-item">
      <a class="menu-link" href="../../logout"> <i class="icon material-icons md-log_out"></i> 
        <span class="text"> Logout </span>
      </a> 
    </li>
  </ul>
  <br>
  <br>
</nav>
    </aside>

    <main class="main-wrap">
        <header class="main-header navbar">
            <div class="col-search">
                <form class="searchform">
                    <div class="input-group">
                        <button class="btn btn-light bg pip2" type="button"> <i class="material-icons md-search"></i>
                        </button>
                        <input type="text" class="form-control pip" placeholder="Search...">
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
                    <li class="nav-item"
                        style="display: flex;flex-direction: column;text-align: end;height: 30px;margin: 8px;">
                        <b
                            style="font-size: 12px;font-weight: 700;font-family: system-ui;line-height: 15px;color: #222133;"><?php echo $_SESSION['name']; ?></b>
                        <span
                            style="font-size: 11px;font-weight: 500;color: #7C7C7A;font-family: system-ui;"><?php echo $_SESSION['email']; ?></span>
                    </li>

                </ul>
            </div>
        </header>
        
        <section class="content-main">
            <div style="display:flex;justify-content:space-between;flex-wrap:wrap;">
                <div class="content-header" style="margin-bottom:0">
                    <h4> Upload Results</h4>
                </div>
            </div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">1st Term</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">2nd Term</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">3rd Term</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <?php
                        include '../../backend_data/init.php';
                        $name = $email = $username = $password = $department = '';
                        $nameErr = $emailErr = $errormessage = '';
                        function test_input($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(isset( $_POST['button'] )) {
                                $english = $_POST['english'];
                                $maths = $_POST['math'];
                                $science = $_POST['science'];
                                $biology = $_POST['biology'];
                                $physics = $_POST['physics'];
                                $chemistry= $_POST['chemistry'];
                                $computer = $_POST['computer'];
                                $attitude = $_POST['attitude'];
                                $behaviour = $_POST['behaviour'];
                                $attendance = $_POST['attendance'];
                                $qmale = $_POST["quranmale"];
                                $qfemale = $_POST["quranfemale"];
                                $arabic = $_POST["arabicadvanced"];
                                $data = $_POST["qaida"];
                                $session = $_POST["session"];
                                $id = test_input($_POST['id']);
                                $insertdetails = "INSERT INTO `exam_result`(`id`, `user_id`, `tenure`, `English`, `Mathematics`, `Science`, `Biology`, `Chemistry`, `Physics`, `Qur'an (Male)`, `Qur'an (Female)`, `Arabic (Advanced)`, `Qaida Al - Nooraniyya`, `Computer`, `attitude`,`behaviour`,`attendance`, `timestamp`) VALUES
                                ('','$id','$session','$english','$maths','$science','$biology','$chemistry','$physics','$qmale','$qfemale','$arabic','$data','$computer','$attitude','$behaviour','$attendance','')";
                                if($conn->query($insertdetails)){
                                }
                                else {
                                    echo "Record Not Succesful";
                                }
                            }
                            else if (isset($_POST['update-button'])) {
                                $english = $_POST['english'];
                                $maths = $_POST['math'];
                                $science = $_POST['science'];
                                $biology = $_POST['biology'];
                                $physics = $_POST['physics'];
                                $chemistry= $_POST['chemistry'];
                                $computer = $_POST['computer'];
                                $attitude = $_POST['attitude'];
                                $behaviour = $_POST['behaviour'];
                                $attendance = $_POST['attendance'];
                                $qmale = $_POST["quranmale"];
                                $qfemale = $_POST["quranfemale"];
                                $arabic = $_POST["arabicadvanced"];
                                $data = $_POST["qaida"];
                                $id = test_input($_POST['id']);
                                $sql = "UPDATE `exam_result` SET `English`='$english',`Mathematics`='$maths',`Science`='$science',`Biology`='$biology',`Chemistry`='$chemistry',`Physics`='$physics',`Qur'an (Male)`='$qmale',`Qur'an (Female)`='$qfemale ',`Arabic (Advanced)`='$arabic',`Qaida Al - Nooraniyya`='$data',`Computer`='$computer',`attitude` = '$attitude',`behaviour` = '$behaviour',`attendance`='$attendance' WHERE user_id ='$id'";
                                if($conn->query($sql)){
                                    
                                }
                                else {
                                    echo "Record Not Succesful";
                                }
                            }
                            $conn->close();
                        }
                        ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table display" style="width:100%;">
                                    <?php
                                    function pub($data,$data1){
                                        include '../../backend_data/init.php';
                                        $newdata = "SELECT * FROM `exam_result` WHERE `$data` LIKE '%' and user_id = '$data1' ";
                                        $resulte = $conn->query($newdata);
                                        if ($resulte ->num_rows > 0) {
                                            // output data of each row
                                            while($row = $resulte ->fetch_assoc()) {
                                                $pick = $row[$data];
                                            }
                                            return $pick;
                                        }
                                        else{
                                            return '';
                                        }
                                        $conn->close();
                                    }
                                    function pub2($data1,$data2){
                                        include '../../backend_data/init.php';
                                        $session = $_POST['session'];
                                        $class = $_POST['class'];
                                        $newdata = "SELECT * FROM `exam_result` WHERE user_id = '$data1' ";
                                        $resulte = $conn->query($newdata);
                                        if ($resulte->num_rows > 0) {
                                            // output data of each row
                                            while($row = $resulte->fetch_assoc()) {
                                                $english = $row['English'];
                                                $maths = $row['Mathematics'];
                                                $science = $row['Science'];
                                                $biology = $row['Biology'];
                                                $physics = $row['Physics'];
                                                $chemistry= $row['Chemistry'];
                                                $computer = $row['Computer'];
                                                $attitude = $row['attitude'];
                                                $behaviour = $row['behaviour'];
                                                $attendance = $row['attendance'];
                                                $qmale = $row["Qur'an (Male)"];
                                                $qfemale = $row["Qur'an (Female)"];
                                                $arabic = $row["Arabic (Advanced)"];
                                                $data = $row["Qaida Al - Nooraniyya"];
                                            }
                                            return "<a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#exampleModal".$data1."'>Update Result</a>
                                            </div>
                                        </div>
                                    </td> 
                                    </tr>
                                    <div class='modal fade' id='exampleModal".$data1."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModal".$data1."Label'>Update ".$data2." Score</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                        <form method='POST'>
                                        <input type='hidden' name='id' value='".$data1."'>
                                        <input type='hidden' name='session' value='".$session."'>
                                        <input type='hidden' name='class' value='".$class."'>
                                        <div class='mb-3'>
                                            <label class='form-label'>English</label>
                                            <input type=text' name='english' class='form-control' value='".$english."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Mathematics</label>
                                            <input type=text' name='math' class='form-control' value='".$maths."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Chemistry</label>
                                            <input type=text' name='chemistry' class='form-control' value='".$chemistry."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Biology</label>
                                            <input type=text' name='biology' class='form-control' value='".$biology."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Physics</label>
                                            <input type=text' name='physics' class='form-control' value='".$physics."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Science</label>
                                            <input type=text' name='science' class='form-control' value='".$science."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qur'an (Male)</label>
                                            <input type=text' name='quranmale' class='form-control' value='".$qmale."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qur'an (Female)</label>
                                            <input type=text' name='quranfemale' class='form-control' value='".$qfemale."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Arabic (Advanced)</label>
                                            <input type=text' name='arabicadvanced' class='form-control' value='".$arabic."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qaida Al - Nooraniyya</label>
                                            <input type=text' name='qaida' class='form-control' value='".$data."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Computer</label>
                                            <input type=text' name='computer' class='form-control' value='".$computer."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Attitude</label>
                                            <textarea name='attitude' class='form-control'>".$attitude."</textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Behaviour</label>
                                            <textarea name='behaviour' class='form-control'>".$behaviour."</textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Attendance</label>
                                            <textarea name='attendance' class='form-control'>".$attendance."</textarea>
                                        </div>
                                        <button type='submit' class='btn btn-primary' name='update-button'>Submit</button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>";
                                        }
                                        else{
                                            return "<a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#exampleModal".$data1."'>Upload Result</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td> 
                                    </tr>
                                    <div class='modal fade' id='exampleModal".$data1."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModal".$data1."Label'>".$data2." Score</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                        <form method='POST'>
                                        <input type='hidden' name='session' value='".$session."'>
                                        <input type='hidden' name='class' value='".$class."'>
                                        <input type='hidden' name='id' value='".$data1."'>
                                        <div class='mb-3'>
                                            <label class='form-label'>English</label>
                                            <input type=text' name='english' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Mathematics</label>
                                            <input type=text' name='math' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Chemistry</label>
                                            <input type=text' name='chemistry' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Biology</label>
                                            <input type=text' name='biology' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Physics</label>
                                            <input type=text' name='physics' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Science</label>
                                            <input type=text' name='science' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qur'an (Male)</label>
                                            <input type=text' name='quranmale' class='form-control'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qur'an (Female)</label>
                                            <input type=text' name='quranfemale' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Arabic (Advanced)</label>
                                            <input type=text' name='arabicadvanced' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qaida Al - Nooraniyya</label>
                                            <input type=text' name='qaida' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Computer</label>
                                            <input type=text' name='computer' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Attitude</label>
                                            <textarea name='attitude' class='form-control'></textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Behaviour</label>
                                            <textarea name='behaviour' class='form-control'></textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Attendance</label>
                                            <textarea name='attendance' class='form-control' ></textarea>
                                        </div>
                                        <button type='submit' class='btn btn-primary' name='button'>Submit</button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>";
                                        }
                                    }
                include '../../backend_data/init.php';

                $sql = "SELECT * FROM `users` WHERE class = '$class'";
                $query = mysqli_query($conn,$sql);
                 if($query){
                     if(mysqli_num_rows($query) > 0){
                         
                         $output = "<thead>
                         <tr>
                             <th>Names</th>
                             <th>Class</th>
                             <th>English</th>
                             <th>Mathematics</th>
                             <th>Science</th>
                             <th>Chemistry</th>
                             <th>Biology</th>
                             <th>Physics</th>
                             <th>Qur'an (Male)</th>
                             <th>Qur'an (Female)</th>
                             <th>Arabic (Advanced)</th>
                             <th>Qaida Al - Nooraniyya</th>
                             <th>Computer</th>
                             <th>Attitude</th>
                             <th>Behaviour</th>
                             <th>Attendance</th>
                             <th>Action</th>
                         </tr>
                     </thead><tbody>";
                     while($row = mysqli_fetch_assoc($query)){
                         
                         $output .="<tr>
                         <td>".$row['name']."</td>
                         <td>".$row['class']."</td>
                         <td>".pub('English',$row['id'])."</td>
                         <td>".pub('Mathematics',$row['id'])."</td>
                         <td>".pub('Science',$row['id'])."</td>
                         <td>".pub('Chemistry',$row['id'])."</td>
                         <td>".pub('Biology',$row['id'])."</td>
                         <td>".pub('Physics',$row['id'])."</td>
                         <td>".pub('Qur\'an (Male)',$row['id'])."</td>
                         <td>".pub('Qur\'an (Female)',$row['id'])."</td>
                         <td>".pub('Arabic (Advanced)',$row['id'])."</td>
                         <td>".pub('Qaida Al - Nooraniyya',$row['id'])."</td>
                         <td>".pub('Computer',$row['id'])."</td>
                         <td>".pub('attitude',$row['id'])."</td>
                         <td>".pub('behaviour',$row['id'])."</td>
                         <td>".pub('attendance',$row['id'])."</td>
                         <td class='text-end'> 
          				<div class='dropdown'>
          					<a href='#' data-bs-toggle='dropdown' class='btn btn-light'> <i class='material-icons md-more_horiz'></i> </a> 
          					<div class='dropdown-menu'>
                              ".pub2($row['id'], $row['name'])."
                         ";
                     }
                 }else{
                     $output = '<b>You do not have any Students In this Class</b>';
                 }
                 echo $output."</tbody>";
                 }
                
                ?>
                                </table>
                            </div> <!-- table-responsive end// -->
                        </div> <!-- card-body end// -->
                    </div>






                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <?php
                        include '../../backend_data/init.php';
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(isset( $_POST['button2'] )) {
                                $english = $_POST['english'];
                                $maths = $_POST['math'];
                                $science = $_POST['science'];
                                $biology = $_POST['biology'];
                                $physics = $_POST['physics'];
                                $chemistry= $_POST['chemistry'];
                                $computer = $_POST['computer'];
                                $attitude = $_POST['attitude'];
                                $behaviour = $_POST['behaviour'];
                                $attendance = $_POST['attendance'];
                                $qmale = $_POST["quranmale"];
                                $qfemale = $_POST["quranfemale"];
                                $arabic = $_POST["arabicadvanced"];
                                $data = $_POST["qaida"];
                                $session = $_POST["session"];
                                $id = test_input($_POST['id']);
                                $insertdetails = "INSERT INTO `exam_result`(`id`, `user_id`, `tenure`, `English2`, `Mathematics2`, `Science2`, `Biology2`, `Chemistry2`, `Physics2`, `Qur'an (Male)2`, `Qur'an (Female)2`, `Arabic (Advanced)2`, `Qaida Al - Nooraniyya2`, `Computer2`, `attitude`,`behaviour`,`attendance`, `timestamp`) VALUES
                                ('','$id','$session','$english','$maths','$science','$biology','$chemistry','$physics','$qmale','$qfemale','$arabic','$data','$computer','$attitude','$behaviour','$attendance','')";
                                if($conn->query($insertdetails)){
                                }
                                else {
                                    echo "Record Not Succesful";
                                }
                            }
                            else if (isset($_POST['update-button2'])) {
                                $english = $_POST['english'];
                                $maths = $_POST['math'];
                                $science = $_POST['science'];
                                $biology = $_POST['biology'];
                                $physics = $_POST['physics'];
                                $chemistry= $_POST['chemistry'];
                                $computer = $_POST['computer'];
                                $attitude = $_POST['attitude'];
                                $behaviour = $_POST['behaviour'];
                                $attendance = $_POST['attendance'];
                                $qmale = $_POST["quranmale"];
                                $qfemale = $_POST["quranfemale"];
                                $arabic = $_POST["arabicadvanced"];
                                $data = $_POST["qaida"];
                                $id = test_input($_POST['id']);
                                $sql = "UPDATE `exam_result` SET `English2`='$english',`Mathematics2`='$maths',`Science2`='$science',`Biology2`='$biology',`Chemistry2`='$chemistry',`Physics2`='$physics',`Qur'an (Male)2`='$qmale',`Qur'an (Female)2`='$qfemale ',`Arabic (Advanced)2`='$arabic',`Qaida Al - Nooraniyya2`='$data',`Computer2`='$computer',`attitude` = '$attitude',`behaviour` = '$behaviour',`attendance`='$attendance' WHERE user_id ='$id'";
                                if($conn->query($sql)){
                                    
                                }
                                else {
                                    echo "Record Not Succesful";
                                }
                            }
                            $conn->close();
                        }
                        ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table display" style="width:100%">
                                    <?php
                                    function pub3($data1,$data2){
                                        include '../../backend_data/init.php';
                                        $session = $_POST['session'];
                                        $class = $_POST['class'];
                                        $newdata = "SELECT * FROM `exam_result` WHERE user_id = '$data1' ";
                                        $resulte = $conn->query($newdata);
                                        if ($resulte->num_rows > 0) {
                                            // output data of each row
                                            while($row = $resulte->fetch_assoc()) {
                                                $english = $row['English2'];
                                                $maths = $row['Mathematics2'];
                                                $science = $row['Science2'];
                                                $biology = $row['Biology2'];
                                                $physics = $row['Physics2'];
                                                $chemistry= $row['Chemistry2'];
                                                $computer = $row['Computer2'];
                                                $attitude = $row['attitude'];
                                                $behaviour = $row['behaviour'];
                                                $attendance = $row['attendance'];
                                                $qmale = $row["Qur'an (Male)2"];
                                                $qfemale = $row["Qur'an (Female)2"];
                                                $arabic = $row["Arabic (Advanced)2"];
                                                $data = $row["Qaida Al - Nooraniyya2"];
                                            }
                                            return "<a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#exampleModal1".$data1."'>Update Result</a>
                                            </div>
                                        </div>
                                    </td> 
                                    </tr>
                                    <div class='modal fade' id='exampleModal1".$data1."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModal".$data1."Label'>Update ".$data2." Score</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                        <form method='POST'>
                                        <input type='hidden' name='id' value='".$data1."'>
                                        <input type='hidden' name='session' value='".$session."'>
                                        <input type='hidden' name='class' value='".$class."'>
                                        <div class='mb-3'>
                                            <label class='form-label'>English</label>
                                            <input type=text' name='english' class='form-control' value='".$english."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Mathematics</label>
                                            <input type=text' name='math' class='form-control' value='".$maths."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Chemistry</label>
                                            <input type=text' name='chemistry' class='form-control' value='".$chemistry."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Biology</label>
                                            <input type=text' name='biology' class='form-control' value='".$biology."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Physics</label>
                                            <input type=text' name='physics' class='form-control' value='".$physics."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Science</label>
                                            <input type=text' name='science' class='form-control' value='".$science."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qur'an (Male)</label>
                                            <input type=text' name='quranmale' class='form-control' value='".$qmale."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qur'an (Female)</label>
                                            <input type=text' name='quranfemale' class='form-control' value='".$qfemale."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Arabic (Advanced)</label>
                                            <input type=text' name='arabicadvanced' class='form-control' value='".$arabic."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qaida Al - Nooraniyya</label>
                                            <input type=text' name='qaida' class='form-control' value='".$data."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Computer</label>
                                            <input type=text' name='computer' class='form-control' value='".$computer."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Attitude</label>
                                            <textarea name='attitude' class='form-control'>".$attitude."</textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Behaviour</label>
                                            <textarea name='behaviour' class='form-control'>".$behaviour."</textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Attendance</label>
                                            <textarea name='attendance' class='form-control'>".$attendance."</textarea>
                                        </div>
                                        <button type='submit' class='btn btn-primary' name='update-button2'>Submit</button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>";
                                        }
                                        else{
                                            return "<a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#exampleModal1".$data1."'>Upload Result</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td> 
                                    </tr>
                                    <div class='modal fade' id='exampleModal1".$data1."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModal".$data1."Label'>".$data2." Score</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                        <form method='POST'>
                                        <input type='hidden' name='session' value='".$session."'>
                                        <input type='hidden' name='class' value='".$class."'>
                                        <input type='hidden' name='id' value='".$data1."'>
                                        <div class='mb-3'>
                                            <label class='form-label'>English</label>
                                            <input type=text' name='english' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Mathematics</label>
                                            <input type=text' name='math' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Chemistry</label>
                                            <input type=text' name='chemistry' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Biology</label>
                                            <input type=text' name='biology' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Physics</label>
                                            <input type=text' name='physics' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Science</label>
                                            <input type=text' name='science' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qur'an (Male)</label>
                                            <input type=text' name='quranmale' class='form-control'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qur'an (Female)</label>
                                            <input type=text' name='quranfemale' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Arabic (Advanced)</label>
                                            <input type=text' name='arabicadvanced' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qaida Al - Nooraniyya</label>
                                            <input type=text' name='qaida' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Computer</label>
                                            <input type=text' name='computer' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Attitude</label>
                                            <textarea name='attitude' class='form-control'></textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Behaviour</label>
                                            <textarea name='behaviour' class='form-control'></textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Attendance</label>
                                            <textarea name='attendance' class='form-control' ></textarea>
                                        </div>
                                        <button type='submit' class='btn btn-primary' name='button2'>Submit</button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>";
                                        }
                                    }
                include '../../backend_data/init.php';

                $sql = "SELECT * FROM `users` WHERE class = '$class'";
                $query = mysqli_query($conn,$sql);
                 if($query){
                     if(mysqli_num_rows($query) > 0){
                         
                         $output = "<thead>
                         <tr>
                             <th>Names</th>
                             <th>Class</th>
                             <th>English</th>
                             <th>Mathematics</th>
                             <th>Science</th>
                             <th>Chemistry</th>
                             <th>Biology</th>
                             <th>Physics</th>
                             <th>Qur'an (Male)</th>
                             <th>Qur'an (Female)</th>
                             <th>Arabic (Advanced)</th>
                             <th>Qaida Al - Nooraniyya</th>
                             <th>Computer</th>
                             <th>Attitude</th>
                             <th>Behaviour</th>
                             <th>Attendance</th>
                             <th>Action</th>
                         </tr>
                     </thead><tbody>";
                     while($row = mysqli_fetch_assoc($query)){
                         
                         $output .="<tr>
                         <td>".$row['name']."</td>
                         <td>".$row['class']."</td>
                         <td>".pub('English2',$row['id'])."</td>
                         <td>".pub('Mathematics2',$row['id'])."</td>
                         <td>".pub('Science2',$row['id'])."</td>
                         <td>".pub('Chemistry2',$row['id'])."</td>
                         <td>".pub('Biology2',$row['id'])."</td>
                         <td>".pub('Physics2',$row['id'])."</td>
                         <td>".pub('Qur\'an (Male)2',$row['id'])."</td>
                         <td>".pub('Qur\'an (Female)2',$row['id'])."</td>
                         <td>".pub('Arabic (Advanced)2',$row['id'])."</td>
                         <td>".pub('Qaida Al - Nooraniyya2',$row['id'])."</td>
                         <td>".pub('Computer2',$row['id'])."</td>
                         <td>".pub('attitude',$row['id'])."</td>
                         <td>".pub('behaviour',$row['id'])."</td>
                         <td>".pub('attendance',$row['id'])."</td>
                         <td class='text-end'> 
          				<div class='dropdown'>
          					<a href='#' data-bs-toggle='dropdown' class='btn btn-light'> <i class='material-icons md-more_horiz'></i> </a> 
          					<div class='dropdown-menu'>
                              ".pub3($row['id'], $row['name'])."
                         ";
                     }
                 }else{
                     $output = '<b>You do not have any Students In this Class</b>';
                 }
                 echo $output."</tbody>";
                 }
                
                ?>
                                </table>
                            </div> <!-- table-responsive end// -->
                        </div> <!-- card-body end// -->
                    </div>




                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">


                <?php
                        include '../../backend_data/init.php';
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(isset( $_POST['button3'] )) {
                                $english = $_POST['english'];
                                $maths = $_POST['math'];
                                $science = $_POST['science'];
                                $biology = $_POST['biology'];
                                $physics = $_POST['physics'];
                                $chemistry= $_POST['chemistry'];
                                $computer = $_POST['computer'];
                                $attitude = $_POST['attitude'];
                                $behaviour = $_POST['behaviour'];
                                $attendance = $_POST['attendance'];
                                $qmale = $_POST["quranmale"];
                                $qfemale = $_POST["quranfemale"];
                                $arabic = $_POST["arabicadvanced"];
                                $data = $_POST["qaida"];
                                $session = $_POST["session"];
                                $id = test_input($_POST['id']);
                                $insertdetails = "INSERT INTO `exam_result`(`id`, `user_id`, `tenure`, `English3`, `Mathematics3`, `Science3`, `Biology3`, `Chemistry3`, `Physics3`, `Qur'an (Male)3`, `Qur'an (Female)3`, `Arabic (Advanced)3`, `Qaida Al - Nooraniyya3`, `Computer3`, `attitude`,`behaviour`,`attendance`, `timestamp`) VALUES
                                ('','$id','$session','$english','$maths','$science','$biology','$chemistry','$physics','$qmale','$qfemale','$arabic','$data','$computer','$attitude','$behaviour','$attendance','')";
                                if($conn->query($insertdetails)){
                                }
                                else {
                                    echo "Record Not Succesful";
                                }
                            }
                            else if (isset($_POST['update-button3'])) {
                                $english = $_POST['english'];
                                $maths = $_POST['math'];
                                $science = $_POST['science'];
                                $biology = $_POST['biology'];
                                $physics = $_POST['physics'];
                                $chemistry= $_POST['chemistry'];
                                $computer = $_POST['computer'];
                                $attitude = $_POST['attitude'];
                                $behaviour = $_POST['behaviour'];
                                $attendance = $_POST['attendance'];
                                $qmale = $_POST["quranmale"];
                                $qfemale = $_POST["quranfemale"];
                                $arabic = $_POST["arabicadvanced"];
                                $data = $_POST["qaida"];
                                $id = test_input($_POST['id']);
                                $sql = "UPDATE `exam_result` SET `English3`='$english',`Mathematics3`='$maths',`Science3`='$science',`Biology3`='$biology',`Chemistry3`='$chemistry',`Physics3`='$physics',`Qur'an (Male)3`='$qmale',`Qur'an (Female)3`='$qfemale',`Arabic (Advanced)3`='$arabic',`Qaida Al - Nooraniyya3`='$data',`Computer3`='$computer',`attitude` = '$attitude',`behaviour` = '$behaviour',`attendance`='$attendance' WHERE user_id ='$id'";
                                if($conn->query($sql)){
                                    
                                }
                                else {
                                    echo "Record Not Succesful";
                                }
                            }
                            $conn->close();
                        }
                        ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table display" style="width:100%">
                                    <?php
                                    function pub4($data1,$data2){
                                        include '../../backend_data/init.php';
                                        $session = $_POST['session'];
                                        $class = $_POST['class'];
                                        $newdata = "SELECT * FROM `exam_result` WHERE user_id = '$data1' ";
                                        $resulte = $conn->query($newdata);
                                        if ($resulte->num_rows > 0) {
                                            // output data of each row
                                            while($row = $resulte->fetch_assoc()) {
                                                $english = $row['English3'];
                                                $maths = $row['Mathematics3'];
                                                $science = $row['Science3'];
                                                $biology = $row['Biology3'];
                                                $physics = $row['Physics3'];
                                                $chemistry= $row['Chemistry3'];
                                                $computer = $row['Computer3'];
                                                $attitude = $row['attitude'];
                                                $behaviour = $row['behaviour'];
                                                $attendance = $row['attendance'];
                                                $qmale = $row["Qur'an (Male)3"];
                                                $qfemale = $row["Qur'an (Female)3"];
                                                $arabic = $row["Arabic (Advanced)3"];
                                                $data = $row["Qaida Al - Nooraniyya3"];
                                            }
                                            return "<a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#exampleMod1".$data1."'>Update Result</a>
                                            </div>
                                        </div>
                                    </td> 
                                    </tr>
                                    <div class='modal fade' id='exampleMod1".$data1."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleMod1".$data1."Label'>Update ".$data2." Score</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                        <form method='POST'>
                                        <input type='hidden' name='id' value='".$data1."'>
                                        <input type='hidden' name='session' value='".$session."'>
                                        <input type='hidden' name='class' value='".$class."'>
                                        <div class='mb-3'>
                                            <label class='form-label'>English</label>
                                            <input type=text' name='english' class='form-control' value='".$english."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Mathematics</label>
                                            <input type=text' name='math' class='form-control' value='".$maths."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Chemistry</label>
                                            <input type=text' name='chemistry' class='form-control' value='".$chemistry."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Biology</label>
                                            <input type=text' name='biology' class='form-control' value='".$biology."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Physics</label>
                                            <input type=text' name='physics' class='form-control' value='".$physics."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Science</label>
                                            <input type=text' name='science' class='form-control' value='".$science."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qur'an (Male)</label>
                                            <input type=text' name='quranmale' class='form-control' value='".$qmale."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qur'an (Female)</label>
                                            <input type=text' name='quranfemale' class='form-control' value='".$qfemale."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Arabic (Advanced)</label>
                                            <input type=text' name='arabicadvanced' class='form-control' value='".$arabic."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qaida Al - Nooraniyya</label>
                                            <input type=text' name='qaida' class='form-control' value='".$data."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Computer</label>
                                            <input type=text' name='computer' class='form-control' value='".$computer."'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Attitude</label>
                                            <textarea name='attitude' class='form-control'>".$attitude."</textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Behaviour</label>
                                            <textarea name='behaviour' class='form-control'>".$behaviour."</textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Attendance</label>
                                            <textarea name='attendance' class='form-control'>".$attendance."</textarea>
                                        </div>
                                        <button type='submit' class='btn btn-primary' name='update-button3'>Submit</button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>";
                                        }
                                        else{
                                            return "<a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#exampleMod".$data1."'>Upload Result</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td> 
                                    </tr>
                                    <div class='modal fade' id='exampleMod".$data1."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleMod".$data1."Label'>".$data2." Score</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                        <form method='POST'>
                                        <input type='hidden' name='session' value='".$session."'>
                                        <input type='hidden' name='class' value='".$class."'>
                                        <input type='hidden' name='id' value='".$data1."'>
                                        <div class='mb-3'>
                                            <label class='form-label'>English</label>
                                            <input type=text' name='english' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Mathematics</label>
                                            <input type=text' name='math' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Chemistry</label>
                                            <input type=text' name='chemistry' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Biology</label>
                                            <input type=text' name='biology' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Physics</label>
                                            <input type=text' name='physics' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Science</label>
                                            <input type=text' name='science' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qur'an (Male)</label>
                                            <input type=text' name='quranmale' class='form-control'>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qur'an (Female)</label>
                                            <input type=text' name='quranfemale' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Arabic (Advanced)</label>
                                            <input type=text' name='arabicadvanced' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Qaida Al - Nooraniyya</label>
                                            <input type=text' name='qaida' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Computer</label>
                                            <input type=text' name='computer' class='form-control' >
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Attitude</label>
                                            <textarea name='attitude' class='form-control'></textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Behaviour</label>
                                            <textarea name='behaviour' class='form-control'></textarea>
                                        </div>
                                        <div class='mb-3'>
                                            <label class='form-label'>Attendance</label>
                                            <textarea name='attendance' class='form-control' ></textarea>
                                        </div>
                                        <button type='submit' class='btn btn-primary' name='button3'>Submit</button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>";
                                        }
                                    }
                include '../../backend_data/init.php';

                $sql = "SELECT * FROM `users` WHERE class = '$class'";
                $query = mysqli_query($conn,$sql);
                 if($query){
                     if(mysqli_num_rows($query) > 0){
                         
                         $output = "<thead>
                         <tr>
                             <th>Names</th>
                             <th>Class</th>
                             <th>English</th>
                             <th>Mathematics</th>
                             <th>Science</th>
                             <th>Chemistry</th>
                             <th>Biology</th>
                             <th>Physics</th>
                             <th>Qur'an (Male)</th>
                             <th>Qur'an (Female)</th>
                             <th>Arabic (Advanced)</th>
                             <th>Qaida Al - Nooraniyya</th>
                             <th>Computer</th>
                             <th>Attitude</th>
                             <th>Behaviour</th>
                             <th>Attendance</th>
                             <th>Action</th>
                         </tr>
                     </thead><tbody>";
                     while($row = mysqli_fetch_assoc($query)){
                         
                         $output .="<tr>
                         <td>".$row['name']."</td>
                         <td>".$row['class']."</td>
                         <td>".pub('English3',$row['id'])."</td>
                         <td>".pub('Mathematics3',$row['id'])."</td>
                         <td>".pub('Science3',$row['id'])."</td>
                         <td>".pub('Chemistry3',$row['id'])."</td>
                         <td>".pub('Biology3',$row['id'])."</td>
                         <td>".pub('Physics3',$row['id'])."</td>
                         <td>".pub('Qur\'an (Male)3',$row['id'])."</td>
                         <td>".pub('Qur\'an (Female)3',$row['id'])."</td>
                         <td>".pub('Arabic (Advanced)3',$row['id'])."</td>
                         <td>".pub('Qaida Al - Nooraniyya3',$row['id'])."</td>
                         <td>".pub('Computer3',$row['id'])."</td>
                         <td>".pub('attitude',$row['id'])."</td>
                         <td>".pub('behaviour',$row['id'])."</td>
                         <td>".pub('attendance',$row['id'])."</td>
                         <td class='text-end'> 
          				<div class='dropdown'>
          					<a href='#' data-bs-toggle='dropdown' class='btn btn-light'> <i class='material-icons md-more_horiz'></i> </a> 
          					<div class='dropdown-menu'>
                              ".pub4($row['id'], $row['name'])."
                         ";
                     }
                 }else{
                     $output = '<b>You do not have any Students In this Class</b>';
                 }
                 echo $output."</tbody>";
                 }
                
                ?>
                                </table>
                            </div> <!-- table-responsive end// -->
                        </div> <!-- card-body end// -->
                    </div>




                </div>
            </div>
            <!-- card end// -->


        </section> <!-- content-main end// -->
    </main>

    <script type="text/javascript">
        if (localStorage.getItem("darkmode")) {
            var body_el = document.body;
            body_el.className += 'dark';
        }
    </script>
    <script type="text/javascript" src="../../assets/js/custom.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../../assets/datatables.min.js"></script>
    <script src="../../assets/js/script.js?v=1.0" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>

</html>