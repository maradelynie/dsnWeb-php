<?php
include '_servidor.php';
function data($data){
    return date("d/m/Y", strtotime($data));
}


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
        FROM tblcliente INNER JOIN tblreserva ON tblreserva.idCliente = tblcliente.id WHERE tblreserva.checkin = '0'" ; 
            
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
                            <th>Data Checkin</th>
                            <th>Data Checkout</th>
                        </tr>';
                        
                        for ($x = 0; $x < sizeof($pes); $x++){
                            
                            echo "<tr>";
                                echo "<td>".$pes[$x]->idReserva."</td>";
                                echo "<td>".$pes[$x]->nome."</td>";
                                echo "<td>".data(substr($pes[$x]->dataReserva,0,11))."</td>";
                                echo "<td>".$pes[$x]->idApartamento."</td>";
                                echo "<td>".$pes[$x]->qtdHospedes."</td>";
                                echo "<td>".data(substr($pes[$x]->dataCheckin,0,11))."</td>";
                                echo "<td>".data(substr($pes[$x]->dataCheckout,0,11))."</td>";
                            echo "</tr>";
                            
                        }
                        echo '
                    </table>
                    
                    <span></span>
                    <button class="button__default" onclick='.$atendimento.' type="button">voltar</button>

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