<?php
session_start();
include 'init.php';
  $name = $email = $username = $password = '';
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_FILES['image']) && !empty(test_input($_POST['question'])) && !empty(test_input($_POST['a'])) && !empty(test_input($_POST['b'])) && !empty(test_input($_POST['c'])) && !empty(test_input($_POST['d']))){
      $question = test_input($_POST['question']);
      $a = test_input($_POST['a']);
      $b = test_input($_POST['b']);
      $c = test_input($_POST['c']);
      $d = test_input($_POST['d']);
      $exam_id = test_input($_POST['id']);
      $hint = test_input($_POST['hint']);
      $answer = test_input($_POST['answer']);
      $images = $_FILES['image']['name'];
      $target_dir = "../assets/media/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $allowedImgExt = array("jpg","jpeg","png");
      if(in_array($imageFileType,$allowedImgExt)){
        $EncodedImg = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
        $image = 'data:image/'.$imageFileType.';base64,'.$EncodedImg;
      $insertdetails = "INSERT INTO `mcq_question`( `question`, `question_image`, `exam_id`,
        `solution`, `option_A`, `option_B`, `option_C`, `option_D`, `hint`, `no_reported`, `answer`) 
       VALUES ('$question','$image','$exam_id','','$a','$b','$c','$d','$hint',0,'$answer')";
        if($conn->query($insertdetails)){
          header('Location:../exam_question.php?id='.$exam_id);
        }
        else{
          echo "Record Not Succesful";
        }
      $conn->close();
      
    }
    else if(!empty(test_input($_POST['question'])) && !empty(test_input($_POST['a'])) && !empty(test_input($_POST['b'])) && !empty(test_input($_POST['c'])) && !empty(test_input($_POST['d']))){
      $question = test_input($_POST['question']);
      $a = test_input($_POST['a']);
      $b = test_input($_POST['b']);
      $c = test_input($_POST['c']);
      $d = test_input($_POST['d']);
      $exam_id = test_input($_POST['id']);
      $hint = test_input($_POST['hint']);
      $answer = test_input($_POST['answer']);
     
      $insertdetails = "INSERT INTO `mcq_question`( `question`, `question_image`, `exam_id`,
        `solution`, `option_A`, `option_B`, `option_C`, `option_D`, `hint`, `no_reported`, `answer`) 
       VALUES ('$question','','$exam_id','','$a','$b','$c','$d','$hint',0,'$answer')";
        if($conn->query($insertdetails)){
          header('Location:../exam_question.php?id='.$exam_id);
        }
        else{
          echo "Record Not Succesful";
        }
      $conn->close();
    }
    
    else {
      header('Location:../exam_question.php?id='.$exam_id);
    }
  }
}

?>