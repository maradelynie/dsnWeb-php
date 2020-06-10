<?php
session_start();

include '_servidor.php';
include '_tela_aviso.php';
date_default_timezone_set("Brazil/East");

echo $begin;

$hoje = date('Y-m-d');

$idapt = $_POST['idapt'];
$valorpago = $_POST['valorpago'];
$idreserva = $_POST['idreserva'];

 


try{

    $sql = "UPDATE `tblreserva` SET `checkout` = '1', `valorPago` = ".$valorpago." WHERE `tblreserva`.`idReserva` = ".$idreserva." ; UPDATE `tblapartamento` SET `status` = '1' WHERE `tblapartamento`.`idApartamento` = ".$idapt.""; 
 
    
    $res = $db->query($sql);
    $resError = $db->errorCode  ();
    if($resError == 0){
        echo "Checkout conclído " ;
    }else{
        echo "Erro ".json_encode($db->errorInfo()[2]) ;
    }
    
    $db=null;
}
catch(PDOException $e) { 
    echo $e->getMessage();
}
    

echo $end;
?>

