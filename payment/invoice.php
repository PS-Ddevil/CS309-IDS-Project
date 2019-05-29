<?php
include "../connect.php";
session_start();
$id=$_SESSION["id"];
$transid = $_POST['transid'];
$sql_on_view = "SELECT * FROM invoice_info";
$detail = "Select * from customer WHERE customerid = ".$id.";";
$result = $conn->query($sql_on_view);
$result_transid = $conn->query($sql_on_view);
$result1 = $conn->query($detail);
$row1 = $result1->fetch_assoc();
$address = $row1['BillingAddress'];
$email = $row1['Email'];
$name = $row1['CustomerName'];
$phone = $row1['Phone'];
$total=0;
$row_transid = $result_transid->fetch_assoc();
$invoice_no = $transid;
$date = $row_transid['time_inv'];
require('fpdf181/fpdf.php');
$pdf=new FPDF('p','mm','A4');
$pdf->AddPage();
// $pdf->Image('../images/logo.png',10,10,-300);
$pdf->Cell(100,5,'',0,1);
$pdf->Cell(70,5,'',0,1);
$pdf->Cell(100,5,'',0,1);
$pdf->Cell(70,5,'',0,1);
$pdf->Cell(100,5,'',0,1);
$pdf->Cell(70,5,'',0,1);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(100,5,'INVOICE NO.',0,0);
$pdf->Cell(50,5,'DATE OF ISSUE',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,5,$invoice_no,0,0);
$pdf->Cell(50,5,$date,0,1);

$pdf->Cell(100,5,'',0,1);
$pdf->Cell(70,5,'',0,1);

$pdf->SetFont('Arial','B',16);
$pdf->Cell(100,5,'',0,0);
$pdf->Cell(50,5,'SABKA DUKAN',0,1);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(100,5,'BILLED TO',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,'B-7 Nako Hostel',0,1);
$pdf->Cell(100,5,$name,0,0);
$pdf->Cell(50,5,'IIT Mandi,Kamand',0,1);
$pdf->Cell(100,5,$address,0,0);
$pdf->Cell(50,5,'Pin No.:-175005',0,1);
$pdf->Cell(100,5,$phone,0,0);
$pdf->Cell(50,5,'Mandi',0,1);
$pdf->Cell(100,5,$email,0,0);
$pdf->Cell(50,5,'Mandi, Himachal Pradesh',0,1);
$pdf->Cell(100,5,'',0,0);
$pdf->Cell(50,5,'sinhapurushottam911@gmail.com',0,1);

$pdf->Cell(100,5,'',0,1);
$pdf->Cell(100,5,'',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,5,'ITEMS',1,0);
$pdf->Cell(30,5,'UNIT COST',1,0);
$pdf->Cell(30,5,'QUANTITY',1,0);
$pdf->Cell(30,5,'AMOUNT',1,1);

$pdf->SetFont('Arial','',10);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $price=intval($row["product_price"]*100)*$row["history_quantity"]/100;
        $total=$total+$price;
        $pdf->Cell(100,5,$row["product_name"],1,0);
        $pdf->Cell(30,5,(intval($row["product_price"]*100)/100).'/-',1,0);
        $pdf->Cell(30,5,$row["history_quantity"].'/-',1,0);
        $pdf->Cell(30,5,$price.'/-',1,1);
        }
}
$pdf->Cell(160,5,'',0,0);
$pdf->Cell(30,5,$total.'/-',1,1);

$pdf->Output();
?>