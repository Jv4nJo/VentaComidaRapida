<?php
session_start();
include('../transacciones/validarAutenticacion.php');
include('../transacciones/validarAutorizacionAdmin.php');
include("../transacciones/conexion.php");

$id = $_GET['id'];
$cmd = "select id,nombre, usuario from Usuario where id =" . $id;
$resultado = $cn->query($cmd);
$repartidor = $resultado->fetch(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/872eaf8216.js"></script>
    <title>Actualizar Repartidor</title>
</head>

<body>
    <?php include('../layouts/navbar.php') ?>
    <script src="../js/bootstrap.min.js"></script>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <form action="../transacciones/actualizarRepartidor.php" method="POST">
                    <div class="card text-center">
                        <div class="card-header">
                            <h4>Actualizar repartidor</h4>
                        </div>
                        <div class="card-body">

                            <div class="row mt-3">
                                <input type="hidden" name="id" value="<?php echo $repartidor->id; ?>" />
                            </div>
                            <div class="row mt-3">
                                <div class="col-6"><label>Nombre</label>
                                    <input type="text" name='nombre' value="<?php echo $repartidor->nombre ?>" placeholder="Ingrese el nombre del repartidor" class="form-control form-control-lg" />
                                </div>
                                <div class="col-6"><label>Usuario</label>
                                    <input type="text" name='usuario' value="<?php echo $repartidor->usuario ?>" placeholder="Ingrese el usuario del repartidor" class="form-control form-control-lg" />
                                </div>


                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Actualizar repartidor</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>