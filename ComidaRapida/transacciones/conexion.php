<?php
$user = "Juan";
$password = "Juan jose1@";
$nombreBD = "ComidaRapida";
try {
    $cn = new PDO(
        "mysql:host=localhost; dbname=" .
            $nombreBD,
        $user,
        $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND =>
        "Set names utf8")
    );
} catch (Exception $ex) {
    echo "Error: " . $ex->getMessage();
}
