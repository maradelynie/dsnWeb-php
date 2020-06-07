<?php
    session_start();
    include '_tela_aviso.php';
    echo $begin;
    
    unset($_SESSION['id']);
    unset($_SESSION['perfil']);

    echo 'Sessão encerrada.';

    echo $end;
?>
