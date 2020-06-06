<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['perfil']);

    echo 'sessão encerrada <a href="./index.html">voltar para página inicial</a>';
    echo json_encode($_SESSION);
?>
