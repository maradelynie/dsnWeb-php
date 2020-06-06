<?php
if (!isset($_SESSION)){
    session_start();
    echo $_SESSION['perfil'];

    $sair = "document.location.href='./disconnect.php'";
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
                
                <form  class="form__login">
                    
                    <h1>Atendimento</h1>
                    
                    <input class="input__default--importante" value="Apartamentos vagos hoje:     23" type="text" desable name="checkin"/>
                        
                        <label>Fazer Checkin</label>
                        <div class="displayflex">
                            <input class="input__default" placeholder="ID da reserva" type="text" name="checkin"/>
                            <button class="button__default" type="submit">checkin</button>
                        </div>

                        Criar reserva
                            <input class="input__default" placeholder="cpf do hospede" type="text" name="checkin"/>
                        <div class="displayflex">
                            <label>Checkin
                                <input class="input__default" placeholder="Checkin" type="date" name="checkin"/>
                            </label>
                            <label>Checkout
                                <input class="input__default" placeholder="Checkout" type="date" name="checkin"/>
                            </label>
                        </div>
                        
                        
                    
                    <span></span>
                    <button class="button__default" type="submit">fazer reservar</button>
                    <button class="button__default" type="submit">cadastrar cliente</button>
                    <button class="button__default--warning" onclick='.$sair.' type="button">sair</button>




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