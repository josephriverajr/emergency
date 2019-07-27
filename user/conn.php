<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","emergency");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>