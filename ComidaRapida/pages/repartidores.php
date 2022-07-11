<?php
session_start();
include('../transacciones/validarAutenticacion.php');
include('../transacciones/validarAutorizacionAdmin.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/872eaf8216.js"></script>
    <title>Repartidores</title>
</head>

<body id="body" background="../Images/6c6b7ab836527578245ce86ce459d0ad.jpg">
    <?php
    include('../layouts/navbar.php');
    include('../transacciones/conexion.php')
    ?>
    <script src="../js/bootstrap.min.js"></script>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h4>Repartidores registrados</h4>
            </div>
        </div>
        
        <div class="row mt-3">
            <table class="table caption-top">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Fecha de alta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cmd = 'SELECT id,nombre, usuario, fechaAlta FROM Usuario WHERE roleId = 3';
                    $result = $cn->query($cmd);
                    $Repartidores = $result->fetchAll(PDO::FETCH_OBJ);
                    foreach ($Repartidores as $Repartidor) {
                        echo '
                        <tr>
                            <th scope="row">' . $Repartidor->id . '</th>
                            <td>' . $Repartidor->nombre . '</td>
                            <td>' . $Repartidor->usuario . '</td>
                            <td>' . $Repartidor->fechaAlta . '</td>
                            <td >
                                <a class="btn btn-primary" href="./actualizarRepartidor.php?id=' . $Repartidor->id . '"><i class="fa fa-pencil">Actualizar</i></a>
                                <a class="btn btn-danger" href="./eliminarRepartidor.php?id=' . $Repartidor->id . '"><i class="fa fa-trash">Eliminar</i></a>
                            </td>
                        </tr>
                    ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>