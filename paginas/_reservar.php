<?php
session_start();

include '_servidor.php';
include '_tela_aviso.php';
date_default_timezone_set("Brazil/East");

echo $begin;

$hoje = date('Y-m-d');

$checkindata = $_POST['checkin'];
$checkoutdata = $_POST['checkout'];


    if($checkindata>=$hoje){
        
        if($checkoutdata>=$checkindata){

            $checkoutdata = strtotime($checkoutdata); 
            $checkindata = strtotime($checkindata); 

            $qtdDias = ($checkoutdata - $checkindata)/86400;
            $qtdDias = $qtdDias +1;

            try{ 
                $sql = "SELECT * FROM tblreserva where checkout='0' "; 
                        
                $res = $db->query($sql);
                $res = $db->prepare($sql);
                $res->bindValue(1, '%a%');
                $res->execute();
                
                $reservas = $res->fetchAll(PDO::FETCH_OBJ);

                $sql2 = "SELECT * FROM tblapartamento  ORDER BY `valorSingle` ASC"; 
            
                $res2 = $db->query($sql2);
                $res2 = $db->prepare($sql2);
                $res2->bindValue(1, '%a%');
                $res2->execute();
                
                $listaapartamento = $res2->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $e) { 
                echo "Erro:";
            echo $e->getMessage();
            }

            $apartamentos = sizeof($listaapartamento);

            $apartamentosOcupados = [];

            for ($x = 0; $x < sizeof($reservas); $x++){

                $datareservadain =  substr($reservas[$x]->dataCheckin,0,10);
                $datareservadaout =  substr($reservas[$x]->dataCheckout,0,10);

                if(($_POST['checkin'] <= $datareservadaout) && ($_POST['checkout'] >= $datareservadain)){
                    array_push($apartamentosOcupados,"ocupado");
                }
            }
           if($apartamentos-sizeof($apartamentosOcupados)>0){
               
                $idApto = $listaapartamento[sizeof($apartamentosOcupados)]->idApartamento;

                if($_POST['qnthospedes']==1){
                 $valorQaurto =$listaapartamento[sizeof($apartamentosOcupados)]->valorSingle;
                }else if($_POST['qnthospedes']==2){
                    $valorQaurto =$listaapartamento[sizeof($apartamentosOcupados)]->valorDouble;
                }else{
                    $valorQaurto =$listaapartament[sizeof($apartamentosOcupados)]->valorTriple;
                }
            
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
            try{
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
                    (NULL, '".$cliente."', '".$idApto."', '".$_POST['qnthospedes']."', '".$hoje."', '".$_POST['checkin']."', '".$_POST['checkout']."', '0', '0', '".$qtdDias*$valorQaurto."', '0')
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

           }else {
            echo 'Não temos apartamentos disponíveis nessa data.';

           }    
        } else { 
            echo 'checkout com data invalida';
        };
    }else{
        echo 'checkin com data invalida';
    };

echo $end;
?>

