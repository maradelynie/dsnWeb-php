<?php
    session_start();

    include '_servidor.php';
    include '_tela_aviso.php';
    echo $begin;


    $checkin = $_GET["checkin"];

    try{

        
        $sql = "SELECT * FROM tblreserva where idReserva='".$checkin."' "; 
        
        $res = $db->query($sql);
        $res = $db->prepare($sql);
        $res->bindValue(1, '%a%');
        $res->execute();
        
        $pes = $res->fetchAll(PDO::FETCH_OBJ);
        if($pes!=[]){

            $pes= $pes[0];

            if($pes->checkin){
                echo "Este checkin ja havia sido feito.";
            }else{
        
                $sql2 = "UPDATE `tblreserva` SET `checkin` = '1' WHERE `tblreserva`.`idReserva` = ".$checkin." "; 
                
                $res2 = $db->query($sql2)
                or die("Falha na execução da consulta"); 
        
                echo "Checkin realizado";
            }

        }else{
            echo "Não foi possivel achar reserva com o ID: ".$checkin;

        }


        
        
    }
    catch(PDOException $e) { 
        echo "Erro:";
    echo $e->getMessage();
    }

    echo $end;
?>

