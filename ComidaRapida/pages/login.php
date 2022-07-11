<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/872eaf8216.js"></script>
    <title>Login</title>
    <body id="body" background="../Images/delicious-fast-food-menu-template-square-frame-in-gray-background-vector.jpg"></body>
</head>


    <?php include('../layouts/navbar.php') ?>
    <form action="../transacciones/validarSesion.php" method="post">
        <div class="row mt-2 ">
            <div class="col-xs-12 offset-sm-2 col-sm-8 offset-md-4 col-md- offset-lg-4 col-lg-4">
                <div class="card">
                    <h5 class="card-header bg-success text-white text-center">Iniciar Sesión</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSajZmDxDFDHGaR7dASRW_R86ZlgLCa3-GHXA&usqp=CAU" class="img-fluid" width="200" alt="sin imagen">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <?php
                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == 400)
                                    echo '<h3 class="text-danger text-center"><i class="fa fa-exclamation-triangle"></i> Usuario y/o contraseña incorrectos</h3>';
                                if ($_GET['error'] == 401)
                                    echo '<h3 class="text-danger text-center"><i class="fa fa-exclamation-triangle"></i> Es necesario iniciar sesión</h3>';
                            }
                            ?>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Usuario</label>
                                <input type="text" name='usuario' placeholder="Ingrese su usuario" class="form-control form-control-lg" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label>Contraseña</label>
                                <input type="password" name='password' placeholder="Ingrese su password" class="form-control form-control-lg" />
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-success">
                                Iniciar Sesión
                            </button>
                            <button type="button" class="btn btn-success">
                                Regístrate
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

</html>