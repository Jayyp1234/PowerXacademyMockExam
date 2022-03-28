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
	<title>Admin Dashboard</title>
	<meta content="PowerXacademyMockExam is an award winning unified learning platform that includes a learning management system (LMS), it helps you to manage your school mock exams in a better way." name="description">
  	<meta content="mock,exam,online,dashboard,admin" name="keywords">
    <link rel="icon" href="img/logo.jpeg" type="image/jpeg">
  	<!--icons link-->
  	<link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css.map">
    <link rel="preload" href="/fonts/OpenSans-Regular.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="/fonts/OpenSans-SemiBold.ttf" as='font' crossorigin='anonymous'>
    <link rel="preload" href="/fonts/OpenSans-Bold.ttf" as='font' crossorigin='anonymous'>
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <link href="assets/css/form.css" rel="stylesheet">
</head>
<style type="text/css">
  .nav-pills .nav-link {
    font-size: 13px;
    border-radius: 0.25rem;
    font-family: 'Open Sans SemiBold';
    background-color:white;
    margin-right:7px;
    white-space:nowrap;
    margin-bottom:7px;
    color:#408e3a;
}.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff !important;
    background-color: #408e3a !important;
}.nav-link.active:focus{
  border:none !important
}.nav-link.active:focus {
    border: none !important;
    outline: none !important;
}@media all and (max-width:750px){
  .d-flex {
    display: grid !important;
}.mm{
  flex-direction: row!important;
}
}.px-3{
  font-family: 'Open Sans Semibold';
    font-size: 15px;
    text-transform: uppercase;
}.tab-content{
  width:calc(100% - 20px);
}
@media all and (max-width:750px){
  .tab-content{
  width:calc(100%);
}
}table td{
  font-weight: 500;
font-size: 14px;
line-height: 16px;
color: #393939;
font-family: system-ui;
}table td ul li{
  margin-bottom:4px;
}
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
                echo '<li><a href="admin.php"><i class="icon-dashboard"></i><span> Admin Dashboard</span> </a></li>
                      <li class="active"><a href="create_exam.php"><i class="icon-question"></i><span> Create Exam</span> </a></li>
                      <li><a href="exams.php"><i class="icon-book"></i><span> Exams</span> </a></li>
                ';
              }
            ?>
            <li><a href="dashboard.php"><i class="icon-dashboard"></i><span> Dashboard</span> </a></li>
            <li><a href="backend_data/logout.php"> <i class="icon-power-off"> </i> <span> Log out </span> </a></li>
        </ul>
        <br>
    </nav>
    <main style="margin-right:5px;">
        <div class="intro-div">
            <b>Create Exam</b>
            <span id="time" class="time"></span>
        </div>
        <br>
            
        <div class="d-flex align-items-start">
  <div class="nav flex-column mm nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Insert Questions</button>
    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Edit Questions</button>
    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Preview</button>
    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
  </div>
  <div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <h6 class="text-center px-3">Insert Questions</h6>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Mulitple Choice Question</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Fill in the Gaps</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Compare the Answers</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <form method="POST" enctype="multipart/form-data" action="backend_data/uploadques.php" class="container-fluid" style="background-color:white;border-radius:20px;">
                <div class="row">
                <div class="col-md-12">
                <div class="mb-3">
                    <label>Question</label>
                    <input type="text" name="question" id="exampleInputEmail1" placeholder="Question">
                </div>
                <div class="mb-4">
				        	<label class="form-label">Question Image (optional)</label>
				        	<input class="form-control" name="image" type="file">
				        </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <label>Option A</label>
                    <input type="text" name="a" id="exampleInputEmail1" placeholder="Option A">
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <label>Option B</label>
                    <input type="text" name="b" id="exampleInputEmail1" placeholder="Option B">
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <label>Option C</label>
                    <input type="text" name="c" id="exampleInputEmail1" placeholder="Option C">
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <label>Option D</label>
                    <input type="text" name="d" id="exampleInputEmail1" placeholder="Option D">
                </div>
                </div>
                <div class="col-md-12">
                <div class="mb-3">
                    <label>Answer</label>
                    <input type="text" name="answer" id="exampleInputEmail1" placeholder="Answer">
                </div>
                </div>
                <div class="col-md-12">
                <div class="mb-3">
                    <label>Hint(optional)</label>
                    <textarea placeholder="Hint"></textarea>
                </div>
                </div>
                <input type="hidden" name="id" value=<?php echo $_GET["id"] ?> />
                <button type="submit" class="btn">Submit</button>
                </div>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
        </div>
    </div>
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">gbndrtgfv</div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
      <div class="container-fluid" style="background-color:white;border-radius:20px;">
          <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col">Question</th>
              <th scope="col">Image</th>
              <th scope="col">Options</th>
              <th scope="col">Answer</th>
              <th scope="col">Hint</th>
            </tr>
          </thead>
          <tbody>
          <?php
                include 'backend_data/init.php';
                $newdata = "SELECT * FROM `mcq_question` WHERE exam_id =".$_GET['id'];
                $resulte = $conn->query($newdata);
                 function image($data){
                  if ($data == ''){
                    return '';
                  }
                  else{
                    return '<img width="100px" height="auto" src="'.$data.'" alt="'.$data.'" />';
                  }
                }
                if ($resulte->num_rows > 0) {
                // output data of each row

                while($row = $resulte->fetch_assoc()) {
                  echo '
                <tr>
                  <td>'.$row['question'].' </td>
                  
                  <td> 
                  '.image($row['question_image']).'
                  </td>
                  <td>
                  <ul>
                  <li> A. '.$row['option_A'].'</li>
                  <li> B. '.$row['option_B'].'</li>
                  <li> C. '.$row['option_C'].'</li>
                  <li> D. '.$row['option_D'].'</li>
                  </ul>
                  </td>
                  <td>'.$row['answer'].'</td>
                  <td>'.$row['hint'].'</td>
                </tr>
                ';
                }
              }else{
                echo  '';
              }
            ?>
            
            
            
          </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
  </div>
</div>
    </main>
</body>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

<script>
    var d = new Date();
    document.getElementById("time").innerHTML = d.toDateString();
</script>
</html>
