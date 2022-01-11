<?php

$server = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "study_folder";

$conn = mysqli_connect($server, $dbuser, $dbpass, $database);
if(!$conn){
	die("<script>alert('Connection Failed')</script>");
}

?>