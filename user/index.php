<?php
session_start();
$username = $_SESSION["username"];
   if (!isset($_SESSION["username"]))
    header("location: ../index.php");

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
    <link rel="stylesheet" href="../2publicPage/style.css">

   <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
   <link rel="stylesheet" href="./bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
   <link rel="stylesheet" href="./bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
   <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./plugins/iCheck/square/blue.css">


      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- datatable library -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


</head>
  <body>
    <body>

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
            <li><a href="../../WebDev/logout.php"><?php echo "Welcome $username -"; ?>Logout</a></li>
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
      <div class="container">
        <img id="ambu" src="../image/ambulance.png" height="200" width="250" onclick="success();" style="cursor:pointer;" >
        <img id="poli" src="../image/police.png" height="200" width="250" onclick="success();" style="cursor:pointer;" >
        <img id="fire" src="../image/fire.png" height="200" width="250" onclick="success();" style="cursor:pointer;" >
        <img id="traf" src="../image/traffic.png" height="200" width="250" onclick="success();" style="cursor:pointer;">
      </div>
</section>

<!--
            <form><div align="center">
              <input type="text" placeholder="servID" name="servID" id="servID" readonly>
              <?php
                $date = date('m-d-y');
               ?>
              <input type="text" placeholder="date" name="date" id="date" value="<?=$date ?>" readonly>
              <input type="text" placeholder="userno_serv" name="userno_serv" id="userno_serv" readonly>
              </div>
            </form>
-->


      <table>
      <tr>
        <td>
          <div class="form-popup" id="myForm">
            <form  class="form-container">
              <label>Why you need</label>
              <input type="text" style="background:transparent;" style="font-size:50px;" placeholder="description_serv" name="description_serv" id="description_serv" readonly>
              <h1>Tell us</h1>
              <label for="whathappen"><b>What is going on? (Situation)</b></label>
              <input type="text" placeholder="What happen?" name="whathappen" required>
              <label for="psw"><b>What is your location?</b></label>
              <input type="text" placeholder="Location" name="location" required>
              <button type="submit" class="btn" id="sendhelp" onclick="success();">Send</button>
              <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
              <?php
                $date = date('m-d-y');
               ?>
              <input type="hidden" placeholder="date" name="date" id="date" value="<?=$date ?>" readonly>

            </form>
          </div>
        </td>
      </tr>
    </table>
<!--
<script>
    $(document).ready(function(){

            $("#txt").click(function(){

                var text = $("#test").val();
                var comparingText = "hi";

                if (text == comparingText){

                    alert( $("#test").val());

                }

            });
        });
</script>
-->


      <script>
      function openForm(type) {
        document.getElementById("myForm").style.display = "block";
        //document.getElementById("description_serv").text = type;
        $("#description_serv").val(type);
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }


      function success()
      {
        alert("Successfully sent request.");
      }
      </script>


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