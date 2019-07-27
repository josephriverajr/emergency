<?php

$dsn = 'mysql:host=localhost;dbname=emergency';
$username = 'root';
$password = '';
$options = [];
try {
$con = new PDO($dsn, $username, $password, $options);
} 
catch(PDOException $e) {
echo "Error";
}

 $userID = $_GET['userID'];

$sql = "update emergency.login set deleted=1 AND active=0 WHERE userID=:userID";
$statement = $con->prepare($sql);

   if ($statement->execute([':userID' => $userID ])) {
            
         header("Location: test1.php");

   }
?>