<?php

    include 'conexao.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM `dados` WHERE id_coleta = $id";
    
    $deletar = mysqli_query($conexao,$sql);

 
?>
<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">  
        <title>CRUD PHP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    </head>
    
    <body>
        
        <main>
          
            <!--mensagem para sucesso na atualização-->
            
            
            <h1> Dados Deletados com Sucesso</h1>
            <h3> A coleta atualizada.</h3>
        <a href="listar_coleta.php" ><div class="botao voltar">Voltar à Listagem</div></a>
        
    </main>
    </body>
</html>