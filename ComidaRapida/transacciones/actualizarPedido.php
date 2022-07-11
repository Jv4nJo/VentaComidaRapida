<?php

$id = $_POST['id'];
$nombrePlatillo = $_POST['nombrePlatillo'];
$costo = $_POST['costo'];
$cantidad = $_POST['cantidad'];
$cliente = $_POST['cliente'];
$direccion = $_POST['direccion'];
$tipoPago = $_POST['tipoPago'];


include('./conexion.php');
$cmd = 'UPDATE Pedido SET 
nombrePlatillo=?, costo=?, cantidad=?, cliente=?, direccion=?, tipoPago=? WHERE id=?';
$sql = $cn->prepare($cmd);
$resultado = $sql->execute([
    $nombrePlatillo, $costo, $cantidad, $cliente, $direccion, $tipoPago, $id
]);

header("location: ../pages/pedidos.php");