<?php
session_start();
include('../transacciones/validarAutenticacion.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/872eaf8216.js"></script>
    <title>Pedidos</title>
</head>

<body id="body" background="../Images/descarga.jpg">
    <?php
    include('../layouts/navbar.php');
    include('../transacciones/conexion.php');
    ?>
    <script src="../js/bootstrap.min.js"></script>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h4>Pedidos registrados</h4>
            </div>
        </div>
        <?php
        if ($_SESSION['role'] == 'Vendedor')
            echo '
        <div class="row">
            <div class="col">
                <a class="btn btn-success" href="./agregarPedido.php">
                    <i class="fa fa-plus-circle"></i> 
                </a>
            </div>
        </div>';
        ?>
        <div class="row mt-3">
            <table class="table caption-top table-bordered table-dark">
                
                <thead>
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Platillo</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Tipo de pago</th>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Repartidor</th>
                        <th scope="col">Fecha de alta</th>
                        <th scope="col">Fecha de entrega</th>
                        <th scope="col">Estatus</th>
                        <?php
                        if ($_SESSION['role'] != 'Administrador')
                            echo '<th scope="col">Entregar</th>';
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $cmd = 'SELECT 
                                    P.id AS id,
                                    P.nombrePlatillo AS nombrePlatillo,
                                    P.costo AS costo,
                                    P.cantidad AS cantidad,
                                    P.estatus AS estatus,
                                    P.cliente AS cliente,
                                    P.direccion AS direccion,
                                    P.tipoPago AS tipoPago,
                                    V.nombre AS vendedor,
                                    R.nombre AS repartidor,
                                    P.fechaAlta AS fechaAlta,
                                    P.fechaFinalizado AS fechaFinalizado
                    FROM Pedido AS P 
                    INNER JOIN Usuario as V ON V.id = P.vendedor
                    LEFT JOIN Usuario as R ON R.id = P.repartidor';

                    if (isset($_GET['estatus'])) {
                        $estatus = $_GET['estatus'];
                        $cmd = $cmd . ' WHERE P.estatus = ' . '"' . $estatus . '"';
                    }
                    if ($_SESSION['role']=='Repartidor') {
                        $cmd = $cmd . ' WHERE P.estatus = "Recibido"';
                    }

                    $result = $cn->query($cmd);
                    $pedidos = $result->fetchAll(PDO::FETCH_OBJ);


                    $totalVenta = 0;
                    foreach ($pedidos as $pedido) {
                        $totalVenta += $pedido->cantidad * $pedido->costo;
                        echo '
                            <tr>
                                <th scope="row">' . $pedido->id . '</th>
                                <td>' . $pedido->nombrePlatillo . '</td>
                                <td>$' . $pedido->costo . '</td>
                                <td>' . $pedido->cantidad . '</td>
                                <td>' . $pedido->cliente . '</td>
                                <td>' . $pedido->direccion . '</td>
                                <td>' . $pedido->tipoPago . '</td>
                                <td>' . $pedido->vendedor . '</td>
                                <td>' . $pedido->repartidor . '</td>
                                <td>' . $pedido->fechaAlta . '</td>
                                <td>' . $pedido->fechaFinalizado . '</td>
                                <td>' . $pedido->estatus . '</td>
                                ';
                        if ($_SESSION['role'] == 'Vendedor') {

                            echo '<td>';
                            echo '   <a class="btn btn-primary';
                            echo $pedido->estatus == 'Entregado' ? ' disabled' : '';
                            echo '" href="actualizarPedido.php?id=' . $pedido->id . '"><i class="fa fa-pencil">Actualizar</i></a>';
                            echo '   <a class="btn btn-danger" href="eliminarPedido.php?id=' . $pedido->id . '"><i class="fa fa-trash">Eliminar</i></a>';
                            echo '</td>';
                            echo '</tr>';;
                        }
                        if ($_SESSION['role'] == 'Repartidor') {
                            echo '
                                    <td>
                                        <a class="btn btn-dark" href="entregarPedido.php?id=' . $pedido->id . '"><i class="fa fa-check" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                ';
                        }
                    }
                    ?>



                </tbody>
                <?php 
                
                if($_SESSION['role'] == 'Administrador' ){
                    if(isset($_GET['estatus'])){
                        if($_GET['estatus'] == 'Entregado'){
                        
                            echo '
                            <tfoot>
                                <td></td>
                                <td>Total en caja</td>
                                <td>$ '.$totalVenta.'</td>
                            </tfoot>
                        ';
                        }   
                    }
                }
                ?>
                
            </table>
        </div>
    </div>
</body>

</html>