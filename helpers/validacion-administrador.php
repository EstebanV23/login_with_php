<?php

session_start();

if(($_SESSION['rol'] != 2 && $_SESSION['rol'] != 3 )|| !isset($_SESSION['username']) || $_SESSION['estado'] != 1){
    session_destroy();
    header("Location: ../templates/login.php");
}

?>