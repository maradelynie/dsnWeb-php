<?php
session_start();
include '_servidor.php';
include '_tela_aviso.php';
echo $begin;

if($_POST['IDreserva']!=0){

    try{
            
        $sql = "SELECT * FROM `tblreserva` WHERE `idReserva` = ".$_POST['IDreserva']." "; 
            
            $res = $db->query($sql);
            $res = $db->prepare($sql);
            $res->bindValue(1, '%a%');
            $res->execute();
            
            $pes = $res->fetchAll(PDO::FETCH_OBJ);


            if(!$_POST['IDcliente']){
                $_POST['IDcliente'] = $pes[0]->idCliente;
            }
            if(!$_POST['IDapartamento']){
                $_POST['IDapartamento'] = $pes[0]->idApartamento;
            }
            if(!$_POST['qtdhospedes']){
                $_POST['qtdhospedes'] = $pes[0]->qtdHospedes;
            }
            if(!$_POST['datareserva']){
                $_POST['datareserva'] = $pes[0]->dataReserva;
            }
            if(!$_POST['dataCheckin']){
                $_POST['dataCheckin'] = $pes[0]->dataCheckin;
            }
            if(!$_POST['dataCheckout']){
                $_POST['dataCheckout'] = $pes[0]->dataCheckout;
            }
            if(!$_POST['checkin']){
                $_POST['checkin'] = $pes[0]->checkin;
            }
            if(!$_POST['checkout']){
                $_POST['checkout'] = $pes[0]->checkout;
            }
            if(!$_POST['valortotal']){
                $_POST['valortotal'] = $pes[0]->valorTotalReserva;
            }
            if(!$_POST['valorpago']){
                $_POST['valorpago'] = $pes[0]->valorPago;
            }

            try{

               
                $sql = "UPDATE `tblreserva` SET
                
                `idCliente` = '".$_POST['IDcliente']."', 
                `idApartamento` = '".$_POST['IDapartamento']."', 
                `qtdHospedes` = '".$_POST['qtdhospedes']."', 
                `dataReserva` = '".$_POST['datareserva']."', 
                `dataCheckin` = '".$_POST['dataCheckin']."', 
                `dataCheckout` = '".$_POST['dataCheckout']."', 
                `checkin` = '".$_POST['checkin']."', 
                `checkout` = '".$_POST['checkout']."', 
                `valorTotalReserva` = '".$_POST['valortotal']."', 
                `valorPago` = '".$_POST['valorpago']."'
                 
                WHERE `tblreserva`.`idReserva` = ".$_POST['IDreserva']." ";
                
                $res = $db->query($sql);
                $resError = $db->errorCode  ();
                if($resError == 0){
                    echo "Registro alterado com sucesso";

                }else{
                    echo "Erro ".json_encode($db->errorInfo()[2]) ;
                }
                $db=null;
            }
            catch(PDOException $e) { 
              echo $e->getMessage();
            }
            
    	$db=null;

    }
    catch(PDOException $e) { 
    echo $e->getMessage();
    }


}else {
    if(date("Y")<=substr($_POST['dataCheckin'],0,4) and date("m")<=substr($_POST['dataCheckin'],5,2)and date("d")<=substr($_POST['dataCheckin'],8,2)){
        
        if(substr($_POST['dataCheckin'],0,4)<=substr($_POST['dataCheckout'],0,4) and substr($_POST['dataCheckin'],5,2)<=substr($_POST['dataCheckout'],5,2) and substr($_POST['dataCheckin'],8,2)<=substr($_POST['dataCheckout'],8,2)){
            try{

                $sql = "INSERT INTO tblreserva 
                (`idReserva`, 
                `idCliente`, 
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
                (NULL, '".$_POST['IDcliente']."', '".$_POST['IDapartamento']."', '".$_POST['qtdhospedes']."', '".$_POST['datareserva']."', '".$_POST['dataCheckin']."', '".$_POST['dataCheckout']."', '".$_POST['checkin']."', '".$_POST['checkout']."', '".$_POST['valortotal']."', '".$_POST['valorpago']."')
                "; 
                
                $resError = $db->errorCode  ();
                if($resError == 0){
                    echo "Registro criado com sucesso " ;
                }else{
                    echo "Erro ".json_encode($db->errorInfo()[2]) ;
                }
                
                $db=null;
            }
            catch(PDOException $e) { 
              echo $e->getMessage();
            }
        
        } else { 
            echo 'checkout com data invalida';
        };
    }else{
        echo 'checkin com data invalida';
    };

}

echo $end;

?>

