<?php
include "../connect.php";
session_start();
$id=$_SESSION["id"];
$sql = "SELECT cart.quantity as product_quantity , product.ProductID as prodid ,product.PName as product_name, product.Cost*(1 - product.Discount/100) as product_price
FROM product
INNER JOIN cart ON product.ProductID=cart.ProductID and cart.CustomerID=".$_SESSION['id'].";";
$detail = "SElect * from customer ";
// $sql = "select  product.name as product_name,product.price as product_price,product.quantity as product_quantity,cart.quantity as cart_quantity from product inner join cart on cart.product_id=product.id where cart.customer_id=$id";
$result = $conn->query($sql);
$total=0;
require('/fpdf181/fpdf.php');
$pdf=new FPDF('p','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(100,5,'INVOICE NO.',0,0);
$pdf->Cell(50,5,'DATE OF ISSUE',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,5,'INVOICE NO.',0,0);
$pdf->Cell(50,5,'DATE OF ISSUE',0,1);

$pdf->Cell(100,5,'',0,1);
$pdf->Cell(70,5,'',0,1);

$pdf->SetFont('Arial','B',16);
$pdf->Cell(100,5,'',0,0);
$pdf->Cell(50,5,'SABKA DUKAN',0,1);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(100,5,'BILLED TO',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,'B-7 Nako Hostel',0,1);
$pdf->Cell(100,5,'[NAME]',0,0);
$pdf->Cell(50,5,'IIT Mandi,Kamand',0,1);
$pdf->Cell(100,5,'[Address]',0,0);
$pdf->Cell(50,5,'Pin No.:-175005',0,1);
$pdf->Cell(100,5,'[PIN CODE]',0,0);
$pdf->Cell(50,5,'Mandi',0,1);
$pdf->Cell(100,5,'[DISTRICT]',0,0);
$pdf->Cell(50,5,'Mandi, Himachal Pradesh',0,1);
$pdf->Cell(100,5,'[STATE]',0,0);
$pdf->Cell(50,5,'sinha@gmail.com',0,1);

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
        $price=$row["product_price"]*$row["cart_quantity"];
        $total=$total+$price;
        //$total=$total+$row["product_price"]*$row["cart_quantity"];
        $pdf->Cell(100,5,$row["product_name"],1,0);
        $pdf->Cell(30,5,$row["product_price"].'/-',1,0);
        $pdf->Cell(30,5,$row["cart_quantity"].'/-',1,0);
        $pdf->Cell(30,5,$price.'/-',1,1);
    } 
}$pdf->Cell(160,5,'',0,0);
$pdf->Cell(30,5,$total.'/-',1,1);
$pdf->Output();
?>

