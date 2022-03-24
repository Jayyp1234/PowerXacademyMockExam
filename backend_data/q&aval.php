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
    if(!empty(test_input($_POST['title'])) && !empty(test_input($_POST['body'])) && !empty(test_input($_POST['categories'])) && !empty(test_input($_POST['tags'])) ){
      $title = test_input($_POST['title']);
      $body = test_input($_POST['body']);
      $categories = test_input($_POST['categories']);
      $tags = test_input($_POST['tags']);
      $time_posted = date("h:i a").$_POST["time"];
      $author = $_SESSION['username'];
      $tags = $_POST['tags'];
      $images = $_FILES['image']['name'];
      $target_dir = "../assets/media/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $allowedImgExt = array("jpg","jpeg","png");
      if(in_array($imageFileType,$allowedImgExt)){
        //basically after checking if image gtpetis in allowed ext...
        //then u encode it in base64... 
        $EncodedImg = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
        //actuall image...
        $image = 'data:image/'.$imageFileType.';base64,'.$EncodedImg;
        //if(move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$images)){
          //echo "wahala deh";
        //};
      $insertdetails = "INSERT INTO `q&a`(`question_id`, `question_title`, `question_category`, `question_author`, `question_content`, `posted_date`,
           `question_image`, `question_comment_count`, `question_views`, `question_tags`, `question_track`) VALUES
           ('','$title','$categories','$author','$body', '$time_posted','$image',0,0,'$tags','')";
        if($conn->query($insertdetails)){
          header('Location:../Q&A.php');
        }
        else{
          echo "Record Not Succesful";
        }
      $conn->close();
    }
    else {
      header('Location:../Q&A.php');
    }
  }
}

?>