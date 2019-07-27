<?php 
  session_start();
/*echo "<pre>";
print_r($_SESSION);

echo "</pre>";*/

  $msg =" ";
  if(isset($_POST['btn_login']))
  {
   

   $con = mysqli_connect('localhost','root','','emergency');
    $username = $_POST['log_username'];
    $password = $_POST['log_password'];
     $result =  mysqli_query($con,'select * from emergency.login where username ="'.$username.'" and password ="'.$password.'" and isAdmin ="1" AND (Active IS NOT NULL or Active = 1) AND
      (Deleted IS NULL OR Deleted != 1) AND (IsBlocked IS NULL OR IsBlocked !=1) ');
    $result1 = mysqli_query($con,'select * from emergency.login where username ="'.$username.'" and password ="'.$password.'" and isAdmin ="0" AND (Active IS NOT NULL or Active = 1) AND
      (Deleted IS NULL OR Deleted != 1) AND (IsBlocked IS NULL OR IsBlocked !=1) ');
    $result2 = mysqli_query($con,'select * from emergency.login where username ="'.$username.'" and password ="'.$password.'" and isAdmin ="2" AND (Active IS NOT NULL or Active = 1) AND
      (Deleted IS NULL OR Deleted != 1) AND (IsBlocked IS NULL OR IsBlocked !=1) ');
    if (mysqli_num_rows($result)==1)
    {
      $_SESSION['username'] = $username;
       $_SESSION['password'] = $password;
      header('Location: admin/index.php');

    }
   else if (mysqli_num_rows($result1)==1)
    {
     $_SESSION['username'] = $username;
       $_SESSION['password'] = $password;
      header('Location: public/index.php');
    }
       else if (mysqli_num_rows($result2)==1)
    {
     $_SESSION['username'] = $username;
       $_SESSION['password'] = $password;
      header('Location: responder/index.php ');

    }
    else
    {
        //echo "<script>alert('Incorrect Password');</script>";
        //header('Location: index.php ');
        $msg =" 'Wrong Username or Password' ";
  }
  
}


      $con = mysqli_connect('localhost', 'root', '', 'mysql');
     if(isset($_POST['btn_submit']))
      {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['Lastname'];
      $birthdate = $_POST['Birthdate'];
      $gender = $_POST['Gender'];
      $floorhouseno = $_POST['FloorHouseNo'];
      $building = $_POST['Building'];
      $street = $_POST['Street'];
      $barangay = $_POST['Barangay'];
      $AddressType = $_POST['AddressType'];
      $city = $_POST['SanJuanCity'];
      $emailAdd = $_POST['EmailAddress'];
      $phoneNumber = $_POST['PhoneNumber'];
      $username = $_POST['Username'];
      $password = $_POST['Password'];
      $isAdmin = $_POST['IsAdmin'];
      $isblocked = $_POST['IsBlocked'];
      $active = $_POST['Active'];
      $deleted = $_POST['Deleted'];
     
      //$seqid = $_POST['SeqID'];//<-------------------------------------
        $insert = mysqli_query($con,"INSERT INTO emergency.login VALUES (NULL,'".$firstname."' ,'".$lastname."' ,'".$birthdate."' ,'".$gender."' ,'".$floorhouseno."' ,'".$building."' ,'".$street."' ,'".$barangay."' ,'".$AddressType."' ,'".$city."' ,'".$emailAdd."' ,'".$phoneNumber."' ,'".$username."' ,'".$password."' , '".$isAdmin."' ,'".$isblocked."' ,'".$active."' ,'".$deleted."');") or die(mysqli_error($con));

        // header('Location: admin/test1.php');

          }

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="Atong Francisco">
    <title>Home Page</title>
    <link rel="stylesheet" href="./style.css">
    <!-- link for create account modal-->
    <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">



</head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1>Every Juan Safe</h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="index.php">Home</a></li>
            <li><a href="index.php">News</a></li>
            <li><a href="index.php">Events</a></li>
            <li><a href="index.php">About us</a></li>
            <li><a href="index.php">Services</a></li>
          </ul>
        </nav>
      </div>

    </header>

    <section id="sec1">
      <div class="container">
        <!--<img src="image/everyjuan.jpg"/>-->
        <!--rescue olympics photo-->
      </div>
    </section>
<!--<hr color="orange">-->


      <section id="sec2">
          <div class="container">
            <form align="right" method="post">
              <div align="left">
              <font size="5">Login</font></br>
              <input type="text" placeholder="Username" id="Username" name="log_username" ><br>
              <input type="password" placeholder="Password" id="Password" name="log_password" >
              <br>
              <label style="color:red;"><?php echo $msg; ?></label><br>
               <a type="button" class="btn btn-md" data-toggle="modal" data-target="#signUpModal">Sign Up</a>
               <br>
               <button class="btn btn-primary" name="btn_login" style="width: 60%;">Login</button>
             </form>
              </div>
              <div>
              <!--<h5><a href="/WebDev/createAccount.html" align="">Create Account</a></h5>-->
              <!-- Modal -->
                <div id="signUpModal" class="modal fade" role="dialog">

                  <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" align="center">Create a new Account</h4>
                      </div>
                      <div class="modal-body" align="left">
                        <form method="POST">

                          <p>Full Name:</p>
                                  <div>
                                    <input onblur="requiredField(this);" class="col-1" type="text" placeholder="First name" name="firstname" id="txtFirstname"  required/>
                                    <input onblur="requiredField(this);" class="col-1" type="text" placeholder="Last name" name="Lastname" id="txtLastname"  required />
                                  </div>
                          <br>


                          <div>
                          <p>Birthdate:</p>
                                  <input onblur="requiredField(this);" class="form-control" type="date" name="Birthdate" id="txtBirthdate" required>
                          </div>
                          <br>

                          <div class="col-1">
                                    <div class="col-1">
                                     <select  class="form-control" name="Gender" id="txtGender" ng-model="Gender" required>
                                       <option value="" style="display:none" selected>Gender *</option>
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                    </select>
                                  </div>
                          </div>
                          <br>


                          <p>Address:
                            <div class="form-group">
                              <input onblur="requiredField(this);" class="col-1" type="text" placeholder="Floor/House No." name="FloorHouseNo" id="txtFloorHouseNo"  required/>
                              <input onblur="requiredField(this);" class="col-1" type="text" placeholder="Building" name="Building" id="txtBuilding"  required/>
                              <br>
                              <input onblur="requiredField(this);" class="form-control" type="text" placeholder="Street" name="Street" id="txtStreet"  required/>
                              <br>
                              <div class="form-group">
                                  <div>
                                      <select name="Barangay" id="txtBarangay" class="form-control" ng-model="Barangay" required>
                                          <option value="" style="display:none" selected>Select Barangay *</option>
                                          <option value="Addition_Hills">Addition Hills</option>
                                          <option value="Batis">Batis</option>
                                          <option value="Balong_Bato">Balong-Bato</option>
                                          <option value="Corazon_De_Jesus">Corazon De Jesus</option>
                                          <option value="Ermitaño">Ermitaño</option>
                                          <option value="Greenhills">Greenhills</option>
                                          <option value="Isabelita">Isabelita</option>
                                          <option value="Kabayanan">Kabayanan</option>
                                          <option value="Little_Baguio">Little Baguio</option>
                                          <option value="Maytunas">Maytunas</option>
                                          <option value="Onse">Onse</option>
                                          <option value="Pasadena">Pasadena</option>
                                          <option value="Pedro_Cruz">Pedro Cruz</option>
                                          <option value="Progreso">Progreso</option>
                                          <option value="Rivera">Rivera</option>
                                          <option value="Salapan">Salapan</option>
                                          <option value="San_Perfecto">San Perfecto</option>
                                          <option value="Santa_Lucia">Santa Lucia</option>
                                          <option value="St._Joseph">St. Joseph</option>
                                          <option value="Tibagan">Tibagan</option>
                                          <option value="West_Crame">West Crame</option>
                                      </select>
                                    </div>
                                </div>
                              </div>

                              <div class="form-group">
                                  <div>
                                      <select name="AddressType" id="txtAddressType" class="form-control" ng-model="address.type" required>
                                          <option value="" style="display:none" selected>Select Address Type *</option>
                                          <option value="Residential">Residential</option>
                                          <option value="Office">Office</option>
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                    <div>
                                        <select name="SanJuanCity" id="txtSanJuanCity" class="form-control" ng-model="SanJuanCity" required>
                                            <option value="" style="display:none" selected>Select City</option>
                                            <option value="San Juan City">San Juan City</option>
                                        </select>
                                    </div>
                              </div>
                              <br>

                              <div class="col-1">
                                <p>Contact Details:</p>

                                <input  onblur="requiredField(this);" class="form-control" type="email" placeholder="Email Address" name="EmailAddress" id="txtEmailAddress"  required/>
                              </div><br>

                              <div class="col-1">
                                <input  onblur="requiredField(this); phone();" class="form-control" type="text" placeholder="Phone Number" maxlength="11" name="PhoneNumber" onkeypress="return isNumber(event); "onkeyup ="phoneExist(); " id="txtPhoneNumber"  required/>
                              </div>
                                     <div id='validation1' style="display: none;">
                                          <label style="color: red;">Phone number already exist</label>
                                       </div>
                              <br>

                              <div class="col-1">
                                <input onblur="requiredField(this);" class="form-control" type="text" placeholder="Username" name="Username" id="txtUsername" onkeyup ="nameExist();"  required/>
                              </div>
                                <div id='validation' style="display: none;">
                                  <label style="color: red;">Username already exist</label>
                               </div>
                              <br>

                              <div class="col-1">
                                <input onblur="requiredField(this); success();" class="form-control" type="password" placeholder="Password" name="Password" id="txtPassword"  required />
                              </div>
                              <br>

                              <div>
                                <div class="col-1">
                                  <input class="form-control" type="hidden" placeholder="0" value="0" name="IsAdmin" id="txtIsAdmin" />
                                  <input class="form-control" type="hidden" placeholder="0" value="0" name="IsBlocked" id="txtIsBlocked" />
                                  <input class="form-control" type="hidden" placeholder="1" value="1" name="Active" id="txtActive" />
                                  <input class="form-control" type="hidden" placeholder="0" value="0" name="Deleted" id="txtDeleted" />
                                  <input class="form-control" type="hidden" placeholder="" value="" name="SeqID" id="txtSeqID"/>
                                </div>
                              </div>



                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="Submit" name="btn_submit" id="myDiv" class="btn btn-default">Submit</button>
                        </form>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div>
              <!-- Trigger the modal with a button -->
               <!-- <a type="button" class="btn btn-md" data-toggle="modal" data-target="#signUpModal">Sign Up</a> -->
              
              </div>
           
            <div align="center">
                <button type="submit" class"btnHelp" id="btnHelp"><a href="tel:09215595340" style="color:white">Need Help? call now</a></button>
            </div>
          </div>
      </section>

      <section>
        <center>
        <div class="container">
          <h1>Central Emergency & Disaster Operations Center</h1>
          <p>We are personnels from different agencies of the City Government of San Juan.</p>
            <p>  The CDRRMO, TPMO, PNP and BFP are group together ...</p>
        </div>
        </center>
      </section>
      <br>
            <section id="logos">
             <div class="container">
                <div class="box">
                  <img src="image/pnp.png"/>
                  <h6>Philippine National Police</h6>
                </div>
                <div class="box">
                  <img src="image/cdrrmo.png"/>
                  <h6>Disaster Risk Reduction & Management Office</h6>
                </div>
                <div class="box">
                  <img src="image/cityhalllogo.png"/>
                  <h6>City Government of San Juan</h6>
                </div>
                <div class="box">
                  <img src="image/tpmo.png"/>
                  <h6>Traffic and Parking  Management Office</h6>
                </div>
                <div class="box">
                  <img src="image/bfp.png"/>
                  <h6>Bureu of Fire Protection</h6>
                </div>
              </div>
            </section>

            <footer>
                <p>PUPSJ BSIT FASS Group 2019</p>
            </footer>



           <script src="./bower_components/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap 3.3.7 -->
           <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- iCheck -->
           <script src="./plugins/iCheck/icheck.min.js"></script>
            <!--login script -->
           <script src="./controller/login.js"></script>

           <script language="javascript" type="text/javascript" src="asset/js/jquery-3.3.1.js"></script>
           <script language="javascript" type="text/javascript" src="asset/js/customscript.js"></script>
           <script language="javascript" type="text/javascript" src="./controller/userList.js"></script>
           <script language="javascript" type="text/javascript" src="./controller/userServlet.js"></script>
           <script>
            function isNumber(event)
          {
            var keycode = event.keyCode;
            if (keycode > 40 && keycode < 59) {
              return true;
            }
            return false;
          }

           function phoneExist(){
          //alert("came");
          var txtPhoneNumber=$("#txtPhoneNumber").val();
          $.ajax({
          type:'post',
          url:'phoneexist.php',// put your real file name 
          data:{txtPhoneNumber: txtPhoneNumber},
          success:function(msg){
                 /* alert(msg);*/ // your message will come here.  
            $('#success_message').fadeIn("").html(msg);
          if (msg=="username already exists") {
          document.getElementById("validation1").style.display = "block";
          document.getElementById("txtPhoneNumber").style.borderColor = "#e74c3c";
           document.getElementById('myDiv').disabled = true; 
          }
          else
          {
          document.getElementById("validation1").style.display = "none";
          document.getElementById("txtPhoneNumber").style.borderColor = "#2ecc71";
           document.getElementById('myDiv').disabled = false; 
          }
         }
          });
          }

        function nameExist(){
          //alert("came");
          var txtUsername=$("#txtUsername").val();
          $.ajax({
          type:'post',
          url:'nameexist.php',// put your real file name 
          data:{txtUsername: txtUsername},
          success:function(msg){
                 /* alert(msg);*/ // your message will come here.  
            $('#success_message').fadeIn("").html(msg);
          if (msg=="username already exists") {
           
            document.getElementById("txtUsername").style.borderColor = "#e74c3c";
          document.getElementById("validation").style.display = "block";
          document.getElementById('myDiv').disabled = true;
          }
          else
          {
            document.getElementById("txtUsername").style.borderColor = "#2ecc71";
          document.getElementById("validation").style.display = "none";
           document.getElementById('myDiv').disabled = false; 
          }
                        }
          });
          }



           function phone() {
             if(document.getElementById("txtPhoneNumber").value==="") { 
                     document.getElementById('myDiv').disabled = true; 
                  }
             else if (document.getElementById("txtPhoneNumber").value.length <= 9 || document.getElementById("txtPassword").value.length >= 13 ) {
                //red border
                  document.getElementById("txtPhoneNumber").style.borderColor = "#e74c3c";
                   document.getElementById('myDiv').disabled = true; 
                   alert("minimum of 9 and maximum of 13");
              }

             else { 
                   document.getElementById('myDiv').disabled = false; 
                  }
              } 




        function success() {
             if(document.getElementById("txtPassword").value==="") { 
                     document.getElementById('myDiv').disabled = true; 
                  }
             else if (document.getElementById("txtPassword").value.length < 7 || document.getElementById("txtPassword").value.length > 20 ) {
                //red border
                  document.getElementById("txtPassword").style.borderColor = "#e74c3c";
                   document.getElementById('myDiv').disabled = true; 
                   alert("minimum of 8 and maximum of 20");
              }

             else { 
                   document.getElementById('myDiv').disabled = false; 
                  }
              } 


               function requiredField(input) {
             if (input.value.length < 1) {
                //red border
                 input.style.borderColor = "#e74c3c";
                   document.getElementById('myDiv').disabled = true; 
              } 
        
           
              else if (input.type == "email") {
                console.log("this is an email type");
                
                  if (input.value.indexOf("@") != -1 && input.value.indexOf(".") != -1) {
                    //green border
                    input.style.borderColor = "#2ecc71";
                     document.getElementById('myDiv').disabled = false;
                  } else {
                    //red border
                    input.style.borderColor = "#e74c3c";
                    document.getElementById('myDiv').disabled = true; 
                  }
                
              }                

           
              else {
                //green border
                  input.style.borderColor = "#2ecc71";
                  //   document.getElementById('btn_submit').disabled = false;
              }
          }




           </script>






  </body>
</html>

