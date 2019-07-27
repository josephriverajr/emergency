<?php

session_start();

unset($_SESSION['username']);
unset($_SESSION['password']);
session_destroy();
header("location: index.php");
 
echo "<pre>";
print_r($_SESSION);

echo "</pre>";

?>
