<?php
include '../backend_data/init.php';
session_start();
ob_start();
if(!isset($_SESSION['user_id'])){
    header('location:../login/');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Power X Academy - Students Bills</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="icon" href="../assets/image/icon.png" type="type/png">
    <!--icons link-->
    <link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="preload" href="../assets/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/card.css" rel="stylesheet">
    <link href="../assets/datatables.min.css" rel="stylesheet">
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

    .menu-aside .submenu a {
        font-size: 13px;
    }

    @media (max-width: 1200px) {
        .course-info {
            height: 140px;
        }
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_processing,
    .dataTables_wrapper .dataTables_paginate {
        color: #333;
        font-size: 15px;
        font-family: system-ui;
    }

    .menu-aside .submenu a {
        font-size: 13px;
    }

    table.dataTable.stripe tbody tr.odd,
    table.dataTable.display tbody tr.odd {
        background-color: #ebf0fd;
    }

    table.dataTable.display tbody tr.odd>.sorting_1,
    table.dataTable.order-column.stripe tbody tr.odd>.sorting_1 {
        background-color: #f1f1f100;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: #fff !important;
        border: none !important;
        background-color: #23b315 !important;
        PADDING: 5PX 12PX;
        border-radius: 8px;
        background: linear-gradient(to bottom, #23b315 0%, #23b315 100%);
    }

    td {
        white-space: nowrap !important;
        color: #333;
        font-size: 15px;
        font-family: system-ui;
    }
</style>

<body>

    <b class="screen-overlay"></b>

    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="page-index-1.html" class="brand-wrap">
                <img src="../assets/image/icon-pro.png" height="46" class="logo" alt="Ecommerce dashboard template">
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i>
                </button>
            </div>
        </div> <!-- aside-top.// -->

        <nav>
            <ul class="menu-aside">
                <li class="menu-item ">
                    <a class="menu-link" href="dashboard.php"> <i class="icon material-icons md-show_chart"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="instructors.php"> <i class="icon material-icons md-person"></i>
                        <span class="text">Instructors</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="student.php"> <i class="icon material-icons md-person_outline"></i>
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
    <li class="menu-item has-submenu active"> 
      <a class="menu-link" href="card.php"> <i class="icon material-icons md-payment"></i>  
        <span class="text">Payments and Bill</span> 
      </a> 
      <div class="submenu">
        <a href="bills.php">Bills</a>
        <a href="bill_student.php">Student Bill</a>
        <a href="bill_transaction.php">Transactions</a>
      </div>
    </li>
    <li class="menu-item has-submenu "> 
      <a class="menu-link" href="card.php"> <i class="icon material-icons md-book"></i>  
        <span class="text">Results</span> 
      </a> 
      <div class="submenu">
        <a href="assement-result/generate.php">Generate Exam Results</a>
        <a href="assement-result/upload.php">Upload Exam Results</a>
        <a href='assement-result/generatem.php'>Generate Mid Term Results </a>
        <a href="assement-result/upload_mid.php">Upload Mid Term Results</a>
        
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
                    <a class="menu-link" href="../logout"> <i class="icon material-icons md-log_out"></i>
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
                    <li class="nav-item">
                        <a class="nav-link abb" href="#"> OE </a>
                    </li>

                </ul>
            </div>
        </header>
        <section class="content-main">
            <div style="display:flex;justify-content:space-between;flex-wrap:wrap;">
                <div class="content-header" style="margin-bottom:0">
                    <h4> Student Bill</h4>
                </div>
            </div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Paid</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Owing</button>
            </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="width:100%">
              <?php
                include '../backend_data/init.php';
                $sql = "SELECT * FROM users where role = 'user' and payment_status='paid' ORDER BY id DESC  ";
                $query = mysqli_query($conn,$sql);
                 if($query){
                     if(mysqli_num_rows($query) > 0){
                         
                         $output = "<thead>
                         <tr>
                         <th>Name</th>
                         <th>Class</th>
                         <th>Email</th>
                         <th>Gender</th>
                         <th>Religion</th>
                         <th>Address</th>
                         </tr>
                     </thead><tbody>";
                     while($row = mysqli_fetch_assoc($query)){
                         
                         $output .="<tr>
                         <td>".$row['name']."</td>
                         <td>".$row['class']."</td>
                         <td>".$row['email']."</td>
                         <td>".$row['gender']."</td>
                         <td>".$row['religion']."</td>
                         <td>".$row['address']."</td>
                         
                
                         </tr>";
                     }
                 }else{
                     $output = '<b>You do not have any Students</b>';
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
                <div class="card mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="display" style="width:100%">
              <?php
                include '../backend_data/init.php';
                $sql = "SELECT * FROM users where role = 'user' and payment_status !='paid' ORDER BY id DESC  ";
                $query = mysqli_query($conn,$sql);
                 if($query){
                     if(mysqli_num_rows($query) > 0){
                         
                         $output = "<thead>
                         <tr>
                             <th>Name</th>
                             <th>Class</th>
                             <th>Email</th>
                             <th>Gender</th>
                             <th>Religion</th>
                             <th>Address</th>
                         </tr>
                     </thead><tbody>";
                     while($row = mysqli_fetch_assoc($query)){
                         
                         $output .="<tr>
                         <td>".$row['name']."</td>
                         <td>".$row['class']."</td>
                         <td>".$row['email']."</td>
                         <td>".$row['gender']."</td>
                         <td>".$row['religion']."</td>
                         <td>".$row['address']."</td>
                         </tr>";
                     }
                 }else{
                     $output = '<b>You do not have any Students</b>';
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
    <script type="text/javascript" src="../assets/datatables.min.js"></script>
    <script src="../assets/js/script.js?v=1.0" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
            $('#example1').DataTable();
        });
    </script>
</body>

</html>