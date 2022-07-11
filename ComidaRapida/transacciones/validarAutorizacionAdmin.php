<?php

if ($_SESSION['role'] != "Administrador") {
    header("location: ../pages/bienvenido.php?error=401");
}
