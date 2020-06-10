<?php
    session_start();
    include '_servidor.php';
    include '_tela_aviso.php';

    function data($data){
        return date("d/m/Y", strtotime($data));
    }

    date_default_timezone_set("Brazil/East");
    $hoje = date('Y-m-d');
    echo $begin;


    $checkin = $_GET["checkin"];

    try{
        
        $sql = "SELECT * FROM tblreserva where idReserva='".$checkin."' "; 
        
        $res = $db->query($sql);
        $res = $db->prepare($sql);
        $res->bindValue(1, '%a%');
        $res->execute();
        
        $pes = $res->fetchAll(PDO::FETCH_OBJ);

        $dataCheckin = substr($pes[0]->dataCheckin,0,10);
        
    }
    catch(PDOException $e) { 
        echo "Erro:";
    echo $e->getMessage();
    }

    if($pes!=[]){
        if($dataCheckin<= $hoje){
            $pes= $pes[0];

            if($pes->checkin){
                echo "Este checkin ja havia sido feito.";
            }else{
                try{
                    $sql = "SELECT * FROM tblapartamento  where status=1 ORDER BY `valorSingle` ASC"; 
            
                    $res = $db->query($sql);
                    $res = $db->prepare($sql);
                    $res->bindValue(1, '%a%');
                    $res->execute();
                    
                    $apto = $res->fetchAll(PDO::FETCH_OBJ);

                    $sql2 = "UPDATE `tblapartamento` SET `status` = '2' WHERE `tblapartamento`.`idApartamento` = ".$apto[0]->idApartamento." "; 
                    
                    $res2 = $db->query($sql2);
                }
                catch(PDOException $e) { 
                    echo "Erro:";
                echo $e->getMessage();
                }
                try{
        
                    $sql = "UPDATE `tblreserva` SET `checkin` = '1' WHERE `tblreserva`.`idReserva` = ".$checkin." "; 
                    
                    $res = $db->query($sql);
                }
                catch(PDOException $e) { 
                    echo "Erro:";
                echo $e->getMessage();
                }
                echo "Checkin realizado";
            }
        }else{
            echo "Sua reserva está com checking para o dia: ".data($dataCheckin);

        }
    }else{
        echo "Não foi possivel achar reserva com o ID: ".$checkin;

    }

    echo $end;
?>

