

<?php
if (!isset($_SESSION)){
    session_start();
    echo $_SESSION['perfil'];

    $sair = "document.location.href='./disconnect.php'";
    // $nome = $_SESSION['nome']

    if($_SESSION['perfil']==3){
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
                    
                    <h1>Gerência</h1>
                    
                        <div class="menu">
                            <button class="menu__default--active" type="button">Reservas</button>
                            <button class="menu__default" type="button">Usuários</button>
                            <button class="menu__default" type="button">Clientes</button>
                            <button class="menu__default" type="button">Apartamentos</button>
                            <button class="menu__default" type="button">Produtos</button>
                            <button class="menu__default" type="button">Serviços</button>
        
                        </div>
                        <div class="input__gerencia">
                            <input class="input__default" placeholder="ID da reserva" type="text" name="ID da reserva"/>
                            <input class="input__default" placeholder="ID reserva" type="text" name="data reserva"/>
                            <input class="input__default" placeholder="ID cliente" type="text" name="ID cliente"/>
                            <input class="input__default" placeholder="ID apartamento" type="text" name="ID apartamento"/>
                            <input class="input__default" placeholder="Qtd de hospedes" type="text" name="Qtd de hospedes"/>
                            <input class="input__default" placeholder="valor total" type="text" name="valor total"/>
                            <input class="input__default" placeholder="valor pago" type="text" name="valor pago"/>
                            <input class="input__default" placeholder="checkin" type="text" name="checkin"/>
                            <input class="input__default" placeholder="checkout" type="text" name="checkout"/>
                            <input class="input__default" placeholder="status" type="text" name="status"/>
                            <div></div>
                            <button class="button__default" type="button">salvar</button>
                        </div>
        
                    <small>clique para editar</small>
                    <textarea class="input__default" rows="7" disabled ></textarea>
                    <button class="button__default--warning" onclick="document.location.href='.$sair.'" type="button">sair</button>
        
                </form>
        
                <div class="logo__p">
                    <img src="./10_21/1111svg.svg" alt="logo loremipson">
                    <img class="animacao1 fundologo1" src="./10_21/fundo.svg" alt="logo loremipson">
                    <img class="animacao2 fundologo2" src="./10_21/fundo2.svg" alt="logo loremipson">
                </div>
        
            </div>
        
        </body>
        </html>';
    }else if($_SESSION['perfil']==1){
        header('Location: ./atendimento.php');
    }else if($_SESSION['perfil']==2){
        header('Location: ./reserva.php');
    }else{
        header('Location: ./index.html');
    }
}
?> 