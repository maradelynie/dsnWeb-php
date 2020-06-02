
<?php

include 'conexao.php';

$id = $_GET['id'];


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
         

            <?php 
                $sql = "SELECT * FROM `dados` WHERE id_coleta = $id";

                $buscar = mysqli_query($conexao,$sql);
                while ($array = mysqli_fetch_array($buscar)){

                $id_coleta = $array['id_coleta'];
                $nome = $array['nome'];
                $email = $array['email'];
    
            ?>
            
            <form action="atualizar_coleta.php" method="POST">
            <label for="nome">Nome</label>
            <small>Alterar Nome;</small>
            <input type="text" class="form-coleta" name="nome" value="<?php echo $nome?>">
                            
            <input type="text" class="form-coleta" name="id" value="<?php echo $id_coleta?>" style="display:none">
            
            <label for="email">E-mail</label>
            <small>Alterar E-mail;</small>
            <input type="email" class="form-coleta" name="email"value="<?php echo $email?>" >
            


            <button type="submit" class="botao ok" name="salvar">Enviar</button>
            <a href="deletar_coleta.php?id=<?php echo $id_coleta ?>" ><div class="botao deletar"><i class="far fa-trash-alt"></i> Deletar Dados</div></a>
            <?php }?>
            
        </form>       
    </body>
</html>