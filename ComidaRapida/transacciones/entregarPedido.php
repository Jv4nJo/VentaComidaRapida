<?php

$id = $_POST['id'];
$repartidor = $_POST['repartidor'];


include('./conexion.php');
$cmd = 'UPDATE Pedido SET 
estatus="Entregado", repartidor=?, fechaFinalizado=now() WHERE id=?';
$sql = $cn->prepare($cmd);
$resultado = $sql->execute([
    $repartidor, $id
]);

header("location: ../pages/pedidos.php");
