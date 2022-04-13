<?php
    ob_start();
    ?>
<html>
	<head>
        <meta charset="utf-8">
		<title>PowerX Online Academy - Mid Term Result PDF</title>
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

table { font-size: 95%; table-layout: fixed; width: 100%; }
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
    height:40px;
    margin-top:10px;
    background-color:hsl(23deg 100% 50%);
    color: white;
    font-size: 22px;
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
    height: 50px;
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

	</head>
	<body>
        <br>
	<header>
        <img src="logo.jpg"/>
    </header>
    <?php
            if(isset($_POST['class']) && isset($_POST['name']) && isset($_POST['session'])){
                include '../../backend_data/init.php';
                $id = $_POST['name'];
                $tenure = $_POST['session'];
                $class = $_POST['class'];
                $sql = "SELECT * FROM `midterm_result` INNER JOIN `users` ON midterm_result.user_id = users.id WHERE `user_id` = '$id' and `tenure` = '$tenure' ";
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
                            $comment = $row['Comments'];
                            $qmale = $row["Qur'an (Male)"];
                            $qfemale = $row["Qur'an (Female)"];
                            $arabic = $row["Arabic (Advanced)"];
                            $data = $row["Qaida Al - Nooraniyya"];
                        }
                    }
                    else{
                        header('Location:./generatem.php');
                        ob_end_flush();
                    }
                }
            }
            else{
                header('Location:./generatem.php');
                ob_end_flush();
            }
        ?>
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
        
        <table>
            <tr style="height:60px;"> 
                <td class="active">SUBJECTS</td>
                <td colspan="2" class="active">MIDTERM MARKS</td>
            </tr>
            <tr>
                <td>Mathematics</td>
                <td>Assessments</td>
                <td> <?php echo $maths; ?> </td>
            </tr>
            <tr>
                <td>English</td>
                <td>Assessments</td>
                <td> <?php echo $english; ?> </td>
            </tr>
            <tr>
                <td>Chemistry</td>
                <td>Assessments</td>
                <td> <?php echo $chemistry; ?> </td>
            </tr>
            <tr>
                <td>Physics</td>
                <td>Assessments</td>
                <td> <?php echo $physics; ?> </td>
            </tr>
            <tr>
                <td>Biology</td>
                <td>Assessments</td>
                <td> <?php echo $biology; ?> </td>
            </tr>
            
            <tr>
                <td>Science</td>
                <td>Assessments</td>
                <td> <?php echo $science; ?> </td>
            </tr>

            <tr>
                <td>Qu'ran (Male)</td>
                <td>Assessments</td>
                <td> <?php echo $qmale; ?> </td>
            </tr>
            <tr>
                <td>Qu'ran (Female)</td>
                <td>Assessments</td>
                <td> <?php echo $qfemale; ?> </td>
            </tr>
            <tr>
                <td>Arabic (Advanced)</td>
                <td>Assessments</td>
                <td> <?php echo $arabic; ?> </td>
            </tr>
            <tr>
                <td> Computer </td>
                <td>Assessments</td>
                <td> <?php echo $computer; ?> </td>
            </tr>
            <tr>
                <td>Qaida Al - Nooraniyya</td>
                <td>Assessments</td>
                <td> <?php echo $data; ?> </td>
            </tr>
        </table>
        <table style="margin-top:10px;">
            <tr style="height:60px;">
                <td class="active" style="text-align:center;">Comments</td>
            </tr>
            <tr style="height:60px;">
                <td style="text-align: center;font-style: italic;"><?php echo $comment; ?> </td>
            </tr>
        </table>
        <div style="display:flex;justify-content:space-between;margin-top:10px;">
            <b style="font-weight:600;">Date and Stamp: <?php echo $date; ?></b>
            <img src="sign.jpg" style="width:220px;" />
        </div>
    </main>
		<footer>
            <span><i class="icon-globe"></i>www.powerxacademy.com</span>
            <span><i class="icon-envelope-o"></i>powerxacademy@gmail.com,</span>
            <span>info@powerxacademy.com</span>
        </footer>
	</body>
</html>
<script>
    print();
</script>