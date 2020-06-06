<?php

include '_servidor.php';

try{
    
    $sql = "INSERT INTO `tblcliente` (`id`, `nome`, `cpf`, `telefone`) 
            VALUES (NULL, '".$_POST['nome']."', '".$_POST['cpf']."', '".$_POST['telefone']."')"; 

	$res = $db->query($sql);

    echo "cadastro realizado com sucesso";
	
}
catch(PDOException $e) { 
  echo $e->getMessage();
}
?>

