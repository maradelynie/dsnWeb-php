<?php
include '_servidor.php';

if (!isset($_SESSION)){
    session_start();
    

    $sair = "document.location.href='./_disconnect.php'";
    $registrointerno = "document.location.href='./registrointerno.php'";
    $listareservas = "document.location.href='./listareservas.php'";

    try{
            
        $sql = "SELECT * FROM tblreserva"; 
            
        $res = $db->query($sql);
        $res = $db->prepare($sql);
        $res->bindValue(1, '%a%');
        $res->execute();
        
        $pes = $res->fetchAll(PDO::FETCH_OBJ);

        $sql2 = "SELECT * FROM tblapartamento  where status=A "; 
        
        $res2 = $db->query($sql2);
        $res2 = $db->prepare($sql2);
        $res2->bindValue(1, '%a%');
        $res2->execute();
            
            $pes2 = $res2->fetchAll(PDO::FETCH_OBJ);
        
            $apartamentos = sizeof($pes2)-sizeof($pes);
            
    	$db=null;

    }
    catch(PDOException $e) { 
    echo $e->getMessage();
    }


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
                
                <div  class="form__login">
                    
                    <h1>Atendimento</h1>
                    
                    <input class="input__default--importante" value="Apartamentos vagos hoje:     '.$apartamentos.'" type="text" desable name="checkin"/>
                        
                    <label>Fazer Checkin</label>
                    <form class="grid3" action="_checkin.php" method="GET">
                        <input class="input__default" required placeholder="ID da reserva" type="text" name="checkin"/>
                        <button class="button__default" type="submit">fazer checkin</button>
                        <button class="button__default" onclick='.$listareservas.' type="button">ver reservas</button>

                    </form>

                    <label>Fazer Checkout</label>
                    <form class="grid3" action="_checkiout.php" method="GET">
                        <input class="input__default" required placeholder="ID da reserva" type="text" name="checkin"/>
                        <button class="button__default" type="submit">fazer checkout</button>
                        <button class="button__default" onclick='.$listacheckins.' type="button">ver checkins</button>

                    </form>
                    
                    Criar reserva
                    <form class="displayflexColum" action="_reservar.php" method="POST">
                    <input class="input__default" required placeholder="cpf do hospede" type="text" name="cpf"/>
                        <input class="input__default" required min="1" max="3" placeholder="Quantidade de Hospedes" type="number" name="qnthospedes"/>
                        <div class="displaygrid2">
                       
                        <label><small>Checkin</small>
                            <input class="input__default" required placeholder="Checkin" type="date" name="checkin"/>
                        </label>
                        <label><small>Checkout</small>
                            <input class="input__default" required placeholder="Checkout" type="date" name="checkout"/>
                        </label>
                        
                        
                        </div>
                        <button class="button__default" type="submit">fazer reservar</button>
                    </form>

                        
                    
                    <span></span>
                    <button class="button__default" onclick='.$registrointerno.' type="button">cadastrar cliente</button>
                    <button class="button__default--warning" onclick='.$sair.' type="button">sair</button>




                </div>

                <div class="logo__p">
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