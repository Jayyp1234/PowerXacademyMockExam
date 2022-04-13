<?php
    ob_start();
    ?>
<html>
	<head>
		<meta charset="utf-8">
		<title>PowerX Online Academy - Exam Result PDF</title>
        <link rel="icon" href="../../assets/image/icon.png" type="type/png">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<link rel="stylesheet" href="../../assets/fonts/icomoon/style.css">
		<style>
		/* reset */
*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}

/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }

/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 71%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td {     border-color: #DDD;
    font-weight: 500;
    font-family: system-ui;}

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
header{
    display: flex;
    justify-content:center;
}.session{
    height:35px;
    margin-top:10px;
    background-color:hsl(23deg 100% 50%);
    color: white;
    font-size: 20px;
    letter-spacing: 1.5px;
    text-align: center;
    display: flex;
    align-items: center;
    font-family: system-ui;
    justify-content: center;
    font-weight: 600;
}main{
    padding: 8px 30px;
}td.active{
    background-color:hsl(0deg 0% 85%);
    vertical-align:middle;
}footer{
    height: 60px;
    justify-content: space-evenly;
    background-color: green;
    display: flex;
    color: white;
    font-weight: 400;
    font-family: system-ui;
}
footer span{
    display: flex;
    align-items: baseline;
    margin-top: 10px;
}
footer span i{
    margin-right:5px;
}
</style>
<?php
            if(isset($_POST['class']) && isset($_POST['name']) && isset($_POST['session'])){
                include '../../backend_data/init.php';
                $id = $_POST['name'];
                $tenure = $_POST['session'];
                $class = $_POST['class'];
                $sql = "SELECT * FROM `exam_result` INNER JOIN `users` ON exam_result.user_id = users.id WHERE `user_id` = '$id' and `tenure` = '$tenure' ";
                $query = mysqli_query($conn,$sql);
                if($query){
                    if(mysqli_num_rows($query) > 0){
                        while($row = mysqli_fetch_assoc($query)){
                            $key = $row['student_id'];
                            $class = $row['class'];
                            $name = $row['name'];
                            $date = date('d, M Y');
                            $english = $row['English'];
                            $maths = $row['Mathematics'];
                            $science = $row['Science'];
                            $biology = $row['Biology'];
                            $physics = $row['Physics'];
                            $chemistry= $row['Chemistry'];
                            $computer = $row['Computer'];
                            $qmale = $row["Qur'an (Male)"];
                            $qfemale = $row["Qur'an (Female)"];
                            $arabic = $row["Arabic (Advanced)"];
                            $data = $row["Qaida Al - Nooraniyya"];
                            
                            $english2 = $row['English2'];
                            $maths2 = $row['Mathematics2'];
                            $science2 = $row['Science2'];
                            $biology2 = $row['Biology2'];
                            $physics2 = $row['Physics2'];
                            $chemistry2 = $row['Chemistry2'];
                            $computer2 = $row['Computer2'];
                            $qmale2 = $row["Qur'an (Male)2"];
                            $qfemale2 = $row["Qur'an (Female)2"];
                            $arabic2 = $row["Arabic (Advanced)2"];
                            $data2 = $row["Qaida Al - Nooraniyya2"];

                            $english3 = $row['English3'];
                            $maths3 = $row['Mathematics3'];
                            $science3 = $row['Science3'];
                            $biology3 = $row['Biology3'];
                            $physics3 = $row['Physics3'];
                            $chemistry3 = $row['Chemistry3'];
                            $computer3 = $row['Computer3'];
                            $qmale3 = $row["Qur'an (Male)3"];
                            $qfemale3 = $row["Qur'an (Female)3"];
                            $arabic3 = $row["Arabic (Advanced)3"];
                            $data3 = $row["Qaida Al - Nooraniyya3"];
                            $attendance = $row["attendance"];
                            $attitude = $row["attitude"];
                            $behaviour = $row["behaviour"];
                        }
                    }
                    else{
                        header('Location:./generate.php');
                        ob_end_flush();
                    }
                }
            }
            else{
                header('Location:./generate.php');
                ob_end_flush();
            }
        ?>
	</head>
	<body>
        <br>
	<header>
        <img src="logo.jpg"/>
    </header>
	<div class="session"><?php echo $_POST['session']; ?></div>
    <main>
        <table>
            <tr>
                <td class="active">Student Name</td>
                <td> <?php echo $name; ?> </td>
                <td class="active">Admission No</td>
                <td>000<?php echo $_POST['name']; ?></td>
            </tr>
            <tr>
                <td class="active">Student ID</td>
                <td><?php echo $key; ?></td>
                <td class="active">Class</td>
                <td> <?php echo $class; ?> </td>
            </tr>
        </table>
        <br>
        <?php
            if ($english2 == 0 && $maths2 == 0 && $science2 == 0 && $biology2 == 0 && $physics2 == 0 && $chemistry2 == 0 && $computer2 == 0 && $qmale2 == 0 && $qfemale2 == 0 && $arabic2 == 0 && $data2 == 0){
                function string2($data){
                    if ($data == 0){
                        return '';
                    }
                    else {
                        return $data;
                    }
                }
            }
            else{
                function string2($data){
                    return $data;
                }
            }
        ?>
        <?php
            if ($english3 == 0 && $maths3 == 0 && $science3 == 0 && $biology3 == 0 && $physics3 == 0 && $chemistry3 == 0 && $computer3 == 0 && $qmale3 == 0 && $qfemale3 == 0 && $arabic3 == 0 && $data3 == 0){
                function string3($data){
                    if ($data == 0){
                        return '';
                    }
                    else {
                        return $data;
                    }
                }
            }
            else{
                function string3($data){
                    return $data;
                }
            }
            function total($data,$data2,$data3){
                if ($data2 == '' && $data3 == ''){
                    return $data;
                }
                else if ($data2 == ''){
                    return intval(($data + intval($data2) + intval($data3))/2);
                }
                else if ($data3 == ''){
                    return intval(($data + intval($data2) + intval($data3))/2);
                }
                else{
                    return intval(($data + intval($data2) + intval($data3))/3);
                }
            }function grade($data){
                if ($data <= 31){
                    return 'U';
                }
                else if ($data >= 32 && $data <= 40){
                    return 'G';
                }
                else if ($data >= 41 && $data <= 49){
                    return 'F';
                }
                else if ($data >= 50 && $data <= 58){
                    return 'E';
                }
                else if ($data >= 59 && $data <= 67){
                    return 'D';
                }
                else if ($data >= 68 && $data <= 76){
                    return 'C';
                }
                else if ($data >= 77 && $data <= 85){
                    return 'B';
                }
                else if ($data >= 86 && $data <= 94){
                    return 'A';
                }
                else{
                    return 'A*';
                }
            }
        ?>
        <table>
            <tr style="height:39px;"> 
                <td class="active">SUBJECTS</td>
                <td class="active">1st Term Score (%)</td>
                <td colspan="1" class="active">2nd Term Score (%)</td>
                <td colspan="1" class="active">3rd Term Score (%)</td>
                <td colspan="1" class="active">Final Overall Score</td>
                <td colspan="1" class="active">Grade</td>
            </tr>
            <tr>
                <td>Mathematics</td>
                <td><?php echo $maths ?></td>
                <td><?php echo string2($maths2); ?></td>
                <td><?php echo string3($maths3); ?></td>
                <td><?php echo total($maths,string2($maths2),string3($maths3)); ?></td>
                <td><?php echo grade(total($maths,string2($maths2),string3($maths3))); ?></td>
            </tr>
            <tr>
                <td>English</td>
                <td><?php echo $english ?></td>
                <td><?php echo string2($english2); ?></td>
                <td><?php echo string3($english3); ?></td>
                <td><?php echo total($english,string2($english2),string3($english3)); ?></td>
                <td><?php echo grade(total($english,string2($english2),string3($english3))); ?></td>
            </tr>
            <tr>
                <td>Chemistry</td>
                <td><?php echo $chemistry ?></td>
                <td><?php echo string2($chemistry2); ?></td>
                <td><?php echo string3($chemistry3); ?></td>
                <td><?php echo total($chemistry,string2($chemistry2),string3($chemistry3)); ?></td>
                <td><?php echo grade(total($chemistry,string2($chemistry2),string3($chemistry3))); ?></td>
            </tr>
            <tr>
                <td>Physics</td>
                <td><?php echo $physics ?></td>
                <td><?php echo string2($physics2); ?></td>
                <td><?php echo string3($physics3); ?></td>
                <td><?php echo total($physics,string2($physics2),string3($physics3)); ?></td>
                <td><?php echo grade(total($physics,string2($physics2),string3($physics3))); ?></td>
            </tr>
            <tr>
                <td>Biology</td>
                <td><?php echo $biology ?></td>
                <td><?php echo string2($biology2); ?></td>
                <td><?php echo string3($biology3); ?></td>
                <td><?php echo total($biology,string2($biology2),string3($biology3)); ?></td>
                <td><?php echo grade(total($biology,string2($biology2),string3($biology3))); ?></td>
            </tr>
            
            <tr>
                <td>Science</td>
                <td><?php echo $science ?></td>
                <td><?php echo string2($science2); ?></td>
                <td><?php echo string3($science3); ?></td>
                <td><?php echo total($science,string2($science2),string3($science3)); ?></td>
                <td><?php echo grade(total($science,string2($science2),string3($science3))); ?></td>
            </tr>

            <tr>
                <td>Qu'ran (Male)</td>
                <td><?php echo $qmale ?></td>
                <td><?php echo string2($qmale2); ?></td>
                <td><?php echo string3($qmale3); ?></td>
                <td><?php echo total($qmale,string2($qmale2),string3($qmale3)); ?></td>
                <td><?php echo grade(total($qmale,string2($qmale2),string3($qmale3))); ?></td>
            </tr>
            <tr>
                <td>Qu'ran (Female)</td>
                <td><?php echo $qfemale ?></td>
                <td><?php echo string2($qfemale2); ?></td>
                <td><?php echo string3($qfemale3); ?></td>
                <td><?php echo total($qfemale,string2($qfemale2),string3($qfemale3)); ?></td>
                <td><?php echo grade(total($qfemale,string2($qfemale2),string3($qfemale3))); ?></td>
            </tr>
            <tr>
                <td>Arabic (Advanced)</td>
                <td><?php echo $arabic ?></td>
                <td><?php echo string2($arabic2); ?></td>
                <td><?php echo string3($arabic3); ?></td>
                <td><?php echo total($arabic,string2($arabic2),string3($arabic3)); ?></td>
                <td><?php echo grade(total($arabic,string2($arabic2),string3($arabic3))); ?></td>
            </tr>
            <tr>
                <td> Computer </td>
                <td><?php echo $computer ?></td>
                <td><?php echo string2($computer2); ?></td>
                <td><?php echo string3($computer3); ?></td>
                <td><?php echo total($computer,string2($computer2),string3($computer3)); ?></td>
                <td><?php echo grade(total($computer,string2($computer2),string3($computer3))); ?></td>
            </tr>
            <tr>
                <td style="white-space:nowrap;">Qaida Al - Nooraniyya</td>
                <td><?php echo $data ?></td>
                <td><?php echo string2($data2); ?></td>
                <td><?php echo string3($data3); ?></td>
                <td><?php echo total($data,string2($data2),string3($data3)); ?></td>
                <td><?php echo grade(total($data,string2($data2),string3($data3))); ?></td>
            </tr>
        </table>
        <table style="margin-top:10px;">
            <tr>
                <td class="active" colspan="9" style="text-align:center;">Comments</td>
            </tr>
            <tr>
                <td>A*= 95 - 100</td>
                <td>A= 86 - 94</td>
                <td>B= 77 - 85</td>
                <td>C= 68 - 76</td>
                <td>D= 59 - 67</td>
                <td>E= 50 - 58</td>
                <td>F= 41 - 49</td>
                <td>G= 32 - 40</td>
                <td>U= 0 - 31</td>
            </tr>
        </table>
        <table style="margin-top:10px;">
            <tr>
                <td class="active" style="text-align:center;">Attendance Percentage</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"> <?php echo $attendance; ?>%</td>
            </tr>
        </table>

        <table style="margin-top:10px;">
            <tr>
                <td class="active" style="text-align:center;">Attitude</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2" style="height:30px;"> <?php echo $attitude;?></td>
            </tr>
            <tr>
                <td class="active" style="text-align:center;">Behaviour</td>
                <td ></td>
            </tr>
            <tr>
                <td colspan="2" style="height:30px;"> <?php echo $behaviour; ?></td>
            </tr>
        </table>
        <div style="display:flex;justify-content:space-between;margin-top:10px;">
            <b style="font-weight:600;">Date and Stamp: <?php echo $date; ?> </b>
            <img src="sign.jpg" style="width:220px;" />
        </div>
    </main>
		<footer>
            <span><i class="icon-globe"></i>www.powerxacademy.com</span>
            <span><i class="icon-envelope-o"></i>powerxacademy@gmail.com,</span>
            <span>info@powerxacademy.com</span>
        </footer>
	</body>
<script>
    print();
</script>
</html>