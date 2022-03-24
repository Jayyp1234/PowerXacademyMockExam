<?php
include 'init.php';
 $id = $_POST["id"];
 $sql = "UPDATE `questions` SET `no_reported`='1' WHERE id = '$id';";
 $QUERY = mysqli_query($conn,$sql);   
 if ($QUERY) {
    echo 'Reported';
 }
 else{
     echo 'Error';
 }

?>