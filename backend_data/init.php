<?php 

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'powerx';

//Creating Connection
$conn = new mysqli($servername , $username , $password , $dbname);
if ($conn -> connect_error) {
	die( "Connection to Database Failed");
	# code...
}

?>