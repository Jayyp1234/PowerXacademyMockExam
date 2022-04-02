<?php 

$servername = $_SERVER['SERVER_NAME'];
$username = 'root';
$password = '';
$dbname = 'powerx';

//Creating Connection
$conn = new mysqli($servername , $username , $password , $dbname);
if ($conn -> connect_error) {
	die( "Connection to Database Failed");
	# code...
}
$sql = "SELECT * FROM user";
$result = $conn->query($sql);


?>