<?php
//if latitude and longitude are submitted
 session_start();

$username = $_SESSION["username"];
   if (!isset($_SESSION["username"]))
    header("location: ../index.php");
    $id = $_SESSION["id"];
    $test1= $_SESSION['latitude'];
    $test2 = $_SESSION['longtitude'];
    $Phone = $_SESSION['Phone'];
    $name = $_SESSION['name'];
    $type = $_SESSION['type'];
    $Time = $_SESSION['Time'];
    number_format($test1,5);
    number_format($test2,5);

      if(isset($_POST['btn_submit']))
      {
$con = mysqli_connect('localhost', 'root', '', 'mysql');
    //UPDATE response set status=0 WHERE userID=2
   $sql = mysqli_query($con,"UPDATE emergency.response set status=0 , responding =1 WHERE id='".$id."';") or die(mysqli_error($con));


      echo $id;
    echo "<br>";
    echo $username;
    echo "<br>";
    echo $name;
    echo "<br>";
    echo $Phone;
    echo "<br>";
    echo $type;
    echo "<br>";
    echo $Time;
    echo "<br>";

    echo "UPDATE emergency.response set status=0 WHERE id='".$id."';";
        header("location: index.php");
    }
?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="Atong Francisco">
    <title>Responder Page | MAP</title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


<style>
  
.container
{
  padding-top: 2% !important;
}


</style>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
  <title></title>
</head>
 <header>
      <div class="container">
        <div id="branding">
          <h1>Every Juan Safe</h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="Index.php">Back To Responder Page</a></li>
           </ul>
        </nav>
      </div>
    </header>
    <br><br> 
 <center>
<iframe width="1080" height="360" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=121.02041244506837%2C14.589356420603643%2C121.0532855987549%2C14.61435701178007&amp;layer=mapnik&amp;marker= <?php echo "$test1";?>%2C<?php echo "$test2";?>" style="border: 1px solid black"></iframe><br/><small>
    <a href="https://www.openstreetmap.org/?mlat=14.647&amp;mlon=121.025#map=17/<?php echo "$test1";?>/<?php echo "$test2";?>">View Larger Map</a></small>
</center>   

<form method="POST">
<?php 

?>
<center>

   <input type="submit" name="btn_submit" id="btn_submit" value="Respond" class="btn btn-success"> 
    <a href="tel:<?php echo $Phone ?>" style="color:white; border: 1px solid #c9302c; padding: 0.5%; background-color: #c9302c; padding-right: 1%; padding-left: 1%;">Verify</a>
</center>
</form>
