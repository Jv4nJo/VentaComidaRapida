<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['role']);
unset($_SESSION['nombre']);
unset($_SESSION['usuario']);
header("location: ../pages/login.php");


?>

