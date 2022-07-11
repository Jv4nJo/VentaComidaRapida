<?php

if ($_SESSION['role'] != "Vendedor") {
    header("location: ../pages/bienvenido.php?error=401");
}
