<?php 
include 'init.php';

$userId = $_POST['userId'];

$time = time() + 5;

$sql = "UPDATE registable set lastActivity = '$time', userstatus = 1 where id = '$userId' ";
$query = mysqli_query($conn,$sql);
