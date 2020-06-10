<?php
if (!isset($_SESSION)){
include '_servidor.php';

    session_start();

    $sair = "document.location.href='./_disconnect.php'";
    // $nome = $_SESSION['nome']
    

    if($_SESSION['perfil']==2){
        try{
            
            $sql = "SELECT * FROM tblproduto  WHERE status='A'" ; 
                
                $res = $db->query($sql);
                $res = $db->prepare($sql);
                $res->bindValue(1, '%a%');
                $res->execute();
                
                $produto = $res->fetchAll(PDO::FETCH_OBJ);

                // echo json_encode($produto);
                
    
        }
        catch(PDOException $e) { 
        echo $e->getMessage();
        }
        try{
            
            $sql = "SELECT * FROM tblservico WHERE status='A'" ; 
                
                $res = $db->query($sql);
                $res = $db->prepare($sql);
                $res->bindValue(1, '%a%');
                $res->execute();
                
                $servico = $res->fetchAll(PDO::FETCH_OBJ);

                //echo json_encode($servico);

                
            $db=null;
    
        }
        catch(PDOException $e) { 
        echo $e->getMessage();
        }

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
                    
                    <h1>Cliente</h1>
                    <div class="displaygrid2">
                        <label>Checkin
                            <input class="input__default" required type="date" name="checkin"/>
                        </label>
                        <label>Checkout
                            <input class="input__default" required type="date" name="checkout"/>
                        </label>
                        
                        
                    </div>
                    <input class="input__default" required placeholder="quantidade de hopedes" min="1" max="3" type="number" name="qnthospedes"/>
                    
                    <span></span>
                    <button class="button__default" type="submit">reservar</button>
                    

        
                </form>
                <div  class="displaygrid2">
                <form action="_pedir.php" method="POST">
                    <label>Pedido de Produtos</label>
                    <div class="displaygrid2">
                        <input class="input__default" required placeholder="Id Reserva" type="text" name="idReserva"/>
                        <input class="input__default" required placeholder="Quantidade" min="1" type="text" name="qtd"/>
                    </div>
                    <select class="input__default" required name="idProduto"/>';
                    
                    for ($x = 0; $x < sizeof($produto); $x++){
                        
                            echo "<option value=".$produto[$x]->idProduto.">".$produto[$x]->descricao."</option>";
                        
                    }

                    echo '</select>
                    <button class="button__default" type="submit">pedir</button>
                    </form>
                    <form action="_pedir.php" method="POST" >
                    <label>Pedido de Serviços</label>
                    <div class="displaygrid2">
                        <input class="input__default" required placeholder="Id Reserva" type="text" name="idReserva"/>
                        <input class="input__default" disabled value="1" min="1" type="text" name="qtd"/>
                    </div>
                    <select class="input__default" required name="idServico"/>';
                        for ($x = 0; $x < sizeof($servico); $x++){
                        
                            echo "<option value=".$servico[$x]->idServico.">".$servico[$x]->descricao."</option>";
                        
                    }
                    echo '</select>
                    <button class="button__default" type="submit">pedir</button>
                    </form>
                </div>
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




