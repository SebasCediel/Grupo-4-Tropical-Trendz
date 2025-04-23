<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
header('Content-Type: application/json');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropical Trendz</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style11.css">
    <link rel="stylesheet" href="avatar-usuario.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">TROPICAL TRENDZ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="mujer.html">Mujer</a></li>
                        <li class="nav-item"><a class="nav-link" href="hombre.html">Hombre</a></li>
                        <li class="nav-item"><a class="nav-link" href="niños.html">Niños</a></li>
                        <li class="nav-item"><a class="nav-link" href="nosotros.html">Nosotros</a></li>
                    </ul>
                    
                    <!-- Sección de usuario -->
                    <div class="d-flex align-items-center ms-3 user-section">
                        <?php if(isset($_SESSION['user_id'])): ?>
                            <div class="d-flex align-items-center">
                                <div class="user-avatar">
                                    <?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?>
                                </div>
                                <span class="me-2"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                                <a href="logout.php" class="btn btn-outline-danger btn-sm">Cerrar Sesión</a>
                            </div>
                        <?php elseif(isset($_SESSION['just_registered'])): ?>
                            <a href="#" id="iniciar" class="btn me-2">Iniciar Sesión</a>
                            <?php unset($_SESSION['just_registered']); ?>
                        <?php else: ?>
                            <a href="#" id="iniciar" class="btn me-2">Iniciar Sesión</a>
                            <a href="#" id="registrar" class="btn me-3">Registrarse</a>
                        <?php endif; ?>
                        <button class="btn btn-outline-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCarrito">
                        <img src="Imagenes/car1.svg" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Carrito (Offcanvas Bootstrap) -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCarrito">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Carrito de Compras</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody id="lista-carrito"></tbody>
            </table>
            <p id="total-pagar" class="fw-bold mt-3">Total: $0</p>
            <button id="vaciar-carrito" class="btn btn-danger">Vaciar Carrito</button>
            <button id="pagar" class="btn btn-danger">Comprar</button>
        </div>
        </div>
    </header>
</body>
</html>