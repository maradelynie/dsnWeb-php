<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">  
        <title>Hotel Exemplo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    </head>
    <body>
        <div class="principal">
            <h1>Login</h1>
            <form action="login.php" method="POST">
                <label for="nome">CPF</label>
                <input type="text" name="nome" placeholder="000.000.000-00" require autocomplete ="off">
                <label for="email">Senha</label>
                <input type="password" name="email" placeholder="***" require>
                <button type="submit" name="salvar"><div class="botao ok">Enviar</div></button>
            </form>
        </div>
    </body>
</html>