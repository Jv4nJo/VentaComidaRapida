<?php

$id = $_POST['id'];


include('./conexion.php');
$cmd = 'DELETE FROM Pedido WHERE id=?';
$sql = $cn->prepare($cmd);
$resultado = $sql->execute([
    $id
]);


header("location: ../pages/pedidos.php");