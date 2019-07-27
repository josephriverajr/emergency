<?php require_once('./../includes/config.php');?>
<?php
  $username = $_POST["username"];
  $password = $_POST["password"];

  try{
    $sql = "SELECT * FROM emergency.login WHERE username='".$username."' AND
      password = '".$password."' AND (Active IS NOT NULL or Active = 1) AND
      (Deleted IS NULL OR Deleted != 1) AND (IsBlocked IS NULL OR IsBlocked !=1); ";
      $stmt = $db->prepare($sql);
      $stmt ->execute();
      $result = $stmt->fetchAll();
      echo json_encode($result);
  }catch(PDOException $e){

}
?>
