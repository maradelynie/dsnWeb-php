<?php
session_start();

include '_servidor.php';
include '_tela_aviso.php';

echo $begin;

    try{
        
        $sql = "SELECT * FROM tblreserva where idReserva='".$_POST['idReserva']."' "; 
        
        $res = $db->query($sql);
        $res = $db->prepare($sql);
        $res->bindValue(1, '%a%');
        $res->execute();
        
        $reserva = $res->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e) { 
        echo "Erro:";
    echo $e->getMessage();
    }
    try{
        
        $sql = "SELECT * FROM tblcliente where cpf='".$_SESSION['cpf']."' "; 
        
        $res = $db->query($sql);
        $res = $db->prepare($sql);
        $res->bindValue(1, '%a%');
        $res->execute();
        
        $cliente = $res->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e) { 
        echo "Erro:";
    echo $e->getMessage();
    }

    if($cliente[0]->id==$reserva[0]->idCliente){

        if(!isset($_POST['idProduto'])){


            try{
            
                $sql = "SELECT * FROM tblservico where idServico='".$_POST['idServico']."' "; 
                
                $res = $db->query($sql);
                $res = $db->prepare($sql);
                $res->bindValue(1, '%a%');
                $res->execute();
                
                $servico = $res->fetchAll(PDO::FETCH_OBJ);

            }
            catch(PDOException $e) { 
                echo "Erro:";
            echo $e->getMessage();
            }

            $sql = "INSERT INTO tblreservaservico 
            (`idReserva`, 
            `idServico`, 
            `realizado`, 
            `valor`) 
            VALUES
            ('".$reserva[0]->idReserva."', '".$_POST['idServico']."', '0', '".$servico[0]->valor."')
            "; 
            
            $res3 = $db->query($sql);
        
            $resError = $db->errorCode  ();
            if($resError == 0){
                echo "Produto adicionado.";

            }else{
                echo "Erro ".json_encode($db->errorInfo()[2]) ;
            }
                    
            $db=null;


        }else{
            try{
            
                $sql = "SELECT * FROM tblproduto where idProduto='".$_POST['idProduto']."' "; 
                
                $res = $db->query($sql);
                $res = $db->prepare($sql);
                $res->bindValue(1, '%a%');
                $res->execute();
                
                $produto = $res->fetchAll(PDO::FETCH_OBJ);

            }
            catch(PDOException $e) { 
                echo "Erro:";
            echo $e->getMessage();
            }

            $sql = "INSERT INTO tblreservaproduto 
            (`idReserva`, 
            `idProduto`, 
            `qtd`, 
            `valor`) 
            VALUES
            ('".$reserva[0]->idReserva."', '".$_POST['idProduto']."', '".$_POST['qtd']."', '".$produto[0]->valor."')
            "; 
            
            $res3 = $db->query($sql);
        
            $resError = $db->errorCode  ();
            if($resError == 0){
                echo "Produto adicionado.";

            }else{
                echo "Erro ".json_encode($db->errorInfo()[2]) ;
            }
                    
            $db=null;
        }

    }else{
        echo "Reserva não consta em seu nome.";
    }
echo $end;
?>

