<?php
    session_start();
    unset($_SESSION["IDUsuario"]);
    unset($_SESSION["Nome"]);
    unset($_SESSION["Email"]);
    unset($_SESSION["Sobrenome"]);
    session_destroy();
    header("Location:login.php");
?>

