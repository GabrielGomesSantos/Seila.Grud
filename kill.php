<?php
    session_start();
    session_unset();

    //Apso 0 segundos ele manda para a url 
    header("Refresh: 0; url=calcular.php");
?>