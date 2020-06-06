<?php
session_start();

include '_servidor.php';
$hoje = date("Y").'-'.date("m").'-'.date("d");
$cliente = $_SESSION['id'];


if(date("Y")<=substr($_POST['checkin'],0,4)and date("m")<=substr($_POST['checkin'],5,2)and date("d")<=substr($_POST['checkin'],8,2)){
    
    if(substr($_POST['checkin'],0,4)<=substr($_POST['checkout'],0,4) and substr($_POST['checkin'],5,2)<=substr($_POST['checkout'],5,2) and substr($_POST['checkin'],8,2)<=substr($_POST['checkout'],8,2)){
    } else { 
        echo 'checkout com data invalida';
    };
}else{
    echo 'checkin com data invalida';
};

try{
    
    if($_SESSION['perfil']!=2){
        try{
            $sql = "SELECT * FROM tblcliente where cpf='".$_POST['cpf']."' "; 
            
            $res = $db->query($sql);
            $res = $db->prepare($sql);
            $res->bindValue(1, '%a%');
            $res->execute();
            
            $pes = $res->fetchAll(PDO::FETCH_OBJ);
            $pes= $pes[0];
            
            
            $cliente = $pes->id;
            
        }
        catch(PDOException $e) { 
            echo "Erro:";
          echo $e->getMessage();
        }
    }
	
	$sql = "INSERT INTO tblreserva 
    (`idReserva`, 
    `idUsuario`, 
    `idApartamento`, 
    `qtdHospedes`, 
    `dataReserva`, 
    `dataCheckin`, 
    `dataCheckout`, 
    `checkin`, 
    `checkout`, 
    `valorTotalReserva`, 
    `valorPago`) 
    VALUES
    (NULL, '".$_SESSION['id']."', '1', '".$_POST['qnthospedes']."', '".$hoje."', '".$_POST['checkin']."', '".$_POST['checkout']."', '0', '0', '1515', '0')
    "; 
	
	$res = $db->query($sql);
    
    echo "reservado";
	
	$db=null;
}
catch(PDOException $e) { 
  echo $e->getMessage();
}
?>

