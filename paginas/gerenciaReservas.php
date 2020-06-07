

<?php
include '_servidor.php';

if (!isset($_SESSION)){
    session_start();
    

    $sair = "document.location.href='./_disconnect.php'";
    $reserva = "document.location.href='./gerenciareservas.php'";
    $usuarios = "document.location.href='./gerenciausuarios.php'";
    $clientes = "document.location.href='./gerenciaclientes.php'";
    $apartamentos = "document.location.href='./gerenciaapartamentos.php'";
    $produtos = "document.location.href='./gerenciaprodutos.php'";
    $servico = "document.location.href='./gerenciaservicos.php'";

    try{
            
        $sql = "SELECT * FROM tblreserva where checkin=0 " ; 
            
            $res = $db->query($sql);
            $res = $db->prepare($sql);
            $res->bindValue(1, '%a%');
            $res->execute();
            
            $pes = $res->fetchAll(PDO::FETCH_OBJ);

            
    	$db=null;

    }
    catch(PDOException $e) { 
    echo $e->getMessage();
    }

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
                
                <form  class="form__login" action="_gerenciar_reservas.php" method="POST">
                    
                    <h1>Gerência</h1>
                    
                        <div class="menu">
                            <button class="menu__default--active" onclick="document.location.href='.$reserva.'" type="button">Reservas</button>
                            <button class="menu__default" onclick="document.location.href='.$usuarios.'" type="button">Usuários</button>
                            <button class="menu__default" onclick="document.location.href='.$clientes.'" type="button">Clientes</button>
                            <button class="menu__default" onclick="document.location.href='.$apartamentos.'" type="button">Apartamentos</button>
                            <button class="menu__default" onclick="document.location.href='.$produtos.'" type="button">Produtos</button>
                            <button class="menu__default" onclick="document.location.href='.$servico.'" type="button">Serviços</button>
        
                        </div>
                        <div class="input__gerencia">
                            <input class="input__default" placeholder="ID da reserva" type="text" name="IDreserva"/>
                            <input class="input__default" placeholder="Data reserva" type="date" name="datareserva"/>
                            <input class="input__default" placeholder="ID cliente" type="text" name="IDcliente"/>
                            <input class="input__default" placeholder="ID apartamento" type="text" name="IDapartamento"/>
                            <input class="input__default" placeholder="Qtd de hospedes" type="text" name="qtdhospedes"/>
                            <input class="input__default" placeholder="valor total" type="text" name="valortotal"/>
                            <input class="input__default" placeholder="valor pago" type="text" name="valorpago"/>
                            <input class="input__default" placeholder="checkin" type="text" name="checkin"/>
                            <input class="input__default" placeholder="checkout" type="text" name="checkout"/>
                            <input class="input__default" placeholder="data checkoin" type="date" name="dataCheckin"/>
                            <input class="input__default" placeholder="data checkoout" type="date" name="dataCheckout"/>
                            <button class="button__default" type="submit">salvar</button>
                        </div>
        
                    <small>Para editar digite o id da reserva, para criar deixe em branco</small>
                    <table >
                        <tr>
                            <th>ID reserva</th>
                            <th>Data reserva</th>
                            <th>Id apt.</th>
                            <th>Qnt hosp.</th>
                            <th>Valor total</th>
                            <th>Valor Pago</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                            <th>Data Checkout</th>
                            <th>Data Checkout</th>
                        </tr>';
                        
                        for ($x = 0; $x < sizeof($pes); $x++){
                            
                            echo "<tr>";
                                echo "<td>".$pes[$x]->idReserva."</td>";
                                echo "<td>".substr($pes[$x]->dataReserva,0,11)."</td>";
                                echo "<td>".$pes[$x]->idApartamento."</td>";
                                echo "<td>".$pes[$x]->qtdHospedes."</td>";
                                echo "<td>".$pes[$x]->valorTotalReserva."</td>";
                                echo "<td>".$pes[$x]->valorPago."</td>";
                                echo "<td>".$pes[$x]->checkin."</td>";
                                echo "<td>".$pes[$x]->checkout."</td>";
                                echo "<td>".substr($pes[$x]->dataCheckin,0,11)."</td>";
                                echo "<td>".substr($pes[$x]->dataCheckout,0,11)."</td>";
                            echo "</tr>";
                            
                        }
                        echo '
                    </table>


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