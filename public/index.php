<?php
session_start();
$username = $_SESSION["username"];
   if (!isset($_SESSION["username"]))
    header("location: ../index.php");
$connection = new PDO ("mysql:host=localhost;dbname=emergency","root","");
/*echo $invID;*/
$sql = 'SELECT * FROM emergency.Login WHERE (Active IS NOT NULL or Active = 1) AND
      (Deleted IS NULL OR Deleted != 1) AND (IsBlocked IS NULL OR IsBlocked !=1) AND username =:username';
$statement = $connection->prepare($sql);
$statement->execute([':username' => $username ]);
$records = $statement->fetch(PDO::FETCH_OBJ);
$id = $records->userID ;
$fname = $records->fname ;
$lname = $records->lname ;
$phoneNumber = $records->phoneNumber ;
$ambulance = "ambulance";
$police = "police";
$fire = "fire";
$traf = "traf";

$sql1 = ' SELECT * from response WHERE userID ='.$id.' ';
$statement = $connection->prepare($sql1);
$statement->execute([':username' => $username ]);
$fd = $statement->fetch(PDO::FETCH_OBJ);
$responding1 = $fd->responding ;
if ($responding1 == "0") {
  # code...
  $x= "Status: Not seen yet";
  $xstyle="color:white; background-color: red;padding: 1% 1%;";
}
else 
{
  $x= "Status: On the way";
  $xstyle="color:white; background-color: green;padding: 1% 1%;";
}

$con = mysqli_connect('localhost', 'root', '', 'mysql');

     if(isset($_POST['btn_ambu']))
      {

        $longitude = $_POST['longitude'];

        $latitude =$_POST['latitude'];

        echo "<script>alert('Sucessfully sent request');</script>";
   
 
      //$seqid = $_POST['SeqID'];//<-------------------------------------
        $insert = mysqli_query($con,"INSERT INTO emergency.response VALUES (NULL,'".$id."','".$fname.' '.$lname."' ,'".$longitude."' ,'".$latitude."','".$phoneNumber."' ,Now(),'".$ambulance."','1','0');") or die(mysqli_error($con));

           /* header('Location:index.php');*/
      
    $insert1 = mysqli_query($con,"INSERT INTO emergency.user VALUES (NULL,'".$fname."', '".$phoneNumber."','0');") or die(mysqli_error($con));
      }


     if(isset($_POST['btn_police']))
      {
       
        $longitude = $_POST['longitude'];

        $latitude =$_POST['latitude'];

        echo "<script>alert('Sucessfully sent request');</script>";
   
 
      //$seqid = $_POST['SeqID'];//<-------------------------------------
        $insert = mysqli_query($con,"INSERT INTO emergency.response VALUES (NULL,'".$id."','".$fname.' '.$lname."' ,'".$longitude."' ,'".$latitude."','".$phoneNumber."' ,Now(),'".$police."','1','0');") or die(mysqli_error($con));

           /* header('Location:index.php');*/
          $insert1 = mysqli_query($con,"INSERT INTO emergency.user VALUES (NULL,'".$fname."', '".$phoneNumber."','0');") or die(mysqli_error($con));


      }

     if(isset($_POST['btn_fire']))
      {
  
          $longitude = $_POST['longitude'];

        $latitude =$_POST['latitude'];

        echo "<script>alert('Sucessfully sent request');</script>";
   
 
      //$seqid = $_POST['SeqID'];//<-------------------------------------
        $insert = mysqli_query($con,"INSERT INTO emergency.response VALUES (NULL,'".$id."','".$fname.' '.$lname."' ,'".$longitude."' ,'".$latitude."','".$phoneNumber."' ,Now(),'".$fire."','1','0');") or die(mysqli_error($con));

           /* header('Location:index.php');*/
          $insert1 = mysqli_query($con,"INSERT INTO emergency.user VALUES (NULL,'".$fname."', '".$phoneNumber."','0');") or die(mysqli_error($con));

      }

     if(isset($_POST['btn_traf']))
      {
         $longitude = $_POST['longitude'];

        $latitude =$_POST['latitude'];

        echo "<script>alert('Sucessfully sent request');</script>";
   
 
      //$seqid = $_POST['SeqID'];//<-------------------------------------
        $insert = mysqli_query($con,"INSERT INTO emergency.response VALUES (NULL,'".$id."','".$fname.' '.$lname."' ,'".$longitude."' ,'".$latitude."','".$phoneNumber."' ,Now(),'".$traf."','1','0');") or die(mysqli_error($con));

           /* header('Location:index.php');*/
          $insert1 = mysqli_query($con,"INSERT INTO emergency.user VALUES (NULL,'".$fname."', '".$phoneNumber."','0');") or die(mysqli_error($con));

       
      }









?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="Atong Francisco">
    <title>Public Page</title>
    <!--<link rel="stylesheet" href="../css/style.css">-->
       <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="Atong Francisco">
    <title>Home Page</title>
    <link rel="stylesheet" href="../style.css">
    <!-- link for create account modal-->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">


</head>
  <body onload="getLocation();"> 


      <style>
        #wrap{
          width:485px;
        }
        .left{
          width:240px;
          height: 123px;
          float:left;
        }
        .right{
          width:240px;
          height: 123px;
          float:right;
        }

            .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 280px;
            }

            /* The popup form - hidden by default */
            .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
            }

            /* Add styles to the form container */
            .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
            }

            /* Full-width input fields */
            .form-container input[type=text], .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            }

            /* When the inputs get focus, do something */
            .form-container input[type=text]:focus, .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
            }

            /* Set a style for the submit/login button */
            .form-container .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
            }

            /* Add a red background color to the cancel button */
            .form-container .cancel {
            background-color: red;
            }

            /* Add some hover effects to buttons */
            .form-container .btn:hover, .open-button:hover {
            opacity: 1;
            }
  </style>


    <header>
      <div class="container">
        <div id="branding">
          <h1>Every Juan Safe</h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="http://localhost:8080/EveryJuanSafe/2publicPage/publicIndex.php">Home</a></li>
            <li><a href="index.php">News</a></li>
            <li><a href="index.php">Events</a></li>
            <li><a href="index.php">About us</a></li>
            <li><a href="index.php">Services</a></li>
            <li><a href="../logout.php"><?php echo "Welcome $username -"; ?>Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>



<section id="sec2">
          <div class="container">
            <!--
            <form align="right">
              <div align="left">
              </div>
            </form>
            -->
          </div>
</section>

<section id="sec3">
  <ul   style="margin-bottom: 1%; position: relative; left: 85%;color:white;">
<!--  <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-globe" style="font-size:18px;"></span></a>
              <ul class="dropdown-menu"></ul>
            </li>  -->
</ul>
      <div class="container" style="margin-top: 8%">

        <form method="POST">

        <input type="text" name="latitude" id="x" style="display: none;" >

        <input type="text" name="longitude" id="y" style="display: none;">
       <!--    <input type="text" name="x" id="x" style="display: ; ">
          <input type="text" name="y" id="y" style="display: ; "> -->
              <ul>
            <li style="    list-style: none;" ><span style="<?php echo "$xstyle"; ?>"><?php echo "$x"; ?></span></li>
          </ul>

          <table width="100%">
            <tr>
              <td> <button name="btn_ambu" style="width: 100%; background-color: transparent; border:none;"> 
                <img style="width: 80%;" id="ambu" src="../image/ambulance.png" height="200" width="250" onclick="success();" style="cursor:pointer;" ></button>
              </td>
              <td><button name="btn_police" style="width: 100%; background-color: transparent; border:none;"> 
                <img style="width: 80%;" id="poli" src="../image/police.png" height="200" width="250" onclick="success();" style="cursor:pointer;" ></button></td>
              <td><button name="btn_fire" style="width: 100%; background-color: transparent; border:none;"> 
                <img style="width: 80%;" id="fire" src="../image/fire.png" height="200" width="250" onclick="success();" style="cursor:pointer;" ></button></td>
              <td> <button  style="width: 100%; background-color: transparent; border:none;" name="btn_traf"> 
                <img style="width: 80%;" id="traf" src="../image/traffic.png" height="200" width="250" onclick="success();" style="cursor:pointer;" ></button></td>
            </tr>
          </table>  
      
<!-- <?php
  echo "INSERT INTO emergency.response VALUES (NULL,'".$fname.' '.$lname."' ,'".$longitude."' ,'".$latitude."','".$phoneNumber."' ,Now(),'".$ambulance."');";
    echo "INSERT INTO emergency.response VALUES (NULL,'".$fname.' '.$lname."' ,'".$longitude."' ,'".$latitude."','".$phoneNumber."' ,Now(),'".$police."');";
      echo "INSERT INTO emergency.response VALUES (NULL,'".$fname.' '.$lname."' ,'".$longitude."' ,'".$latitude."','".$phoneNumber."' ,Now(),'".$fire."');";
        echo "INSERT INTO emergency.response VALUES (NULL,'".$fname.' '.$lname."' ,'".$longitude."' ,'".$latitude."','".$phoneNumber."' ,Now(),'".$traf."');";


?> -->


  <script type = "text/javascript">
$(document).ready(function(){
  
  function load_unseen_notification(view = '')
  {
    $.ajax({
      url:"fetch.php",
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data)
      {
      $('.dropdown-menu').html(data.notification);
      if(data.unseen_notification > 0){
      $('.count').html(data.unseen_notification);
      }
      }
    });
  }
 
  load_unseen_notification();
 
  $('#add_form').on('submit', function(event){
    event.preventDefault();
    if($('#firstname').val() != '' && $('#lastname').val() != ''){
    var form_data = $(this).serialize();
    $.ajax({
      url:"addnew.php",
      method:"POST",
      data:form_data,
      success:function(data)
      {
      $('#add_form')[0].reset();
      load_unseen_notification();
      }
    });
    }
    else{
      alert("Enter Data First");
    }
  });
 
  $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
  });
 
  setInterval(function(){ 
    load_unseen_notification();; 
  }, 5000);
 
});
</script>

<script>

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
    
function showPosition(position) {

    document.querySelector('#x').defaultValue = position.coords.latitude;
    document.querySelector('#y').defaultValue =  position.coords.longitude;
}
</script>


        </form>
      </div>
</section>




      <script language="javascript" type="text/javascript" src="asset/js/jquery-3.3.1.js"></script>
      <script language="javascript" type="text/javascript" src="asset/js/customscript.js"></script>
      <script language="javascript" type="text/javascript" src="./controller/userList.js"></script>
      <script language="javascript" type="text/javascript" src="./controller/userServlet.js"></script>
<!--

            <footer>
                <p>PUPSJ BSIT FASS Group 2019</p>
            </footer>
-->
            <script src="./bower_components/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap 3.3.7 -->
            <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- iCheck -->
          <!--  <script src="./plugins/iCheck/icheck.min.js"></script>-->
            <!--login script -->
            <script src="./controller/login.js"></script>

  </body>
</html>
