<?php
include 'init.php';
 $id = $_POST["id"];
 $question = $_POST["question"];
 $a = $_POST["optiona"];
 $b = $_POST["optionb"];
 $c = $_POST["optionc"];
 $d = $_POST["optiond"];
 $answer = $_POST["answer"];
 $solution = $_POST["solution"];
 $sql = "UPDATE `questions` SET `question`='$question',`option_A`='$a',`option_B`='$b',`option_C`='$c',`option_D`='$d',`answer`='$answer',`solution`='$solution',`no_reported`='0' WHERE id = '$id';";
 $QUERY = mysqli_query($conn,$sql);   
 
 if ($QUERY) {
    header('Location:../admin.php');
 }

