<?php
session_start();
include('../transacciones/validarAutenticacion.php');
include('../transacciones/conexion.php');
$nombre = $_SESSION['nombre'];
$role = $_SESSION['role'];

$cmd = 'select count(*) as total from Pedido where estatus ="Recibido"';
$resultado = $cn->query($cmd);
$recibidos = $resultado->fetch(PDO::FETCH_OBJ);

$cmd = 'select count(*) as total from Pedido where estatus ="Entregado"';
$resultado = $cn->query($cmd);
$entregados = $resultado->fetch(PDO::FETCH_OBJ);

$cmd = 'select count(*) as total from Pedido';
$resultado = $cn->query($cmd);
$totales = $resultado->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Bienvenido</title>
</head>

<body id="body" background="../Images/images.jpg">
    <?php
    include('../layouts/navbar.php');
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 401) {
            echo '<h3 class="text-danger text-center"><i class="fa fa-exclamation-triangle"></i> No tienes permisos para acceder a este módulo</h3>';
        }
    }
    ?>
    <script src="../js/bootstrap.min.js"></script>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h4>Bienvenido <?php echo $nombre; ?></h4>
                <h3>Rol: <?php echo $role ?></h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Pedidos Totales - <?php echo $totales->total ?> pedidos</h5>
                        <p class="card-text">Total de pedidos en general</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Pedidos Recibidos - <?php echo $recibidos->total ?> pedidos </h5>
                        <p class="card-text">Total de pedidos recibidos listos para entregar</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Pedidos entregados - <?php echo $entregados->total ?> pedidos</h5>
                        <p class="card-text">Total de pedidos entregados</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>