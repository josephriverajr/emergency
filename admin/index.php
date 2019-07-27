<?php

$connection = new PDO ("mysql:host=localhost;dbname=emergency","root","");
$sql = 'select * from emergency.Login where  (Active IS NOT NULL or Active = 1) AND
      (Deleted IS NULL OR Deleted != 1) AND (IsBlocked IS NULL OR IsBlocked !=1)';
$statement = $connection->prepare($sql);
$statement->execute();
$packages = $statement->fetchAll(PDO::FETCH_OBJ);

session_start();

$msg_edit ='';
$username = $_SESSION["username"];
   if (!isset($_SESSION["username"]))
    header("location: ../index.php");


  
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
      $addresstype = $_POST['AddressType'];
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
        $insert = mysqli_query($con,"INSERT INTO emergency.login VALUES (NULL,'".$firstname."' ,'".$lastname."' ,'".$birthdate."','".$gender."' ,'".$floorhouseno."' ,'".$building."' ,'".$street."' ,'".$barangay."' ,'".$addresstype."' ,'".$city."' ,'".$emailAdd."' ,'".$phoneNumber."' ,'".$username."' ,'".$password."' , '".$isAdmin."' ,'".$isblocked."' ,'".$active."' ,'".$deleted."');") or die(mysqli_error($con));

       header('Location:index.php');

          }


      if(isset($_POST['btn_edit']))
      {

      $userID = $_POST['userID'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['Lastname'];
      $birthdate = $_POST['Birthdate'];
      $gender = $_POST['Gender'];
      $floorhouseno = $_POST['FloorHouseNo'];
      $building = $_POST['Building'];
      $street = $_POST['Street'];
      $barangay = $_POST['Barangay'];
      $addressType = $_POST['AddressType'];
      $city = $_POST['SanJuanCity'];
      $emailAdd = $_POST['EmailAddress'];
      $phoneNumber = $_POST['PhoneNumber'];
      $username = $_POST['Username'];
      $password = $_POST['Password'];
      $isAdmin = $_POST['IsAdmin'];
      $isblocked = $_POST['IsBlocked'];
      $active = $_POST['Active'];
      $deleted = $_POST['Deleted'];
     

     

         $update = mysqli_query($con,"UPDATE emergency.login SET fname='".$firstname."',lname='".$lastname."',bday='".$birthdate."',gender='".$gender."',houseNo='".$floorhouseno."',building='".$building."',street= '".$street."',barangay= '".$barangay."',addressType= '".$addressType."',city='".$city."',emailAdd='".$emailAdd."',phoneNumber='".$phoneNumber."',username='".$username."',password='".$password."',isAdmin='".$isAdmin."' ,isBlocked='".$isblocked."',active= '".$active."',deleted= '".$deleted."' WHERE userID = ".$userID." ;") or die(mysqli_error($con));
        header('Location:index.php');
        /*echo $update;*/
       $msg_edit ="Success";

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
    <link rel="stylesheet" href="../style.css">
    <!-- link for create account modal-->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css">  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.css"/>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready(function () {
    $('#dataTables-example').dataTable();
    });

    </script>


</head>
  <body>
  <!--   <header>
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

    </header> -->
   <table style="width:100%" border="0" id="table">

        <div class="login">
          <tr bgcolor="#2f55a4">
         <th><font face="Impact" size="10" color="white"><center>EVERY JUAN SAFE<center></font></th>
          <td align="center">
            <a href="http://localhost:8080/EveryJuanSafe/1adminPage/adminIndex.php"><font color="white">Monitoring</font></a>
          </td>
          <td align="center">
            <a href=" http://localhost:8080/EveryJuanSafe/2adminPage/adminUsersTable.php"><font color="white">Users<font></a>
          </td>
          <td align="center">
          <a href="http://localhost:8080/WebDev/phpserverside/index.php"><font color="white">Responders</font></a>

          </td>
          <td align="" width="15%">
        <a href="../logout.php"><font color="white"><?php echo "Welcome $username -"; ?>Logout</font></a>

          </td>


        </tr>
        </div>
  </table>

      <section style="margin-bottom: 15%;">
<div class="container">
<br>
<h1>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="float:right">
          (+)Add New 
          </button>
          <br>
</h1>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST">

                          <p>Full Name:</p>
                                  <div>
                                    <input onblur="requiredField(this);" class="form-control"  type="text" placeholder="First name" name="firstname" id="txtfirstname"  required/><br>
                                    <input onblur="requiredField(this);" class="form-control"  type="text" placeholder="Last name" name="Lastname" id="txtLastname"  required />
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
                              <input onblur="requiredField(this);" class="form-control" type="text" placeholder="Floor/House No." name="FloorHouseNo" id="txtFloorHouseNo"  required/><Br>
                              <input onblur="requiredField(this);" class="form-control" type="text" placeholder="Building" name="Building" id="txtBuilding"  required/>
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

<h3 style="color:green; "><?php echo $msg_edit; ?></h3>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                   <thead>
    <tr>

            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%" hidden  ><center>No </center></th>
            <th width="1%" hidden  ><center>No </center></th>
            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%"   hidden><center>No </center></th>
            <th width="1%"  hidden ><center>No </center></th>
            <th width="1%"   hidden><center>No </center></th>
             <th width="1%"   hidden><center>No </center></th>
            <!-- <th width="1%" hidden ><center>No </center></th> -->

                   <th width="1%"  ><center>No </center></th>
                   <th width="30%" ><center>Name</center></th>
                    <th width="30%" ><center>Barangay </center></th>
                    <th width="20%" ><center>Phone Number  </center></th>
                    <th width="20%" ><center>Type  </center></th>
                    <th width="20%" ><center>Action  </center></th>
                    </thead>
                    <tbody>
                       <?php foreach($packages as $package): ?>





                        <?php

                           $test= $package->isAdmin;
                          // echo $test;
                           if ($test == 0) 
                           {
                             $test1 = "User";
                           }
                            else if ($test == 1) 
                            {
                             $test1 = "Admin";
                           }
                           else
                           {
                             $test1 = "Responder";
                           }
                            ?> 
           <tr id="<?= $package->userID; ?>">

            <td data-target="fname" hidden><?= $package->fname;?></td>
            <td data-target="lname" hidden><?= $package->lname;?></td>
            <td data-target="bday" hidden><?= $package->bday;?></td>
            <td data-target="gender" hidden><?= $package->gender;?></td>
            <td data-target="houseNo" hidden><?= $package->houseNo;?></td>
            <td data-target="building" hidden><?= $package->building;?></td>
            <td data-target="street" hidden><?= $package->street;?></td>
            <td data-target="AddressType" hidden><?= $package->addressType;?></td>
            <td data-target="city" hidden><?= $package->city;?></td>
            <td data-target="emailAdd" hidden><?= $package->emailAdd;?></td>
            <td data-target=" " hidden><?= $package->phoneNumber;?></td>
            <td data-target="username" hidden><?= $package->username;?></td>
            <td data-target="password" hidden><?= $package->password;?></td>
            <td data-target="IsBlocked" hidden><?= $package->IsBlocked;?></td>
            <td data-target="active" hidden><?= $package->active;?></td>
            <td data-target="deleted" hidden><?= $package->deleted;?></td>
            <td data-target=" " hidden><?= $package->password;?></td>
            <td data-target="userID"><?= $package->userID;?></td>
            <td data-target="name"><?= $package->fname .' '. $package->lname; ?></td>
            <td data-target="barangay"><?= $package->barangay; ?></td>
            <td data-target="phoneNumber"> <?= $package->phoneNumber; ?></td>
             <td data-target="isAdmin1"   ><?= $package->isAdmin;?><?php echo '-'.$test1; ?></td>
              <td data-target="isAdmin" hidden  ><?= $package->isAdmin;?></td>
            <td ><center>
        <!--       <a href="addnewpackage.php?package_id=<?= $package->package_id ?>" class="fa fa-plus-square" style="margin: 5px;"}"></a> -->
              <a href="#" data-role="update" data-id="<?= $package->userID; ?>"  class="fa fa-edit"></a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deletelogin.php?userID=<?= $package->userID; ?>"><i class="fa fa-trash"></i></a>  
              </td> 
          </tr>
        <?php endforeach; ?>
                   </tbody>
                                </table>
                               
                            </div>
                        </div>
                      
<!-- End of first row (copy and paste this block to append additional rows -->
<!-- Paste additional rows here -->
      </div>



        </center>
      </section>
      <br>
            <section id="logos">
             <div class="container">
                <div class="box">
                  <img src="../image/pnp.png"/>
                  <h6>Philippine National Police</h6>
                </div>
                <div class="box">
                  <img src="../image/cdrrmo.png"/>
                  <h6>Disaster Risk Reduction & Management Office</h6>
                </div>
                <div class="box">
                  <img src="../image/cityhalllogo.png"/>
                  <h6>City Government of San Juan</h6>
                </div>
                <div class="box">
                  <img src="../image/tpmo.png"/>
                  <h6>Traffic and Parking  Management Office</h6>
                </div>
                <div class="box">
                  <img src="../image/bfp.png"/>
                  <h6>Bureu of Fire Protection</h6>
                </div>
              </div>
            </section>

            <footer>
                <p>PUPSJ BSIT FASS Group 2019</p>
            </footer>

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST">
                          <input class="form-control"  type="text" placeholder="First name" name="userID" id="userID"  required/><br>
                                               

                          <p>Full Name:</p>
                                  <div>
                                    <input onblur="requiredField(this);" class="form-control"  type="text" placeholder="First name" name="firstname" id="txtfirstname1"  required/><br>
                                    <input onblur="requiredField(this);" class="form-control"  type="text" placeholder="Last name" name="Lastname" id="txtLastname1"  required />
                                  </div>
                          <br>


                          <div>
                          <p>Birthdate:</p>
                                  <input onblur="requiredField(this);" class="form-control" type="date" name="Birthdate" id="txtBirthdate1" required>
                          </div>
                          <br>

                          <div class="col-1">
                                    <div class="col-1">
                                     <select  class="form-control" name="Gender" id="txtGender1" ng-model="Gender" required>
                                       <option value="" style="display:none" selected>Gender *</option>
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                    </select>
                                  </div>
                          </div>
                          <br>


                          <p>Address:
                            <div class="form-group">
                              <input onblur="requiredField(this);" class="form-control" type="text" placeholder="Floor/House No." name="FloorHouseNo" id="txtFloorHouseNo1"  required/><Br>
                              <input onblur="requiredField(this);" class="form-control" type="text" placeholder="Building" name="Building" id="txtBuilding1"  required/>
                              <br>
                              <input onblur="requiredField(this);" class="form-control" type="text" placeholder="Street" name="Street" id="txtStreet1"  required/>
                              <br>
                              <div class="form-group">
                                  <div>
                                      <select name="Barangay" id="txtBarangay1" class="form-control" ng-model="Barangay" required>
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
                                      <select name="AddressType" id="txtAddressType1" class="form-control" ng-model="address.type" required>
                                          <option value="" style="display:none" selected>Select Address Type *</option>
                                          <option value="Residential">Residential</option>
                                          <option value="Office">Office</option>
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                    <div>
                                        <select name="SanJuanCity" id="txtSanJuanCity1" class="form-control" ng-model="SanJuanCity" required>
                                            <option value="" style="display:none" selected>Select City</option>
                                            <option value="San Juan City">San Juan City</option>
                                        </select>
                                    </div>
                              </div>
                              <br>

                              <div class="col-1">
                                <p>Contact Details:</p>

                                <input  onblur="requiredField(this);" class="form-control" type="email" placeholder="Email Address" name="EmailAddress" id="txtEmailAddress1"  required/>
                              </div><br>

                              <div class="col-1">
                                <input  onblur="requiredField(this); phone();" class="form-control" type="text" placeholder="Phone Number" maxlength="11" name="PhoneNumber" onkeypress="return isNumber(event); "onkeyup ="phoneExist(); " id="txtPhoneNumber1"  required/>
                              </div>
                                     <div id='validation1' style="display: none;">
                                          <label style="color: red;">Phone number already exist</label>
                                       </div>
                              <br>

                              <div class="col-1">
                                <input onblur="requiredField(this);" class="form-control" type="text" placeholder="Username" name="Username" id="txtUsername1" onkeyup ="nameExist();"  required/>
                              </div>
                                <div id='validation' style="display: none;">
                                  <label style="color: red;">Username already exist</label>
                               </div>
                              <br>

                              <div class="col-1">
                                <input onblur="requiredField(this); success();" class="form-control" type="password" placeholder="Password" name="Password" id="txtPassword1"  required />
                              </div>
                              <br>

                              <div>
                                <div class="col-1">
                                 
                                   <input class="form-control"  type="text" name="IsAdmin" id="txtIsAdmin1"  required/><br>
                                  <input class="form-control" type="hidden" placeholder="0" value="0" name="IsBlocked" id="txtIsBlocked1" />
                                  <input class="form-control" type="hidden" placeholder="1" value="1" name="Active" id="txtActive1" />
                                  <input class="form-control" type="hidden" placeholder="0" value="0" name="Deleted" id="txtDeleted1" />
                                  <input class="form-control" type="hidden" placeholder="" value="" name="SeqID" id="txtSeqID1"/>
                                </div>
                              </div>



                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="Submit" name="btn_edit" id="btn_edit" class="btn btn-default" onclick="msg();">Submit</button>
                        </form>
      </div>
    
    </div>
       </div>
    
    </div>



       <!--     <script language="javascript" type="text/javascript" src="asset/js/jquery-3.3.1.js"></script>
           <script language="javascript" type="text/javascript" src="asset/js/customscript.js"></script>
           <script language="javascript" type="text/javascript" src="./controller/userList.js"></script>
           <script language="javascript" type="text/javascript" src="./controller/userServlet.js"></script> -->
  </body>
</html>

 <script>

          function msg()
          { 
           if (input.value.length < 1)
           {
            alert('Updated Failed');
           }
           else

            alert('Updated Successfully');
          }





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




      $(document).ready(function(){
      $(document).on('click','a[data-role=update]',function(){
       
       
       var userID = $(this).data('id');
    



         var txtfirstname = $('#'+userID).children('td[data-target=fname]').text();
         $('#txtfirstname1').val(txtfirstname);

           var txtLastname = $('#'+userID).children('td[data-target=lname]').text();
         $('#txtLastname1').val(txtLastname);

           var txtBirthdate = $('#'+userID).children('td[data-target=bday]').text();
         $('#txtBirthdate1').val(txtBirthdate);

          var txtGender = $('#'+userID).children('td[data-target=gender]').text();
         $('#txtGender1').val(txtGender);

          var txtFloorHouseNo = $('#'+userID).children('td[data-target=houseNo]').text();
         $('#txtFloorHouseNo1').val(txtFloorHouseNo);


          var txtBuilding = $('#'+userID).children('td[data-target=building]').text();
         $('#txtBuilding1').val(txtBuilding);

          var txtStreet = $('#'+userID).children('td[data-target=street]').text();
         $('#txtStreet1').val(txtStreet);

          var txtBarangay = $('#'+userID).children('td[data-target=barangay]').text();
         $('#txtBarangay1').val(txtBarangay);

          var txtAddressType = $('#'+userID).children('td[data-target=AddressType]').text();
         $('#txtAddressType1').val(txtAddressType);

          var txtSanJuanCity = $('#'+userID).children('td[data-target=city]').text();
         $('#txtSanJuanCity1').val(txtSanJuanCity);

          var txtEmailAddress = $('#'+userID).children('td[data-target=emailAdd]').text();
         $('#txtEmailAddress1').val(txtEmailAddress);


          var txtPhoneNumber = $('#'+userID).children('td[data-target=phoneNumber]').text();
         $('#txtPhoneNumber1').val(txtPhoneNumber);

           var txtUsername = $('#'+userID).children('td[data-target=username]').text();
         $('#txtUsername1').val(txtUsername);



          var txtIsAdmin = $('#'+userID).children('td[data-target=isAdmin]').text();
         $('#txtIsAdmin1').val(txtIsAdmin);

           var txtIsBlocked = $('#'+userID).children('td[data-target=IsBlocked]').text();
         $('#txtIsBlocke1').val(txtIsBlocked);

          var txtActive = $('#'+userID).children('td[data-target=active]').text();
         $('#txtActive1').val(txtActive);

          var txtDeleted = $('#'+userID).children('td[data-target=deleted]').text();
         $('#txtDeleted1').val(txtDeleted);

          var txtPassword = $('#'+userID).children('td[data-target=password]').text();
         $('#txtPassword1').val(txtPassword);

          var userID = $('#'+userID).children('td[data-target=userID]').text();
         $('#userID').val(userID);


          alert(txtIsAdmin);
        $('#exampleModal1').modal('toggle');

  });

    });




        </script>