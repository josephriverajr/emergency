<?php
$connection = new PDO ("mysql:host=localhost;dbname=emergency","root","");
$sql = 'SELECT * FROM emergency.response where status != 0 ';
$statement = $connection->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_OBJ);
 session_start();

      if(isset($_POST['btn_submit']))
      {

/*type*/
    $name = "";
    $name = $_POST['name'];
     $_SESSION['name'] = $name;

    $Time = "";
    $Time = $_POST['Time'];
     $_SESSION['Time'] = $Time;

    $type = "";
    $type = $_POST['type'];
     $_SESSION['type'] = $type;


    $Phone = "";
    $Phone = $_POST['Phone'];
     $_SESSION['Phone'] = $Phone;

         $id=" ";
     $id = $_POST['id'];
     $_SESSION['id'] = $id;

$latitude = " ";
          $latitude = $_POST['latitude'];
     $_SESSION['latitude'] = $latitude;


  $longtitude = " ";
      $longtitude = $_POST['longtitude'];
     $_SESSION['longtitude'] = $longtitude;
     echo $Phone.'<br>';
    echo $name.'<br>';
 
     echo $id.'<br>';

     echo $longtitude.'<br>';
     echo $Time.'<br>';
     echo $type.'<br>';
     echo $latitude.'<br>';
    header("location: getlocation.php");




   }
$username = $_SESSION["username"];
   if (!isset($_SESSION["username"]))
    header("location: ../index.php");
?>


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

<style>
td
{
  text-transform: capitalize;
}
.container
{
  padding-top: 2% !important;
}
.results tr[visible='false'],
.no-result{
  display:none;
}

.results tr[visible='true']{
  display:table-row;
}

.counter{
  padding:8px; 
  color:#ccc;
}
hr
{
  border: none;
  height: 5px !important; 
  color: gray;
  background-color: gray;
}

</style>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
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
            <li class="dropdown" style="position: absolute;z-index: -1;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-globe" style="font-size:18px;"></span></a>
              <ul class="dropdown-menu"></ul>
            </li> 
            <li><a href="../logout.php"><?php echo "Welcome $username -"; ?>Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>
 

  <body>
<ul   style="margin-bottom: 1%; position: relative; left: 85%;color:white;">
 <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-globe" style="font-size:18px;"></span></a>
              <ul class="dropdown-menu"></ul>
            </li> 
</ul>
 
<div class="container">
  <select id="myInput" onchange="myFunction()"  class="form-control" style="width:15%; float: right;" >
      <option value="">Select</option>
      <option>Ambulance</option>
      <option>Police</option>
      <option>Fire</option>
      <option value="traf">Traffic</option>
  </select>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
    <tr>
                    <th hidden><center>ID</center></th>
                    <th hidden><center>ID</center></th>
                    <th><center>ID</center></th>
                    <th><center>USER ID</center></th>
                    <th><center>Name</center></th>
                    <th><center>Phone</center></th>
                    <th><center>Time</center></th>
                    <th><center>Type</center></th>
                    <th><center>Action</center></th>
                    </thead>
                    <tbody>
                       <?php foreach($results as $result): ?>
          <tr id="<?= $result->id; ?>">
            <td data-target="longtitude" hidden><?= $result->longtitude; ?></td>
            <td data-target="latitude" hidden><?= $result->latitude; ?></td>
            <td data-target="id"><?= $result->id; ?></td>
            <td data-target="userid"><?= $result->userID; ?></td>
            <td data-target="name"><?= $result->name; ?></td>
            <td data-target="Phone"><?= $result->Phone; ?></td>
            <td data-target="Time"><?= $result->Time; ?></td>
             <td data-target="type"><?= $result->type; ?></td>
            <td ><center>
        <!--       <a href="addnewpackage.php?package_id=<?= $package->package_id ?>" class="fa fa-plus-square" style="margin: 5px;"}"></a> -->
              <a href="#" data-role="update" data-id="<?= $result->id; ?>" class="fa fa-eye"></a>
          </tr>
        <?php endforeach; ?>
                   </tbody>
                  </table>

</div>


<!-- Edit moda; -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="submit_form" method="POST" action="getlocation.php"  target="_blank">
    
   
    <!-- <input class="form-control" type="text" name="userid"  id="userid"> -->
             
       
       <!--   <label>Name</label>
        <input class="form-control" type="text" name="name" id="name" value="" disabled>
        <br>
     
        <br>
        <label>Time</label>
        <input class="form-control" type="text" name="Time" id="Time" value="" disabled>
        <br>
        <label>Type</label>
        <input class="form-control" type="text" name="type" id="type" value="" disabled>
        <br> -->
        <!-- <div style="display: none!important">
          <label>Longtitude</label>
        <input class="form-control" type="text" name="longtitude" id="longtitude" value="" style="display: none!important">
        <br>
        <label>latitude</label>
        <input class="form-control" type="text" name="latitude" id="latitude" value="" >
        </div> -->


          
  <!--     <div style="float:right">
        <br>
       <input type="submit" name="" value="View" class="btn btn-info" id="myDiv" style="display: none;" >  
    
     </div> -->
      </form>

      <form method="POST">
         <!-- <label>Phone</label>
        <input class="form-control" type="text" name="Phone" id="Phone" value="" disabled> -->
        <div style="display: none!important">
          <label>Longtitude</label>
        <input class="form-control" type="text" name="longtitude" id="longtitude" value="" style="display: none!important">
        <br>
        <label>latitude</label>
        <input class="form-control" type="text" name="latitude" id="latitude" value="" >
        </div>
        <!-- <label>Name</label>
        <input class="form-control" type="text" name="name" id="name" value="" disabled>
        <br> -->
     
       
       
        
        <input class="form-control" type="text" name="name"  id="name" readonly ="" >
        <input class="form-control" type="text" name="Phone"  id="Phone" readonly ="" >
        <input class="form-control" type="text" name="id"  id="id" readonly ="" >
        <input class="form-control" type="text" name="Time"  id="Time" readonly ="" >
         <input class="form-control" type="text" name="type"  id="type" readonly ="" >
        <center>
        <input type="submit" name="btn_submit" id="btn_submit" value="Respond" class="btn btn-success"> 
        <input class="form-control" type="text" name="userid"  id="userid" style="display: none">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </center>
      </form>
      </div>
    
    </div>
  </div>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<script>
/*$(document).ready(function () {
$('#dataTables-example').dataTable();
  "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, "All"]]
});*/
$(document).ready(function() {
    $('#dataTables-example').DataTable( {
        "lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]],
           stateSave: true,
    "bDestroy": true
    } );
} );

</script>

  <script>
function buttonview()
{
  document.getElementById('myDiv').style.display = "block"; 
}





    $(document).ready(function(){
      $(document).on('click','a[data-role=update]',function(){
      
       
        var id = $(this).data('id');
        var userid = $(this).data('userid');
         var name = $(this).data('name');
         var Phone = $(this).data('Phone');
          var Time = $(this).data('Time');
         var type = $(this).data('type');
         var longtitude = $(this).data('longtitude');
         var latitude = $(this).data('latitude');

        var id = $('#'+id).children('td[data-target=id]').text();
        var userid = $('#'+id).children('td[data-target=userid]').text();
        var name = $('#'+id).children('td[data-target=name]').text();
        var Phone = $('#'+id).children('td[data-target=Phone]').text();
        var Time = $('#'+id).children('td[data-target=Time]').text();
        var type = $('#'+id).children('td[data-target=type]').text();
        var longtitude = $('#'+id).children('td[data-target=longtitude]').text();
        var latitude = $('#'+id).children('td[data-target=latitude]').text();
        



        $('#id').val(id);
         $('#userid').val(userid);
        $('#name').val(name);
        $('#Phone').val(Phone);
        $('#Time').val(Time);
        $('#type').val(type);
         $('#longtitude').val(longtitude);
         $('#latitude').val(latitude);
        $('#exampleModal1').modal('toggle');

  });
    });




  </script>
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
          /*    var name1 = document.getElementById('name').value;
        alert(name1);*/
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
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTables-example");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[7];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
