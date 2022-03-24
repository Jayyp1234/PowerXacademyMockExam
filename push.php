<?php
session_start();
include 'backend_data/init.php';


function score($data){
    $newScores;$oldScore;$newdata;$newChap;
    $chapterId = $_POST['chapterid'];
    if($data === ""){
      $newdata = $_POST['score'].',';
      $newChap = "";
    }
    elseif(is_string($data)){
        $newScores = $_POST['score'];
        $scoresArray = explode(',',$data);
         $oldScore =  $scoresArray[$chapterId - 1];
         if($newScores > $oldScore){
            $newChap = "";
            $scoresArray[$chapterId - 1] = $newScores;
         }else {
            $newChap = ",";
            $scoresArray[$chapterId - 1] = $oldScore;
         };
            $newdata = implode(',',$scoresArray);
            $newdata .= $newChap;
    };
    return $newdata;
};
function completed($data){
    $scoresArray = explode(',',$data);
    $length = count($scoresArray);
      return $length;

}
if(isset($_POST['score']) && isset($_POST['courseid'])){
    $userId = $_SESSION['user_id'];
    $score = $_POST['score'];
    $courseId = $_POST['courseid'];
    $chapterId = $_POST['chapterid'];
    $sql = "SELECT * FROM course_activity where user_id = $userId and course_id = $courseId ";
   
    $query = mysqli_query($conn,$sql);
    if($query){
        $userData = mysqli_fetch_assoc($query);
        $completedModuleStatus = $userData['completed'];
        $completedModuleScore = $userData['scores'];
        $userScores = score($userData['scores']);
        $newcompletedMoudleStatus = completed($userScores);
        $newsql= "UPDATE `course_activity` SET `completed`='$newcompletedMoudleStatus',`scores`='$userScores' WHERE user_id='$userId' AND course_id='$courseId' ";
        mysqli_query($conn,$newsql);
        echo $userScores;
        echo $newcompletedMoudleStatus;
    }
}
elseif (isset($_POST['Score'])) {
     function check($key){
        include 'backend_data/init.php';
        $string = '';
        $newdata = "SELECT * FROM `challenge` WHERE `unique_key`='".$key."' ";
        $resulte = $conn->query($newdata);
        if ($resulte->num_rows > 0) {
            while($row = $resulte->fetch_assoc()) {
                $string = $row['status'];
            }
        }
        return $string;
    }
    if(check($_POST['unique_key']) !== 'Pending'){
        $newdata = "UPDATE `challenge` SET `challengee_score`='".$_POST['Score']."' WHERE unique_key = '".$_POST['unique_key']."' ";
        $resulte = $conn->query($newdata);
        if($resulte){
            echo "Done";
        }
        else{
            echo "Error";
        }
    }
    else{
        $newdata = "UPDATE `challenge` SET `challenger_score`='".$_POST['Score']."' WHERE unique_key = '".$_POST['unique_key']."' ";
        $resulte = $conn->query($newdata);
        if($resulte){
            echo "Done Chall";
        }
        else{
            echo "Error";
        }
    }
}
else {
    echo 'no posted d';
}