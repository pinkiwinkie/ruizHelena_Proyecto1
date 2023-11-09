<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fragance</title>
    <link rel="stylesheet" href="../css/styles.css">
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
                        <img class="img-logo" src="../img/logo.png" alt="">
                    </div>
                    <div class="close-button">
                        <span class="bi bi-x-lg"></span>
                    </div>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="index.php" class="sidebar-link">
                            <i class="bi bi-house pe-2"></i>Home
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
                            <i class="bi bi-file-earmark-text pe-2"></i> Pages
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">About</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="../../controller/principal.php" class="sidebar-link">Products</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="bi bi-person pe-2"></i>Auth
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="../html/login.php" class="sidebar-link">Login</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <i class="bi bi-cart pe-2"></i>Cart
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

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Tu carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="carrito-items">
                    <div class="carrito-item">
                        <img src="../img/212.png" alt="" width="80px">
                        <div class="carrito-item-details">
                            <span class="carrito-item-title">212</span>
                            <div class="selector-cantidad">
                                <i class="bi bi-dash-lg restar-cantidad"></i>
                                <input type="text" value="1" class="carrito-item-cantidad" disabled>
                                <i class="bi bi-plus-lg sumar-cantidad"></i>
                            </div>
                        </div>
                        <span class="carrito-item-precio">155€</span>
                    </div>
                    <span class="btn-eliminar">
                        <i class="bi bi-trash-fill"></i>
                    </span>
                </div>

                <div class="carrito-items">
                    <div class="carrito-item">
                        <img src="../img/inLove.png" alt="" width="80px">
                        <div class="carrito-item-details">
                            <span class="carrito-item-title">In love</span>
                            <div class="selector-cantidad">
                                <i class="bi bi-dash-lg restar-cantidad"></i>
                                <input type="text" value="2" class="carrito-item-cantidad" disabled>
                                <i class="bi bi-plus-lg sumar-cantidad"></i>
                            </div>
                        </div>
                        <span class="carrito-item-precio">80€</span>
                    </div>
                    <span class="btn-eliminar">
                        <i class="bi bi-trash-fill"></i>
                    </span>
                </div>
            </div>
            <div class="carrito-total">
                <div class="row">
                    <strong>Tu total</strong>
                    <span class="carrito-precio-total">
                        235€
                    </span>
                </div>
                <button class="btn-pagar">
                    <i class="bi bi-bag-fill"></i>
                </button>
            </div>
        </div>

        <!-- Main Component -->

        <div class="main">
            <nav class="content-header navbar px-3 border-bottom">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="index.php">FRAGANCE</a>
                <div class="nameUsuario">Hola, <?php echo isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : 'Usuario'; ?></div>
            </nav>
            <!-- More sellers -->
            <div class="container">
                <h1 class="title text-center py-4">Productos más vendidos</h1>
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="card card-home mb-3 m-2 cb1 text-center">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../img/ligthblue.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Light blue</h5>
                                        <p class="card-text">Una fragancia florida y frutal con salida de notas frescas y refinadas (manzana Granny Smith, cedro de Sicilia y jacintos silvestres). El corazón, muy femenino, se compone de jazmín, rosa blanca y bambú. El fondo amaderado y suave está constituido por madera de cedro, ámbar y almizcles.</p>
                                        <a href="#" class="btn btn-card">Añadir al carrito</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="card card-home mb-3 m-2 cb1 text-center">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../img/escale.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Escalè a portofino</h5>
                                        <p class="card-text">Un agua hespéride que se abre con “una farándula de cítricos”. La fragancia desvela luego notas de almendra amarga, de azahar, de bayas de enebro y toques amaderados de ciprés y de cedro. Un crucero olfativo en tierra italiana.</p>
                                        <a href="#" class="btn btn-card">Añadir al carrito</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</body>

</html>