<?php

include 'pdf_mc_table.php';
session_start();
       

$connection = new PDO ("mysql:host=localhost;dbname=finelight","root","");
/*$invID= $_SESSION["receipt"];  ; 

$sql = 'SELECT sales.name,sales.mname,sales.sname,sales.school,sales.total,sales.payment,sales.status,sales.cashChange  FROM temp INNER JOIN sales ON temp.invID = sales.invID WHERE temp.invID=:invID';
$statement = $connection->prepare($sql);
$statement->execute([':invID' => $invID ]);
$records = $statement->fetch(PDO::FETCH_OBJ);


$haha = $records->name ;
$mname = $records->mname;
$sname = $records->sname;


$school = $records->school;
$total = $records->total;
$status = $records->status;
$payment = $records->payment;
*/

$pdf = new PDF_MC_Table();
$pdf ->AddPage('L','a4',0);
$pdf -> SetFont('Arial','',14);
$today = date("M-d-Y");
$pdf -> Cell(300,5,'                                                           Summary Report                                               '.$today.' ',0,0,'C'); 
$pdf -> Ln(5);
$pdf -> Ln(10);
$pdf -> Cell(45,8,'User ID',1,0,'C');
$pdf -> Cell(55,8,' Name',1,0,'C');
$pdf -> Cell(55,8,'Phone',1,0,'C');
$pdf -> Cell(55,8,'Date',1,0,'C');
$pdf -> Cell(55,8,'Type',1,0,'C');
 $pdf -> Ln(8);
$pdf -> setWidths(Array(45,55,55,55,55));
$pdf-> setLineHeight(5);
   $stmt = $connection->query("SELECT id, UPPER(name) as name, Phone, Time, type FROM emergency.response where status != 0 ");
    while ($data = $stmt->fetch(PDO::FETCH_OBJ)) 
    {
      
      $pdf ->Row(Array(
      $data->id,
      $data->name,
      $data->Phone,
      $data->Time,
      $data->type,
    ));

   }



$pdf->Output();


?>
