<?php

include '_servidor.php';



try{
	$sql = "INSERT INTO `tblUsuario` (`idUsuario`, `idPerfilUsuario`, `cpf`, `email`, `senha`, `endereco`, `numero`, `telefone`, `status`) VALUES (NULL, '2', '".$_POST['cpf']."', '".$_POST['email']."', '".$_POST['senha']."', '".$_POST['endereco']."', '".$_POST['numero']."', '".$_POST['telefone']."', 'A')"; 
	
	$res = $db->query($sql);
    $i = 0;
    

    echo "cadastro realizado com sucesso";

	
}
catch(PDOException $e) { 
  echo $e->getMessage();
}
?>

