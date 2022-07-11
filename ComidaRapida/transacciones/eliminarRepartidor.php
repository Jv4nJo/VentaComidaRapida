<?php

$id = $_POST['id'];
echo $id;

include('./conexion.php');
$cmd = 'DELETE FROM Usuario WHERE id=?';
$sql = $cn->prepare($cmd);
$resultado = $sql->execute([
    $id
]);

header("location: ../pages/repartidores.php");