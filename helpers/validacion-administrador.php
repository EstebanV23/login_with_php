<?php
if (!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['username']) || !isset($_SESSION['estado']) || ($_SESSION['rol'] != 2 && $_SESSION['rol'] != 3 ) || $_SESSION['estado'] != 1){
    header("Location: /view/templates/login.php");
    die();
}

?>