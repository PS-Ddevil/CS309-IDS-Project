<?php
    include "../connect.php";
    session_start();

    $number = $_POST['crno'];
    $cvc = $_POST['cvc'];
    /* Luhn algorithm number checker - (c) 2005-2008 shaman - www.planzero.org *
    * This code has been released into the public domain, however please      *
    * give credit to the original author where possible.                      */
    
    if(luhn_check($number) && ($number > 0)){
        if(count_digit($cvc) == "3"){
            if( (($_POST['month'] >= date('m')) && ($_POST['month'] <= 12) && ($_POST['year'] == date('Y'))) || ($_POST['year'] > date('Y')) ){
                  // echo $_POST['year'];  
                header('Location: add_to_history.php');
                }else{
                echo 'Your Expiry Date information is Invalid!';
            }
        }else{
            echo 'Your CVC is not valid';
        }
    }else{
        echo "Your Credit Card Number is not valid";
    }


    function luhn_check($number) {

      // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
      $number=preg_replace('/\D/', '', $number);

      // Set the string length and parity
      $number_length=strlen($number);
      $parity=$number_length % 2;

      // Loop through each digit and do the maths
      $total=0;
      for ($i=0; $i<$number_length; $i++) {
        $digit=$number[$i];
        // Multiply alternate digits by two
        if ($i % 2 == $parity) {
          $digit*=2;
          // If the sum is two digits, add them together (in effect)
          if ($digit > 9) {
            $digit-=9;
          }
        }
        // Total up the digits
        $total+=$digit;
      }

      // If the total mod 10 equals 0, the number is valid
      return ($total % 10 == 0) ? TRUE : FALSE;
    }

    function count_digit($number) {
        return strlen($number);
      }
    ?>