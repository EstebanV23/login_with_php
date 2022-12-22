<?php
session_start();
session_destroy();

header("Location: ../view/templates/login.php");

?>