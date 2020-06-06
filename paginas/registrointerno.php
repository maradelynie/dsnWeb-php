<?php
if (!isset($_SESSION)){
    session_start();

    $sair = "document.location.href='./_disconnect.php'";
    // $nome = $_SESSION['nome']

    if($_SESSION['perfil']==1){
        echo '<html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Hotel Lorem Ipson</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="conteiner">
                <form class="form__login" action="_cadastrar_cliente.php" method="POST">
                    <h1>Registro Interno</h1>
                    <input class="input__default" required placeholder="nome" type="text" name="nome"/>
                    <input class="input__default" required placeholder="cpf" type="text" name="cpf"/>
                    <input class="input__default" required placeholder="telefone" type="text" name="telefone"/>
                    <span><a href="./atendimento.php">Voltar</a>.</span>
                    <button class="button__default" type="submit">Enviar</button>
                </form>
                <div class="logo__g">
                    <img src="./10_21/1111svg.svg" alt="logo loremipson">
                    <img class="animacao1 fundologo1" src="./10_21/fundo.svg" alt="logo loremipson">
                    <img class="animacao2 fundologo2" src="./10_21/fundo2.svg" alt="logo loremipson">
                </div>
        
            </div>
        
        </body>
        </html>';
    }else if($_SESSION['perfil']==3){
        header('Location: ./gerenciaReservas.php');
    }else if($_SESSION['perfil']==2){
        header('Location: ./reserva.php');
    }else{
        header('Location: ./index.html');
    }
}
?>            


