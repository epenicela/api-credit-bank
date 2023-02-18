<?php
use App\Entity\Check;
//Aqui seira o json


$dados = Check::toArray(Check::getAll("credit_account_id=$credit_account_id"));
if($dados){
    //$dados = $obFactor->toArray($dados);
    echo json_encode(['digitalCheck' => $dados], false);
}else{
    $dados = Check::toArray(null);
    echo json_encode(['digitalCheck' => $dados], false);
}

/*echo "credit_text ".$credit_text."<br>";
echo "credit_account_id ".$credit_account_id."<br>";
echo "value_text ".$value_text."<br>";
echo "value ".$value."<br>";*/

