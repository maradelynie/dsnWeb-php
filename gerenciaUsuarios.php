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
            
            $sql = "SELECT * FROM tblusuario " ; 
                
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
                
                <form  class="form__login" action="_gerenciar_usuarios.php" method="POST">
                    
                    <h1>Gerência</h1>
                    
                        <div class="menu">
                            <button class="menu__default" onclick="document.location.href='.$reserva.'" type="button">Reservas</button>
                            <button class="menu__default--active" onclick="document.location.href='.$usuarios.'" type="button">Usuários</button>
                            <button class="menu__default" onclick="document.location.href='.$clientes.'" type="button">Clientes</button>
                            <button class="menu__default" onclick="document.location.href='.$apartamentos.'" type="button">Apartamentos</button>
                            <button class="menu__default" onclick="document.location.href='.$produtos.'" type="button">Produtos</button>
                            <button class="menu__default" onclick="document.location.href='.$servico.'" type="button">Serviços</button>
        
                        </div>
                        <div class="input__gerencia">
                            <input class="input__default" placeholder="ID da usuários" type="text" name="IDusuario"/>
                            <select class="input__default" placeholder="ID perfil" type="text" name="IDperfil">
                                <option value="1">Atendente</option>
                                <option value="2">Cliente</option>
                                <option value="3">Gerente</option>
                            </select>
                            <input class="input__default" placeholder="nome" type="text" name="nome"/>
                            <input class="input__default" placeholder="cpf" type="text" name="cpf"/>
                            <input class="input__default" placeholder="email" type="text" name="email"/>
                            <input class="input__default" placeholder="senha" type="text" name="senha"/>
                            <input class="input__default" placeholder="endereço" type="text" name="endereco"/>
                            <input class="input__default" placeholder="numero" type="text" name="numero"/>
                            <input class="input__default" placeholder="telefone" type="text" name="telefone"/>
                            <select class="input__default" placeholder="status" type="text" name="statusr">
                                <option value="A">Ativo</option>
                                <option value="P">Pendente</option>
                                <option value="D">Desligado</option>
                            </select>
                            <div></div>
                            <button class="button__default" type="submit">salvar</button>
                        </div>
                    
                    <small>Para editar digite o id do usuário , para criar deixe em branco</small>

                    <table >
                    <tr>
                        <th>ID Usuário</th>
                        <th>ID perfil</th>
                        <th>nome</th>
                        <th>cpf</th>
                        <th>email</th>
                        <th>senha</th>
                        <th>endereço</th>
                        <th>numero</th>
                        <th>telefone</th>
                        <th>status</th>
                        
                    </tr>';
                    
                    for ($x = 0; $x < sizeof($pes); $x++){
                        
                        echo "<tr>";
                            echo "<td>".$pes[$x]->idUsuario."</td>";
                            echo "<td>".$pes[$x]->idPerfilUsuario."</td>";
                            echo "<td>".$pes[$x]->nome."</td>";
                            echo "<td>".$pes[$x]->cpf."</td>";
                            echo "<td>".$pes[$x]->email."</td>";
                            echo "<td>".$pes[$x]->senha."</td>";
                            echo "<td>".$pes[$x]->endereco."</td>";
                            echo "<td>".$pes[$x]->numero."</td>";
                            echo "<td>".$pes[$x]->telefone."</td>";
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



