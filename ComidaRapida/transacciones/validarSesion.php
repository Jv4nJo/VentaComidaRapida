<?php
session_start();
$usuario = $_POST['usuario'];
$pwd = $_POST['password'];

include "./conexion.php";
$sentencia = $cn->prepare("SELECT U.id AS id, U.nombre as nombre, R.role as role, U.usuario as usuario  FROM Usuario AS U
INNER JOIN Roles AS R ON U.roleId=R.id 
WHERE U.usuario=? AND U.pwd=?");
$sentencia->execute([$usuario, $pwd]);
$login = $sentencia->fetch(PDO::FETCH_OBJ);
if ($login) {
    $_SESSION['id'] = $login->id;
    $_SESSION['role'] = $login->role;
    $_SESSION['nombre'] = $login->nombre;
    $_SESSION['usuario'] = $login->usuario;
    
    header("location: ../pages/bienvenido.php");
} else {
    header("location: ../pages/login.php?error=400");
}
