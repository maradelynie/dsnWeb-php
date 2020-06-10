<?php
session_start();
include '_servidor.php';
include '_tela_aviso.php';
echo $begin;


if($_POST['IDusuario']!=0){

    try{
            
        $sql = "SELECT * FROM `tblusuario` WHERE `idUsuario` = ".$_POST['IDusuario']." "; 
            
            $res = $db->query($sql);
            $res = $db->prepare($sql);
            $res->bindValue(1, '%a%');
            $res->execute();


            
            $pes = $res->fetchAll(PDO::FETCH_OBJ);

            if(!$_POST['IDperfil']){
                $_POST['IDperfil'] = $pes[0]->idPerfilUsuario;
            }
            if(!$_POST['nome']){
                $_POST['nome'] = $pes[0]->nome;
            }
            if(!$_POST['cpf']){
                $_POST['cpf'] = $pes[0]->cpf;
            }
            if(!$_POST['email']){
                $_POST['email'] = $pes[0]->email;
            }
            if(!$_POST['senha']){
                $_POST['senha'] = $pes[0]->senha;
            }
            if(!$_POST['endereco']){
                $_POST['endereco'] = $pes[0]->endereco;
            }
            if(!$_POST['numero']){
                $_POST['numero'] = $pes[0]->numero;
            }
            if(!$_POST['telefone']){
                $_POST['telefone'] = $pes[0]->telefone;
            }
            if(!$_POST['statusr']){
                $_POST['statusr'] = $pes[0]->status;
            }

            

            try{

               
                $sql = "UPDATE `tblusuario` SET
                
                `idPerfilUsuario` = '".$_POST['IDperfil']."', 
                `nome` = '".$_POST['nome']."', 
                `cpf` = '".$_POST['cpf']."', 
                `email` = '".$_POST['email']."', 
                `senha` = '".$_POST['senha']."', 
                `endereco` = '".$_POST['endereco']."', 
                `numero` = '".$_POST['numero']."', 
                `telefone` = '".$_POST['telefone']."', 
                `status` = '".$_POST['statusr']."'
                 
                WHERE `tblusuario`.`idUsuario` = ".$_POST['IDusuario']." ";
                                
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

        $sql = "INSERT INTO tblusuario 
        (`idUsuario`, 
        `IDPerfilUsuario`, 
        `nome`, 
        `cpf`, 
        `email`, 
        `senha`, 
        `endereco`, 
        `numero`, 
        `telefone`, 
        `status`) 
        VALUES
        (NULL, '".$_POST['IDperfil']."', '".$_POST['nome']."', '".$_POST['cpf']."', '".$_POST['email']."', '".$_POST['senha']."', '".$_POST['endereco']."', '".$_POST['numero']."', '".$_POST['telefone']."', '".$_POST['statusr']."')"; 
        
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

