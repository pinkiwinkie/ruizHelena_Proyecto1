<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="stylesheet" href="../public/css/cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Kumbh+Sans:wght@400;700&family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="body">
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="h-100 myContainer">
                <div class="sidebar-logo">
                    <div>
                        <img class="img-logo" src="../public/img/logo.png" alt="">
                    </div>
                    <div class="close-button">
                        <span class="bi bi-x-lg"></span>
                    </div>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="../public/html/home.php" class="sidebar-link">
                            <i class="bi bi-house pe-2"></i>Inicio
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#language" aria-expanded="false" aria-controls="language">
                            <i class="bi bi-translate pe-2"></i> Idioma
                        </a>
                        <ul id="language" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <img src="../img/esp.png" alt="" class="pe-2">Español</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <img src="../img/ing.png" alt="" class="pe-2">Inglés</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <img src="../img/fra.png" alt="" class="pe-2">Francés</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <img src="../img/ale.png" alt="" class="pe-2">Alemán</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                            <i class="bi bi-file-earmark-text pe-2"></i> Páginas
                        </a>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                <i class="bi bi-info-circle pe-2"></i>Sobre nosotros
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                    <i class="bi bi-boxes pe-2"></i> Productos
                                </a>
                                <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#multi">
                                <li class="sidebar-item">
                                        <a href="./principal.php" class="sidebar-link">
                                            <i class="bi bi-people-fill pe-2"></i>Todos
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="./principal.php" class="sidebar-link">
                                            <i class="bi bi-person-standing pe-2"></i>Hombre
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="./principal.php" class="sidebar-link">
                                            <i class="bi bi-person-standing-dress pe-2"></i>Mujer
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="bi bi-person pe-2"></i>Autenticación
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="../public/html/login.php" class="sidebar-link">Login</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="../../controller/verCarrito.php?source=link" class="sidebar-link" id="carritoLink">
                            <i class="bi bi-cart pe-2"></i>Carrito
                        </a>
                    </li>
                </ul>
                <div class="socialMedia">
                    <a href="https://www.instagram.com/" class="sidebar-link">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://twitter.com/" class="sidebar-link">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="https://www.whatsapp.com/" class="sidebar-link">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Component -->

        <div class="main">
            <nav class="content-header navbar px-3 border-bottom">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="../public/html/home.php">FRAGANCE</a>
                <div class="nameUsuario">Hola, <?php echo isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : 'Usuario'; ?></div>
            </nav>

            <h1 class="title text-center py-4">Tu carrito</h1>
            <section id="cart-container" class="container my-5"></section>
            <section id="cart-bottom" class="container"></section>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../public/js/main.js"></script>
</body>

</html>