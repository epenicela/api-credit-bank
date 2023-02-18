<?php

require __DIR__ . '../vendor/autoload.php';


if(isset($credit_text, $credit_account_id, $value, $value_text)){
   
    if ($method == 'GET') {
        //if ($credit_text == 'check' && $value_text=='ammount' && !$credit_account_id=='' && !$value=="") {
            include __DIR__ . '/controller/dodosControlers.php'; 
            //echo "OLAAAAAAAAAAAAAAAAAAAA";
        /*}else{
            echo 'nao enviou todo paramentros<br>';

            echo "credit_text '".$credit_text."'<br>";
            echo "credit_account_id '".$credit_account_id."'<br>";
            echo "value_text '".$value_text."'<br>";
            echo "value '".$value."'<br>";
        }*/
    }
}else{

}