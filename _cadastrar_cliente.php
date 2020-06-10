<?php

    include '_servidor.php';
    include '_tela_aviso.php';
    echo $begin;
    try{
        
        $sql = "INSERT INTO `tblcliente` (`id`, `nome`, `cpf`, `telefone`) 
                VALUES (NULL, '".$_POST['nome']."', '".$_POST['cpf']."', '".$_POST['telefone']."')"; 

        $res = $db->query($sql);

        echo "Cadastro realizado com sucesso!";
        
    }
    catch(PDOException $e) { 
    echo $e->getMessage();
    }

    echo $end;


?>

