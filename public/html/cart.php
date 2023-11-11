<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/cart.css">
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
                        <a href="home.php" class="sidebar-link">
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
                        <a href="./cart.php" class="sidebar-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
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

            <h1 class="title text-center py-4">Tu carrito</h1>
            <section id="cart-container" class="container my-5">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Eliminar</td>
                            <td>Imagen</td>
                            <td>Producto</td>
                            <td>Precio</td>
                            <td>Cantidad</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#"><i class="bi bi-trash3-fill"></i></a></td>
                            <td><img src="../img/1881.png" alt=""></td>
                            <td>
                                <h5>1881</h5>
                            </td>
                            <td>
                                <h5>15€</h5>
                            </td>
                            <td><input class="w-25 pl-1" value="1" min="1" type="number"></td>
                            <td>
                                <h5>30€</h5>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="#"><i class="bi bi-trash3-fill"></i></a></td>
                            <td><img src="../img/littleKissme.png" alt=""></td>
                            <td>
                                <h5>1881</h5>
                            </td>
                            <td>
                                <h5>15€</h5>
                            </td>
                            <td><input class="w-25 pl-1" value="1" min="1" type="number"></td>
                            <td>
                                <h5>30€</h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <section id="cart-bottom" class="container">
                <div class="row">
                    <div class="total col-lg-6 col-md-6 col-12 mb-4">
                        <div>
                            <h5>Total del carrito</h5>
                            <div class="d-flex justify-content-between">
                                <h6>Subtotal</h6>
                                <p>215€</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6>Envío</h6>
                                <p>215€</p>
                            </div>
                            <hr class="hr">
                            <div class="d-flex justify-content-between">
                                <h6>Total</h6>
                                <p>215€</p>
                            </div>
                            <button class="m-2 btn btn-card">Pagar</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</body>

</html>