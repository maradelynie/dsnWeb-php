<?php

$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

$begin ='<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Lorem Ipson</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="conteiner">
        <form class="form__login" method="post" action="_connect.php">
            <h1>Aviso</h1>
            <p>';
$end ='</p>
  <small><a href='.$previous.' >Voltar</a>.</small>
  </form>
  <div class="logo__g">
  <img src="./10_21/1111svg.svg" alt="logo loremipson">
  <img class="animacao1 fundologo1" src="./10_21/fundo.svg" alt="logo loremipson">
  <img class="animacao2 fundologo2" src="./10_21/fundo2.svg" alt="logo loremipson">
  </div>

  </div>

  </body>
  </html>';
  ?>