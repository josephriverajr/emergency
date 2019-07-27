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

$sql = "update login set deleted = 1 , active = 0 WHERE userID=:userID";
$statement = $con->prepare($sql);

   if ($statement->execute([':userID' => $userID ])) {
            
         header("Location: index.php");

   }
?>