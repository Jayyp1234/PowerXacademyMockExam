<?php

include 'init.php';

$sql = " SELECT * from registable ";

$query = mysqli_query($conn,$sql);

if ($query) {
   $hey =  json_encode($query);
   echo $hey;
}