<?php


function check_user_status($conn,$userLastActivity,$user){
    
    $time = time();
    $timeDiff =  $time - $userLastActivity;
    $logoutTime = '';

    $sql = "UPDATE registable set userstatus = 0 where id = '$user' ";
    $query = mysqli_query($conn,$sql);

    if ($timeDiff < 60) {
        $logoutTime ="<span class='badge badge-danger badge-pill'></span>
        ".$timeDiff."s ago";
    }elseif($timeDiff > 60 && $timeDiff < 60 * 2 - 1){
        $logoutTime = ceil($timeDiff/60)." mins ago";
        
    }else{
        $logoutTime = "<span class='badge badge-danger badge-pill'></span>";
    }
    return $logoutTime;
}


function update_status($conn,$user){
    $sql = "UPDATE registable set userstatus = 0 where id = '$user' ";
    $query = mysqli_query($conn,$sql);
};