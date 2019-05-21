
<!------ Include the above in your HEAD tag ---------->
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <div class="container text-center">
            <div class="row">
                <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <address>
                                <strong>Elf Cafe</strong>
                                <br>
                                2135 Sunset Blvd
                                <br>
                                Los Angeles, CA 90026
                                <br>
                                <abbr title="Phone">P:</abbr> (213) 484-6829
                            </address>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <p>
                                <em>Date: 1st November, 2013</em>
                            </p>
                            <p>
                                <em>Receipt #: 34522677W</em>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center">
                            <h1>Receipt</h1>
                        </div>
                        </span>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                session_start();
                                $_SESSION["ID"] = $_POST["id"];
                                $_SESSION["TOTAL"]=2;
                                include 'connection.php';
                                $conn = OpenCon();
                                $conn;
                                $id=$_SESSION["ID"];
                                $sql = "select  product.id as product_id,product.name as product_name,product.price as product_price,product.quantity as product_quantity,cart.quantity as cart_quantity from product inner join cart on cart.product_id=product.id where cart.customer_id=$id";
                                $result = $conn->query($sql);
                                $total=0;
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        if($row["cart_quantity"]<=$row["product_quantity"])
                                        {
                                            $quantity=$row["product_quantity"]-$row["cart_quantity"];
                                            $price=$row["product_price"]*$row["cart_quantity"];
                                            $total=$total+$price;
                                            $productId=$row["product_id"];
                                        // echo "id: " . $row["customer_id"]. " - Name: " . $row["product_id"]. "q " . $row["quantity"]. "<br>";
                                            //echo "<h1>". $row["customer_id"]."</h1>";  
                                            //$total=$total+$row["product_price"]*$row["cart_quantity"];
                                            echo "<tr><td ><em>".$row["product_name"]."</em></td>
                                            <td > ".$row["cart_quantity"]." </td>
                                            <td >".$row["product_price"]."/-</td>
                                            <td >".$price."/-</td></tr>";
                                            $sql1="update product set quantity=$quantity where id=$productId";
                                            $conn->query($sql1);

                                        }
                                        }
                                    }
                                    echo "<tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td >
                                    <p>
                                        <strong>Subtotal: </strong>
                                    </p>
                                    </td>
                                    <td >
                                    <p>
                                        <strong>".$total."/-</strong>
                                    </p></td>
                                </tr>";
                                $_SESSION["TOTAL"]=$total;
                                ?>
                                

                                
                                
                            </tbody>
                        </table>
                        <form action='/payment.php' method='POST'>
                            <button  class="text-center" type="submit">Pay</button>
                         </form></td>
                         
                    </div>
                    
                </div>
            </div>
    </body>
</html>
