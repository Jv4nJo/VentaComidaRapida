<?php
    if(!isset($_SESSION['id'])){
        header("location: ../pages/login.php?error=401");
    }
?>