<?php 
include 'init.php';
if (isset($_POST['id'])){
    $dhh = $_POST['id'];
    $sql = "SELECT * FROM `questions` WHERE id = $dhh";
    $resulte = $conn->query($sql);
    function checkimage($image){
        $allowedExt = ['img','jpeg','jpg','png'];
        $data= '';
        if(!empty($image)){
            $imgSplit = explode('.',$image);
        $imgExt = end($imgSplit);
        if(in_array($imgExt,$allowedExt)){
         $data = ' <div class="image-question" style="height: 80px;display: flex;justify-content: center;">
            <img src="assets/images/integration/'.$image.'" >
        </div>';
        }
        else {
            $data = '';
        }
    
        }
       
        
        return $data;
    }
    if ($resulte->num_rows > 0) {
      // output data of each row
      while($row = $resulte->fetch_assoc()) {
        echo ' '.$row['question_type'].'
        '.checkimage($row["question_image"]).'
        <div class="preview">
        <span class="data_question" style="font-size: 13px;
        line-height: 16px;
        display: block;">'.$row["question"].'</span>
        <ul class="options" style="padding-left: 0px;">
            <li>
                <b>A</b> <span class="data_optiona"> '.$row["option_A"].' </span>
            </li>
            <li>
                <b>B</b> <span class="data_optionb" > '.$row["option_B"].' </span>
            </li>
            <li>
                <b>C</b> <span class="data_optionc"> '.$row["option_C"].' </span>
            </li>
            <li>
                <b>D</b> <span class="data_optiond"> '.$row["option_D"].' </span>
            </li>
            <b>Answer: <span class="data_answer"> '.$row["answer"].'</span> </b>
            <span style="font-size: 13px;
            line-height: 16px;
            display: block;" class="data_solution">'.$row["solution"].' </span>
        </ul>
       </div>
       <hr style="border-top:1px solid rgb(29 26 26 / 35%);>
       <div class="form-box">
            <form action="backend_data/updateques.php" class="updata" method="POST">
                <input type="hidden" value="'.$row["id"].'" name="id"/>
                <small>Question</small>
                <textarea name="question" class="input_question"> '.$row["question"].' </textarea>
                <small>Option A</small>
                <input type="text" name="optiona" class="input_optiona" value="'.$row["option_A"].'"/>
                <small>Option B</small>
                <input type="text" name="optionb" class="input_optionb" value="'.$row["option_B"].'"/>
                <small>Option C</small>
                <input type="text" name="optionc" class="input_optionc" value="'.$row["option_C"].'"/>
                <small>Option D</small>
                <input type="text" name="optiond" class="input_optiond" value="'.$row["option_D"].'"/>
                <small>Answer</small>
                <input type="text" name="answer" class="input_answer" value="'.$row["answer"].'"/>
                <small>Solution</small>
                <input type="text" name="solution" class="input_solution" value="'.$row["solution"].'"/>
            </form>
       </div>
        ';
      }
    } 
    else {
      echo "";
    }
} 







?>