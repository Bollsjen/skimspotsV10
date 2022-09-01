<?php
require(__DIR__ . "../../../../_secrets/SecretStuff.php");

if(isset($_POST['g-recapcha-response']) && $_POST['g-recapcha-response'] !== ""){
    function getCapcha($SecretKey){
      $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=". RecapchaSecret() ."&response={$SecretKey}");
      $return = json_decode($response);
      return $return;
    }
    $_return = getCapcha($_POST['g-recapcha-response']);
    var_dump($_return);
    if($_return->success == false || $_return->score <= 0.5){
        echo $_return->success;
        die();
        exit();
    }
   }else{
       echo "Du er en robot!";
       die();
       exit();
   }