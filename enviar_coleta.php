<?php

    include 'conexao.php';


    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `dados`(`nome`, `email`) VALUES ('$nome','$email')";
    
    $inserir = mysqli_query($conexao,$sql);
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
            
            <!--adicionar dados da recompensa aqui-->
                        
            <h1> Sua Recompensa será entregue em Breve!</h1>
            <h3> Cheque seu e-mail, lá você vair receber sua recompensa e muitas outras informações precisoas para continuar crescendo e ser um profissional de sucesso!</h3>
        <a href="../adicionar_coleta.php" ><div class="botao voltar">Voltar</div></a>
    </main>
    </body>
</html>