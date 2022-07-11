<nav class="navbar navbar-expand-lg navbar-blue bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SR Food</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['id'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="../pages/bienvenido.php">Inicio</a>
                    </li>
                    <?php if ($_SESSION['role'] == 'Administrador') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/vendedores.php">Vendedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/repartidores.php">Repartidores</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pedidos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../pages/pedidos.php?estatus=Recibido">Recibidos</a></li>
                            <li><a class="dropdown-item" href="../pages/pedidos.php?estatus=Entregado">Entregados</a></li>
                        </ul>
                    </li>
                    <?php endif;?>
                    
                    <?php if ($_SESSION['role'] != 'Administrador') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/pedidos.php">Pedidos</a>
                        </li>
                        <?php endif;?>
                <?php endif; ?>


            </ul>
            <?php if (isset($_SESSION['id'])) : ?>
            <a class="btn btn-dark" href="../transacciones/cerrarSesion.php">Cerrar sesión</a>
            <?php endif; ?>
        </div>
    </div>
</nav>