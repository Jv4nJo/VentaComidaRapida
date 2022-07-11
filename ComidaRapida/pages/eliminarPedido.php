<?php
session_start();
include('../transacciones/validarAutenticacion.php');
include("../transacciones/conexion.php");

$id = $_GET['id'];
$cmd = "select id,cliente from Pedido where id =" . $id;
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
    <title>Eliminar pedido</title>
</head>

<body>
    <?php
    include('../layouts/navbar.php');
    ?>
    <script src="../js/bootstrap.min.js"></script>
    <div class="container mt-4">
        <div class="row">
            <form action="../transacciones/eliminarPedido.php" method="POST">
                <div class="container mt-3">
                    <div class="row mt-3">
                        <input type="hidden" name="id" value="<?php echo $pedido->id; ?>" />
                        <h2 class="text-center text-danger">¿Está seguro que desea eliminar el pedido del cliente: <?php echo $pedido->cliente; ?>?</h2>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <input type="submit" class="btn btn-danger" value="Eliminar pedido" />
                            <a href="./pedidos.php" class="btn btn-dark"><i class="fa fa-reply" aria-hidden="true"></i>

                                Regresar
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>