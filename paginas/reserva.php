<?php
if (!isset($_SESSION)){
    session_start();

    $sair = "document.location.href='./_disconnect.php'";
    // $nome = $_SESSION['nome']
    

    if($_SESSION['perfil']==2){
        echo '<html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Hotel Lorem Ipson</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="conteiner">
                
                <div class="form__login">
                <form class="displayflexColum" action="_reservar.php" method="POST">
                    
                    <h1>Reserva</h1>
                    <div class="displayflex">
                        <label>Checkin
                            <input class="input__default" required type="date" name="checkin"/>
                        </label>
                        <label>Checkout
                            <input class="input__default" required type="date" name="checkout"/>
                        </label>
                        
                        
                    </div>
                    <input class="input__default" required placeholder="quantidade de hopedes" type="number" name="qnthospedes"/>

                    <span></span>
                    <button class="button__default" type="submit">reservar</button>
        
        
                </form>
                <button class="button__default--warning" onclick="document.location.href='.$sair.'" type="button">sair</button>
        
                </div>
        
        
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
    }else if($_SESSION['perfil']==1){
        header('Location: ./atendimento.php');
    }else{
        header('Location: ./index.html');
    }
}
?>




