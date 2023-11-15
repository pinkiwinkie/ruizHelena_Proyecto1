<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del producto</title>
    <link rel="stylesheet" href="../public/css/styles.css">
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
                                <a href="principal.php" class="sidebar-link">Products</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="bi bi-person pe-2"></i>Auth
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="../public/html/login.php" class="sidebar-link">Login</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                    <a href="./verCarrito.php?source=link" class="sidebar-link" id="carritoLink">
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

            <div class="container">
                <?php
                if ($data) {
                    echo "
                    <div class='row'>
                        <div class='col-md-12 d-flex justify-content-center'>
                            <div class='card card-home mb-3 m-5 cb1 text-center'>
                                <div class='row g-0'>
                                    <div class='col-md-5'>
                                        <img src='" . $data->foto . "' class='img-fluid rounded-start' alt='...'>
                                    </div>
                                    <div class='col-md-5'>
                                        <div class='card-body'>
                                            <h4 class='card-title'>" . $data->nombre . "</h4>
                                            <h6 class='card-subtitle m-3'>" . $data->marca . "</h6>
                                            <p class='card-text'>" . $data->descripcion . "</p>
                                            <p class='card-text'>" . $data->precio . "€</p>
                                            <form action='../controller/verCarrito.php' method='post'>
                                                <input type='number' min='1' name='cantidad' value='1' id=''>
                                                <input type='hidden' name='idProducto' value='" . $data->idProducto . "'>
                                                <input type='hidden' name='source' value='form'>
                                                <button type='submit' class='btn btn-card m-2'>Comprar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                } else {
                    echo "Los datos no están disponibles.";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../public/js/main.js"></script>
</body>

</html>