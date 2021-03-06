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
    // $nome = $_SESSION['nome']

    if($_SESSION['perfil']==3){
        try{
            
            $sql = "SELECT * FROM tblproduto " ; 
                
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

        echo '<html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Hotel Lorem Ipson</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="conteiner">
                
                <form  class="form__login" action="_gerenciar_produtos.php" method="POST">
                    
                    <h1>Gerência</h1>
                    
                        <div class="menu">
                            <button class="menu__default" onclick="document.location.href='.$reserva.'" type="button">Reservas</button>
                            <button class="menu__default" onclick="document.location.href='.$usuarios.'" type="button">Usuários</button>
                            <button class="menu__default" onclick="document.location.href='.$clientes.'" type="button">Clientes</button>
                            <button class="menu__default" onclick="document.location.href='.$apartamentos.'" type="button">Apartamentos</button>
                            <button class="menu__default--active" onclick="document.location.href='.$produtos.'" type="button">Produtos</button>
                            <button class="menu__default" onclick="document.location.href='.$servico.'" type="button">Serviços</button>
        
                        </div>
                            <div class="input__gerencia">
                                <input class="input__default" placeholder="ID do produto" type="text" name="idProduto"/>
                                <input class="input__default" placeholder="valor" type="text" name="valor"/>
                                <input class="input__default" placeholder="descrição" type="text" name="descricao"/>
                                <select class="input__default" placeholder="status" type="text" name="status">
                                    <option value="A">Ativo</option>
                                    <option value="P">Pendente</option>
                                    <option value="D">Desligado</option>
                                </select>
                                <div></div><div></div><div></div>
                                <button class="button__default" type="submit">salvar</button>
                            </div>
                        
                            <small>Para editar digite o id do produto, para criar deixe em branco</small>
                            <table >
                                <tr>
                                    <th>ID</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                </tr>';
                                
                                for ($x = 0; $x < sizeof($pes); $x++){
                                    
                                    echo "<tr>";
                                        echo "<td>".$pes[$x]->idProduto."</td>";
                                        echo "<td>".$pes[$x]->descricao."</td>";
                                        echo "<td>".$pes[$x]->valor."</td>";
                                        echo "<td>".$pes[$x]->status."</td>";
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