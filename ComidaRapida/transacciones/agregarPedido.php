<?php

// $nombre = $_POST['nombre'];
// $usuario = $_POST['usuario'];
// $pwd = $_POST['pwd'];

$nombrePlatillo = $_POST['nombrePlatillo'];
$costo = $_POST['costo'];
$cantidad = $_POST['cantidad'];
$estatus = $_POST['estatus'];
$cliente = $_POST['cliente'];
$direccion = $_POST['direccion'];
$tipoPago = $_POST['tipoPago'];
$vendedor = $_POST['vendedor'];

echo $nombrePlatillo. '<br>';
echo $costo. '<br>';
echo $cantidad. '<br>';
echo $estatus. '<br>';
echo $cliente. '<br>';
echo $direccion. '<br>';
echo $tipoPago. '<br>';
echo $vendedor. '<br>';


include('./conexion.php');
$cmd = 'INSERT INTO Pedido 
(nombrePlatillo, costo, cantidad, estatus, cliente, direccion, tipoPago, vendedor, fechaAlta) VALUES 
(?,?,?,?,?,?,?,?,now())';
$sql = $cn->prepare($cmd);
$resultado = $sql->execute([
    $nombrePlatillo, $costo, $cantidad, $estatus, $cliente, $direccion, $tipoPago, $vendedor
]);

header("location: ../pages/pedidos.php");