<?php
session_start();

include '_servidor.php';

$checkin = $_GET["checkin"];

try{

    
    $sql = "SELECT * FROM tblreserva where idReserva='".$checkin."' "; 
	
    $res = $db->query($sql);
    $res = $db->prepare($sql);
    $res->bindValue(1, '%a%');
    $res->execute();
    
    $pes = $res->fetchAll(PDO::FETCH_OBJ);
    $teste= $pes[0];
    

    if($teste->checkin){
        echo "este checkin ja havia sido feito.";
    }else{

        $sql = "UPDATE `tblreserva` SET `checkin` = '1' WHERE `tblreserva`.`idReserva` = '".$checkin."' "; 
	
        echo "checkin feito";
    }
	
}
catch(PDOException $e) { 
    echo "Erro:";
  echo $e->getMessage();
}
?>

