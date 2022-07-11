<?php
session_start();
include('../transacciones/validarAutenticacion.php');
include('../transacciones/validarAutorizacionVendedor.php');
include("../transacciones/conexion.php");

$id = $_GET['id'];
$cmd = "select id,nombrePlatillo, costo, cantidad, cliente, direccion, tipoPago from Pedido where id =" . $id;
$resultado = $cn->query($cmd);
$pedido = $resultado->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/872eaf8216.js"></script>
    <title>Actualizar Pedido</title>
</head>

<body>
    <?php include('../layouts/navbar.php') ?>
    <script src="../js/bootstrap.min.js"></script>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <form action="../transacciones/actualizarPedido.php" method="POST">
                    <div class="card text-center">
                        <div class="card-header">
                            <h4>Actualizar pedido</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="id" value="<?php echo $pedido->id; ?>" />
                                <input type="hidden" name="estatus" value="Recibido" />
                                <div class="col-4"><label>Platillo</label>
                                    <input type="text" name='nombrePlatillo' value="<?php echo $pedido->nombrePlatillo?>" placeholder="Ingrese el nombre del platillo" class="form-control form-control-lg" />
                                </div>
                                <div class="col-4"><label>Costo</label>
                                    <input type="number" name='costo' placeholder="Ingrese el costo del platillo" value="<?php echo $pedido->costo?>" class="form-control form-control-lg" />
                                </div>
                                <div class="col-4"><label>Cantidad</label>
                                    <input type="text" name='cantidad' value="<?php echo $pedido->cantidad?>" placeholder="Ingrese la cantidad del platillo" class="form-control form-control-lg" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4"><label>Cliente</label>
                                    <input type="text" name='cliente' value="<?php echo $pedido->cliente?>" placeholder="Ingrese el nombre del cliente" class="form-control form-control-lg" />
                                </div>
                                <div class="col-4"><label>Dirección</label>
                                    <input type="text" name='direccion' value="<?php echo $pedido->direccion?>" placeholder="Ingrese la dirección del cliente" class="form-control form-control-lg" />
                                </div>
                                <div class="col-4"><label>TIpo de pago</label>
                                    <select name="tipoPago" class="form-control form-control-lg">
                                        <option <?php echo $pedido->tipoPago == 'Efectivo' ? 'selected' :''?> value="Efectivo" >Efectivo</option>
                                        <option <?php echo $pedido->tipoPago == 'Tarjeta de crédito' ? 'selected' :''?> value="Tarjeta de crédito">Tarjeta de crédito</option>
                                        <option <?php echo $pedido->tipoPago == 'PayPal' ? 'selected' :''?> value="Paypal">Paypal</option>
                                        <option <?php echo $pedido->tipoPago == 'Compensacion' ? 'selected' :''?> value="Compensacion">Por Compensacion</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Actualizar pedido</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>