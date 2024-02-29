<?php
    session_start();
    $pos =($_GET['indice']); 

    unset($_SESSION['alunos'][$pos]);
    header("Refresh: 0; url=calcular.php");
?>