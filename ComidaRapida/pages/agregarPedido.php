<?php
session_start();
include('../transacciones/validarAutenticacion.php');
include('../transacciones/validarAutorizacionVendedor.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/872eaf8216.js"></script>
    <title>Agregar Pedido</title>
</head>

<body id="body" background="../Images/image.jpg">
    <?php include('../layouts/navbar.php') ?>
    <script src="../js/bootstrap.min.js"></script>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <form action="../transacciones/agregarPedido.php" method="POST">
                    <div class="card text-center">
                        <div class="card-header">
                            <h4>Agregar pedido</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="vendedor" value="<?php echo $_SESSION['id']; ?>" />
                                <input type="hidden" name="estatus" value="Recibido" />
                                <div class="col-4"><label>Platillo</label>
                                    <input type="text" name='nombrePlatillo' placeholder="Nombre del platillo" class="form-control form-control-lg" />
                                </div>
                                <div class="col-4"><label>Costo</label>
                                    <input type="number" name='costo' placeholder="Costo del platillo" class="form-control form-control-lg" />
                                </div>
                                <div class="col-4"><label>Cantidad</label>
                                    <input type="text" name='cantidad' placeholder="Cantidad del platillo" class="form-control form-control-lg" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4"><label>Cliente</label>
                                    <input type="text" name='cliente' placeholder="Nombre del cliente" class="form-control form-control-lg" />
                                </div>
                                <div class="col-4"><label>Dirección</label>
                                    <input type="text" name='direccion' placeholder="Dirección del cliente" class="form-control form-control-lg" />
                                </div>
                                <div class="col-4"><label>TIpo de pago</label>
                                    <select name="tipoPago" class="form-control form-control-lg">
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="PayPal">PayPal</option>
                                        <option value="Tarjeta de crédito">Tarjeta de crédito</option>
                                        <option value="Compensacion">Por Compensacion</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <div class="d- gap-2">
                                <button class="btn btn-info"> Agregar pedido</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>