<?php
session_start();
$dataBase = "trabalho"; 
$user = "root"; 
$pass = ""; 
$servidor = "localhost"; 


try{
	$db = new PDO("mysql:host=$servidor;dbname=$dataBase", $user, $pass); 
	$sql = "SELECT * FROM tblUsuario where cpf='".$_POST['cpf']."' and senha='".$_POST['senha']."'"; 
	
	$res = $db->query($sql);
	$i = 0;

	if ($res->rowCount()){
	
		while ($linha = $res->fetch()){ 
			
			$idUsuario = $linha["idUsuario"];
			$perfil = $linha["idPerfilUsuario"];
			$cpf = $linha["cpf"];
			$senha = $linha["senha"];
	
			if ($linha["status"] == 'A'){
				$_SESSION['id'] = $idUsuario;
				$_SESSION['perfil'] = $perfil;
				
				if($perfil == 3){
					header('Location: ./gerenciaReservas.php');
				}else if($perfil == 1){
					header('Location: ./atendimento.php');
				}else{
					header('Location: ./reserva.php');
				}
			}else{
				echo " login nao efetuado";
			}
			
		}
	}else{
		echo " login nao efetuado";
	}
	
	$db=null;
}
catch(PDOException $e) { 
  echo $e->getMessage();
}
?>

