<?php

    include '_servidor.php';
    include '_tela_aviso.php';
    echo $begin;
    
    try{
        $sql = "INSERT INTO `tblUsuario` (`idUsuario`, `idPerfilUsuario`,`nome`,`cpf`, `email`, `senha`, `endereco`, `numero`, `telefone`, `status`) VALUES (NULL, '2', '".$_POST['nome']."' , '".$_POST['cpf']."', '".$_POST['email']."', '".$_POST['senha']."', '".$_POST['endereco']."', '".$_POST['numero']."', '".$_POST['telefone']."', 'A')"; 
        $sql2 = "INSERT INTO `tblcliente` (`id`, `nome`, `cpf`, `telefone`) VALUES (NULL, '".$_POST['nome']."', '".$_POST['cpf']."', '".$_POST['telefone']."')"; 

        $res = $db->query($sql);
        $res2 = $db->query($sql2);
        

        echo "cadastro realizado com sucesso";

        
    }
    catch(PDOException $e) { 
    echo $e->getMessage();
    };

    echo $end;
?>

