<?php    
session_start();
    include '_servidor.php';
    $checkout = $_GET["checkout"];
    function data($data){
        return date("d/m/Y", strtotime($data));
    }

    $previous = "document.location.href='./atendimento.php'";
    
    $resposta = "";
    $reserva = "";
    $produto = "";
    $servico = "";
    $total = "";
    $servicototal = 0;
    $produtototal = 0;
    
    try{
        
        $sql = "SELECT 
        tblreserva.qtdHospedes, 
        tblreserva.dataCheckin, 
        tblreserva.idApartamento, 
        tblreserva.dataCheckout, 
        tblreserva.valorTotalReserva, 
        tblcliente.id ,
        tblcliente.cpf ,
        tblcliente.telefone ,
        tblcliente.nome 
        FROM tblreserva INNER JOIN tblcliente ON tblreserva.idCliente = tblcliente.id  where idReserva='".$checkout."' "; 
        
        $res = $db->query($sql);
        $res = $db->prepare($sql);
        $res->bindValue(1, '%a%');
        $res->execute();
        
        $check = $res->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e) { 
        echo "Erro:";
    echo $e->getMessage();
    }

    if($check!=[]){

        try{
        
            $sql = "SELECT 
            tblreservaproduto.idReserva, 
            tblreservaproduto.qtd, 
            tblreservaproduto.valor, 
            tblproduto.descricao 
            FROM tblreservaproduto INNER JOIN tblproduto ON tblreservaproduto.idProduto = tblproduto.idProduto where idReserva='".$checkout."' "; 
            
            $res = $db->query($sql);
            $res = $db->prepare($sql);
            $res->bindValue(1, '%a%');
            $res->execute();
            
            $resproduto = $res->fetchAll(PDO::FETCH_OBJ);
            
        }
        catch(PDOException $e) { 
            echo "Erro:";
        echo $e->getMessage();
        }
        try{
        
            $sql = "SELECT 
            tblreservaservico.idReserva, 
            tblreservaservico.valor, 
            tblservico.descricao 
            FROM tblreservaservico INNER JOIN tblservico ON tblreservaservico.idServico = tblservico.idServico where idReserva='".$checkout."' "; 
            
            $res = $db->query($sql);
            $res = $db->prepare($sql);
            $res->bindValue(1, '%a%');
            $res->execute();
            
            $resservico = $res->fetchAll(PDO::FETCH_OBJ);
            
        }
        catch(PDOException $e) { 
            echo "Erro:";
        echo $e->getMessage();
        }
        $reserva = '
            <td>'. data(substr($check[0]->dataCheckin,0,10))." - ". data(substr($check[0]->dataCheckout,0,10)).'</td>
             <td>'.$check[0]->valorTotalReserva.'</td>';
        
        $resposta = "
        <small> Nome: ".$check[0]->nome."</small><br>
        <small> cpf: ".$check[0]->cpf."</small><br>
        <small> telefone: ".$check[0]->telefone."</small><br>
        ";
    }else{
        $resposta = "Não foi possivel achar o checkin da reserva com o ID: ".$checkout;
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
                    
                    <h1>Checkout ID '.$checkout.' </h1>
                    <p>'.$resposta.'</p>
                    <table >

                        <tr>
                            <th>Reserva</th>
                            <th>valor</th>

                        </tr>
                        <tr>
                        '.$reserva.'
                        </tr>
                        <tr>
                            <th>Produtos</th>
                            <th>valor</th>

                        </tr>
                       
                        ';
                        for ($x = 0; $x < sizeof($resproduto); $x++){
                    
                            $value = $resproduto[$x]->valor*$resproduto[$x]->qtd;

                            echo " <tr><td>".$resproduto[$x]->qtd." x ".$resproduto[$x]->descricao." R$ ".$resproduto[$x]->valor."</td>";
                            echo "<td>".$resproduto[$x]->valor*$resproduto[$x]->qtd."</td> </tr>";

                            $produtototal = $produtototal + $value;
                        
                        }
                        echo '
                       
                        <tr>
                            <th>Serviços</th>
                            <th>valor</th>

                        </tr>
                        
                        ';
                        for ($x = 0; $x < sizeof($resservico); $x++){
                    
      
                            echo "<tr><td>".$resservico[$x]->descricao." R$ ".$resservico[$x]->valor."</td>";
                            echo "<td>".$resservico[$x]->valor."</td></tr>";

                            $servicototal = $servicototal +$resservico[$x]->valor;
                        
                        }
                        echo '
                        <tr>
                            <th>Total</th>
                            <th>';
                            $total = $servicototal + $produtototal + $check[0]->valorTotalReserva;
                            echo $total
                            ;echo '</th>
                        </tr>
                    </table>
                   
                    
                    <span></span>
                    <form class="displaygrid2" action="_concluir_checkout.php" method="POST">
                        <input class="input__default" required placeholder="Valor Pago" type="text" name="valorpago"/>
                        <input value="'.$check[0]->idApartamento.'" type="hidden" name="idapt"/>
                        <input value="'.$checkout.'" type="hidden" name="idreserva"/>
                        <button class="button__default" type="submit">Concluir Checkout</button>
                    </form>
                    <button class="button__default" onclick='.$previous.' type="button">voltar</button>

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
   

    
    
    
   
?>

