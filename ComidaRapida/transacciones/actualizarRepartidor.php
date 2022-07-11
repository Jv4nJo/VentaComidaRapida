<?php

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];

include('./conexion.php');
$cmd = 'UPDATE Usuario SET nombre = ?, usuario=? WHERE id = ?';
$sql = $cn->prepare($cmd);
$resultado = $sql->execute([$nombre,$usuario, $id]);

echo $id;
echo $nombre;
echo $usuario;
header("location: ../pages/repartidores.php");