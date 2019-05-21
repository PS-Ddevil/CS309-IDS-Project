<?php 
include "../connect.php";
session_start();
?>
<html>
    <head>
        <title>Payment</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body style="font-family: 'Open Sans', sans-serif;">
    <div class="container">
    <div class="centered title"><h1>Welcome to our checkout.</h1></div>
    </div>
    <hr class="featurette-divider"></hr>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="tab-content">
           <div id="stripe" class="tab-pane fade in active">
              <form accept-charset="UTF-8"  class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" /><input name="_method" type="hidden" value="PUT" /><input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" /></div>
              <br>
              <div class='form-row'>
                <div class='form-group required'>
                  <div class='error form-group hide'>
                    <div class='alert-danger alert'>
                      Please correct the errors and try again.
                    </div>
                  </div>
                <label class='control-label' name="name">Name on Card</label>
                <input class='form-control' size='4' type='text'>
                </div>
              </div>
              <div class='form-row'>
                <div class='form-group card required'>
                  <label class='control-label'>Card Number</label>
                  <input autocomplete='off' class='form-control card-number' size='20' type='text'>
              </div>
              </div>
              <div class='form-row'>
                <div class='form-group card required'>
                  <label class='control-label'>Billing Address</label>
                  <input autocomplete='off' class='form-control' size='20' type='text'>
                </div>
              </div>
              <div class='form-row'>
                <div class='form-group cvc required'>
                  <label class='control-label'>CVC</label>
                  <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                </div>
                <div class='form-group expiration required'>
                  <label class='control-label'>Expiration</label>
                  <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                </div>
                <div class='form-group expiration required'>
                  <label class='control-label'>Year</label>
                  <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                </div>
              </div>
  
              <div class='form-row'>
                <div class='form-group'>
                  <label class='control-label'></label>
                  <button class='form-control btn btn-primary' type='submit'> Continue </button>
              </form>    
              </div>
            </div>    
            </div>
            </div>        
        </div>   
     
        <div class="col-sm-6">
          <br><br><br>
          <div class="jumbotron jumbotron-flat">
          <div class="center"><h2><i>Total Payment:</i></h2></div>
            <div class="paymentAmt"> 
              <?php 
                  $sql = "SELECT cart.quantity * (product.Cost)* (1 -  product.Discount/100) as cost
                  FROM product
                  INNER JOIN cart ON product.ProductID=cart.ProductID and cart.CustomerID=".$_SESSION['id'].";"; 
                  $re_result = $conn->query($sql);
                  if($row = $re_result->fetch_assoc() == ""){ 
              ?>
                    <div class="jumbotron">
                        <div class="container">
                        <h3 class="display-4">You currently do not have any product in your cart</h3><br>
                        <p class="lead"><a href=".">Continue Shopping</a></p>
                        </div>
                    </div>
              <?php }
                else {
                    $re_result = $conn->query($sql);
                    $row = $re_result->fetch_assoc();
                    echo "<p>&#x24; ".(intval($row['cost']*1.4)/100)."</p>";
                }
              ?>
            </div>                
          </div>
          <br><br><br>
        </div>
        </div>
        </div>
        </div>
      </form>
    </body>
</html>