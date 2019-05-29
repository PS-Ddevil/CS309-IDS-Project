<?php
include "../connect.php";
session_start();
$id=$_SESSION["id"];
$transid = $_POST['transid'];
$sql = "CREATE OR REPLACE VIEW invoice_info AS SELECT history.time as time_inv, history.Quantity as history_quantity , product.ProductID as prodid ,product.PName as product_name, history.Purchase_Price as product_price
FROM product
INNER JOIN history ON product.ProductID=history.ProductID and history.TransactionID=".$transid.";";
$sql_on_view = "SELECT * FROM invoice_info";
// echo $sql;
$detail = "Select * from customer WHERE customerid = ".$id.";";
// echo $sql;
$conn->query($sql);
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
?>
<html>
    <head>
        <title>Invoice</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <div>
            <h2><center><u><b>INVOICE STATEMENT</b></u></center></h2>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-xs-6 col-lg-6 col-sm-6 col-md-6">
                <h3><b>Invoice No.</b></h3>
                <h4><?php echo $invoice_no ?></h4>
            </div>
            <div class="col-xs-6 col-lg-6 col-sm-6 col-md-6">
                <h3><b>Time of Issue</b></h3>
                <h4><?php echo $date ?></h4>
            </div>
        </div>
            <br><hr><br>
        <div class="row">
            <div class="col-xs-6 col-lg-6 col-sm-6 col-md-6">
                <h3><b>Billed to</b></h3>
                <h4><?php echo $name ?></h4>
                <h4><?php echo $address ?></h4>
                <h4><?php echo $phone ?></h4>
                <h4><?php echo $email ?></h4>
            </div>
            <div class="col-xs-6 col-lg-6 col-sm-6 col-md-6">
                <h3><b>Sabka Dukan</b></h3>
                <h4>B-7 Nako Hostel</h4>
                <h4>IIT Mandi,Kamand</h4>
                <h4>Pin No.:-175005</h4>
                <h4>Mandi, Himachal Pradesh</h4>
                <h4>sinhapurushottam911@gmail.com</h4>
            </div>
        </div>
        <br><hr><br>
        <table style="width:100%">
        <?php 
        if ($result->num_rows > 0) {
        ?>
            <tr>
            <th>Name</th>
            <th>Product Price</th>
            <th>Total</th>
            <th>Total Amount</th>
        </tr>
        <?php
            while($row = $result->fetch_assoc()) {
                $price=intval($row["product_price"]*100)*$row["history_quantity"]/100;
                $total=$total+$price;
        ?>
        <tr>
            <td><?php echo $row["product_name"]?></td>
            <td><?php echo intval($row["product_price"]*100)/100 ?></td>
            <td><?php echo $row["history_quantity"] ?></td>
            <td><?php echo $price ?></td>
        </tr>
        <?php 
            }}
        ?>
        </table> 
        <hr>
        <form action="invoice.php" method="POST">
            <input type="hidden" name="transid" value="<?php echo $transid ?>">
            <center>
            <button onclick="printPage()">Download Invoice</button>
            </center>
        <form>
        </div>
    </body>
</html>

        
