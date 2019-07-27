<?php
if (isset($_POST['txtPhoneNumber'])) {
	$txtPhoneNumber= $_POST['txtPhoneNumber'];
   $con = mysqli_connect('localhost','root','','EveryJuanSafe');

    $result =  mysqli_query($con,'select * from login where PhoneNumber ="'.$txtPhoneNumber.'"');
    
    if (mysqli_num_rows($result)!=0)
    {
     echo "username already exists";

    }



}
?>