<?php
include 'init.php';
include 'functions.php';

$sql = "SELECT * FROM registable ORDER BY userstatus DESC ";
$query = mysqli_query($conn,$sql);

$currentTime = time();
if($query){
    while($row = mysqli_fetch_assoc($query)){
      if ($row['id'] != 1) {
        if ($currentTime < $row['lastActivity']) {
            echo "
            <li id='".$row['id']."' name='".$row['name']."' department=".$row['department']." class='list-group-item d-flex justify-content-between align-items-center' style='padding: .275rem 0.55rem;font-size: 14px;font-weight: 600;color: grey;'>
            ".$row['name']." <span style='font-size: 13px;
            font-weight: 100;'> ".mb_strimwidth($row["department"], 0, 20, "...")."</span>
      <span class='badge badge-success badge-pill'> </span>
     </li>
            ";
        }else{
            if (!($currentTime - $row['lastActivity'] > 2 * 60 )) {
                echo "
            <li id='".$row['id']."' name='".$row['name']."' department=".$row['department']." class='list-group-item d-flex justify-content-between align-items-center' style='padding: .275rem 0.55rem;font-size: 14px;font-weight: 600;color: grey;'>
            ".$row['name']." <span style='font-size: 13px;
            font-weight: 100;'> ".mb_strimwidth($row["department"], 0, 20, "...")."</span>
            ".check_user_status($conn,$row['lastActivity'],$row['id'])."</li>  
            ";
            }
            
        }
      }
      
    }
    
};
/*
<span class='badge badge-danger badge-pill'> ".check_user_status($row['lastActivity'])." </span>

<li class="list-group-item d-flex justify-content-between align-items-center" style="padding: .275rem 0.55rem;font-size: 14px;font-weight: 600;color: grey;">
      Okeke Johnpaul
      <span class="badge badge-success badge-pill"> </span>
    </li>
*/