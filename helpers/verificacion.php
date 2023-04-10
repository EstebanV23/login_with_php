<?php

session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['rol']) || $_SESSION['estado'] != 1) {
    header("Location: /view/templates/login.php");
}

?>