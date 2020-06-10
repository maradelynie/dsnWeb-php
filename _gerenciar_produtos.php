<?php
session_start();
include '_servidor.php';
include '_tela_aviso.php';
echo $begin;

if($_POST['idProduto']!=0){

    try{
            
        $sql = "SELECT * FROM `tblproduto` WHERE `idProduto` = ".$_POST['idProduto']." "; 
            
            $res = $db->query($sql);
            $res = $db->prepare($sql);
            $res->bindValue(1, '%a%');
            $res->execute();
            
            $pes = $res->fetchAll(PDO::FETCH_OBJ);

            if(!$_POST['descricao']){
                $_POST['descricao'] = $pes[0]->descricao;
            }
            if(!$_POST['valor']){
                $_POST['valor'] = $pes[0]->valor;
            }
            if(!$_POST['status']){
                $_POST['status'] = $pes[0]->status;
            }
           
            try{

               
                $sql = "UPDATE `tblproduto` SET
                
                `descricao` = '".$_POST['descricao']."', 
                `valor` = '".$_POST['valor']."', 
                `status` = '".$_POST['status']."'
                 
                WHERE `tblproduto`.`idProduto` = ".$_POST['idProduto']." ";
                                
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

        $sql = "INSERT INTO tblproduto 
        (`idProduto`, 
        `descricao`, 
        `valor`, 
        `status`) 
        VALUES
        (NULL, '".$_POST['descricao']."', '".$_POST['valor']."', '".$_POST['status']."')"; 
        
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

