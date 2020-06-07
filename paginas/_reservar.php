<?php
session_start();

include '_servidor.php';
include '_tela_aviso.php';

echo $begin;

$hoje = date("Y").'-'.date("m").'-'.date("d");


$checkindata = $_POST['checkin'];
$checkoutdata = $_POST['checkout'];


    if($checkindata>$hoje){
        
        if($checkoutdata>$checkindata){
            

            $checkoutdata = strtotime($checkoutdata); 
            $checkindata = strtotime($checkindata); 

            $dataFinal = ($checkoutdata - $checkindata)/86400;
            $dataFinal = $dataFinal +1;

            echo $dataFinal;

            if($checkoutdata<$hoje){
                echo "maior";
            }

            try{
                try{
                    if($_SESSION['perfil']!=1){
                    $sql = "SELECT * FROM tblusuario where idUsuario='".$_SESSION['id']."' "; 
                    
                    $res = $db->query($sql);
                    $res = $db->prepare($sql);
                    $res->bindValue(1, '%a%');
                    $res->execute();
                    
                    $pes = $res->fetchAll(PDO::FETCH_OBJ);
                    $pes= $pes[0];
                    
                    $clientecpf = $pes->cpf;
        
                    }else{
                    $clientecpf = $_POST['cpf'];
                    }
                    $sql2 = "SELECT * FROM tblcliente where cpf='".$clientecpf."' "; 
                
                    $res2 = $db->query($sql2);
                    $res2 = $db->prepare($sql2);
                    $res2->bindValue(1, '%a%');
                    $res2->execute();
                    
                    $pes2 = $res2->fetchAll(PDO::FETCH_OBJ);
                    
                }
                catch(PDOException $e) { 
                    echo "Erro:";
                echo $e->getMessage();
                }
                if($pes2!=[]){
                    $pes2= $pes2[0];
                    $cliente = $pes2->id;

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
                    (NULL, '".$cliente."', '1', '".$_POST['qnthospedes']."', '".$hoje."', '".$_POST['checkin']."', '".$_POST['checkout']."', '0', '0', '1515', '0')
                    "; 
                    
                    $res3 = $db->query($sql);
                    
                    $res3 = $db->lastInsertId();
    
                    echo "Reserva realizada, o código da sua reserva é: ".$res3."</p><p><small>Guarde bem o seu código, ele será necessário para seu Checkin.</small>";
                }else{

                    echo "CPF não pertence a usuário hospede.";
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

echo $end;
?>

