<?php
session_start();
include '_servidor.php';
include '_tela_aviso.php';
echo $begin;

if($_POST['IDapto']!=0){

    try{
            
        $sql = "SELECT * FROM `tblapartamento` WHERE `idApartamento` = ".$_POST['IDapto']." "; 
            
            $res = $db->query($sql);
            $res = $db->prepare($sql);
            $res->bindValue(1, '%a%');
            $res->execute();
            
            $pes = $res->fetchAll(PDO::FETCH_OBJ);

            if(!$_POST['apt']){
                $_POST['apt'] = $pes[0]->apt;
            }
            if(!$_POST['valorSingle']){
                $_POST['valorSingle'] = $pes[0]->valorSingle;
            }
            if(!$_POST['valorDouble']){
                $_POST['valorDouble'] = $pes[0]->valorDouble;
            }
            if(!$_POST['valorTriple']){
                $_POST['valorTriple'] = $pes[0]->valorTriple;
            }
            if(!$_POST['status']){
                $_POST['status'] = $pes[0]->status;
            }

            try{

               
                $sql = "UPDATE `tblapartamento` SET
                
                `apt` = '".$_POST['apt']."', 
                `valorSingle` = '".$_POST['valorSingle']."', 
                `valorDouble` = '".$_POST['valorDouble']."', 
                `valorTriple` = '".$_POST['valorTriple']."', 
                `status` = '".$_POST['status']."'
                 
                WHERE `tblapartamento`.`idApartamento` = ".$_POST['IDapto']." ";
                                
                $res = $db->query($sql);
                $resError = $db->errorCode  ();
                if($resError == 0){
                    echo "Registro alterado com sucesso.";

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
    try{

        $sql = "INSERT INTO tblapartamento 
        (`idApartamento`, 
        `apt`, 
        `valorSingle`, 
        `valorDouble`, 
        `valorTriple`, 
        `status`) 
        VALUES
        (NULL, '".$_POST['apt']."', '".$_POST['valorSingle']."', '".$_POST['valorDouble']."', '".$_POST['valorTriple']."', '".$_POST['status']."')"; 
        
        $res = $db->query($sql);
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

}
echo $end;

?>

