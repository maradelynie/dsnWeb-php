<?php
session_start();
include '_servidor.php';
include '_tela_aviso.php';
echo $begin;


if($_POST['IDcliente']!=0){

    try{
            
        $sql = "SELECT * FROM `tblcliente` WHERE `id` = ".$_POST['IDcliente']." "; 
            
            $res = $db->query($sql);
            $res = $db->prepare($sql);
            $res->bindValue(1, '%a%');
            $res->execute();
            
            $pes = $res->fetchAll(PDO::FETCH_OBJ);

            if(!$_POST['nome']){
                $_POST['nome'] = $pes[0]->nome;
            }
            if(!$_POST['cpf']){
                $_POST['cpf'] = $pes[0]->cpf;
            }
            if(!$_POST['telefone']){
                $_POST['telefone'] = $pes[0]->telefone;
            }

            try{

               
                $sql = "UPDATE `tblcliente` SET
                
                `nome` = '".$_POST['nome']."', 
                `cpf` = '".$_POST['cpf']."', 
                `telefone` = '".$_POST['telefone']."'
                 
                WHERE `tblcliente`.`id` = ".$_POST['IDcliente']." ";
                                
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

        $sql = "INSERT INTO tblcliente 
        (`id`, 
        `nome`, 
        `cpf`, 
        `telefone`) 
        VALUES
        (NULL, '".$_POST['nome']."', '".$_POST['cpf']."', '".$_POST['telefone']."')"; 
        
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

