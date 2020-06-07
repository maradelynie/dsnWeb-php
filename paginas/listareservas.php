<?php
include '_servidor.php';

if (!isset($_SESSION)){
    session_start();
    

    $sair = "document.location.href='./_disconnect.php'";
    $atendimento = "document.location.href='./atendimento.php'";

    try{
            
        $sql = "SELECT 
        tblreserva.idReserva, 
        tblreserva.dataReserva, 
        tblreserva.idApartamento, 
        tblreserva.qtdHospedes, 
        tblreserva.dataCheckin, 
        tblreserva.dataCheckout, 
        tblcliente.nome 
        FROM tblcliente INNER JOIN tblreserva ON tblreserva.idCliente = tblcliente.id" ; 
            
            $res = $db->query($sql);
            $res = $db->prepare($sql);
            $res->bindValue(1, '%a%');
            $res->execute();
            
            $pes = $res->fetchAll(PDO::FETCH_OBJ);

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
                    
                    <h1>Lista de Reveservas</h1>

                    <table >
                        <tr>
                            <th>ID reserva</th>
                            <th>Cliente</th>
                            <th>Data reserva</th>
                            <th>Id apt.</th>
                            <th>Qnt hosp.</th>
                            <th>Data Checkout</th>
                            <th>Data Checkout</th>
                        </tr>';
                        
                        for ($x = 0; $x < sizeof($pes); $x++){
                            
                            echo "<tr>";
                                echo "<td>".$pes[$x]->idReserva."</td>";
                                echo "<td>".$pes[$x]->nome."</td>";
                                echo "<td>".substr($pes[$x]->dataReserva,0,11)."</td>";
                                echo "<td>".$pes[$x]->idApartamento."</td>";
                                echo "<td>".$pes[$x]->qtdHospedes."</td>";
                                echo "<td>".substr($pes[$x]->dataCheckin,0,11)."</td>";
                                echo "<td>".substr($pes[$x]->dataCheckout,0,11)."</td>";
                            echo "</tr>";
                            
                        }
                        echo '
                    </table>
                    
                    <span></span>
                    <button class="button__default" onclick='.$atendimento.' type="button">voltar</button>
                    <button class="button__default--warning" onclick='.$sair.' type="button">sair</button>

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