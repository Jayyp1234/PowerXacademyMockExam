<?php
function posts($page_num) {

    $Per_Page =10;
    if (isset($page_num)) {
        $page_num = $page_num;
    } else {
        $page_num = 1;
    }

    $Page_Start = ($page_num - 1) * $Per_Page;
    include 'init.php';
    $query = $conn->query("SELECT * FROM q&a ORDER BY id DESC LIMIT $Page_Start,$Per_Page");
    return $query;
}
?>

<?php 
if (isset($_POST['page_num'])){
    $query = posts($_POST['page_num']);
    if ($query->num_rows > 0) {
      // output data of each row
      while($row = $query->fetch_assoc()) {
        echo '
          <div class="question-container">
      <div class="question-frame">
        <span class="small-data">'.$row["question_views"].' views</span><span class="small-data">'.$row["question_comment_count"].' answers</span>
        <a href="#"> <h6 class="question-title">'.$row["question_title"].'</h6> </a>
        <span class="question-body">'.$row["question_content"].'</span>
      </div>
      <div class="question-content">
        <div class="question-tag">
          <span class="tag" style="display:none;">'.$row["question_tags"].'</span>
        </div>
        <div class="question-info">
          <img src="assets/images/pngkey.com-linea-punteada-png-4149828.png" width="40px" height="40px" style="border-radius: 3px;border:0.2px solid #b7babd;margin-right: 5px;">
          <div>
            <span style="color: #6a737c;font-size: 12px;">'.$row["posted_date"].'</span><br>
            <span style="color: #569cd2;font-size: 12px;">'.$row["question_author"].'</span>
          </div>
        </div>
      </div>
      <hr>
          </div>
        ';
      }
    } 
    else {
      echo "";
    }
} 







?>




