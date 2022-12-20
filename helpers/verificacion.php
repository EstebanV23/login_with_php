<?php

session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['rol']) ) {
    header("Location: ../login.php");
}

?>