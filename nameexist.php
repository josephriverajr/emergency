<?php
	
if (isset($_POST['txtUsername'])) {
	$txtUsername= $_POST['txtUsername'];
   $con = mysqli_connect('localhost','root','','EveryJuanSafe');

    $result =  mysqli_query($con,'select * from login where username ="'.$txtUsername.'"');
    
    if (mysqli_num_rows($result)!=0)
    {
     echo "username already exists";

    }



}




?>