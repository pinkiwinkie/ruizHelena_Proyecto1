<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/login.css">
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
                        <a href="./home.php" class="sidebar-link">
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
                                <a href="login.php" class="sidebar-link">Login</a>
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

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <!-- Contenido de tu carrito de compras aquí -->
            </div>
        </div>

        <!-- Main Component -->

        <div class="main">
            <nav class="content-header navbar px-3 border-bottom">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="./home.php">FRAGANCE</a>
                <div class="nameUsuario">Hola, <?php echo isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : 'Usuario'; ?></div>
            </nav>
            <!-- Forms login signup -->
            <div class="container__all">
                <div class="bg__box">
                    <div class="bg__box-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para poder comprar</p>
                        <button id="btn__login">Login</button>
                    </div>
                    <div class="bg__box-signup">
                        <h3>¿No tienes una cuenta?</h3>
                        <p>Regístrese aquí</p>
                        <button id="btn__signup">Sign up</button>
                    </div>
                </div>

                <div class="container__login-signup">
                    <!--login-->
                    <div class="form__login" id="form-login">
                        <h2>Login</h2>
                        <form action="" method="post" id="formLogin">
                            <input type="text" placeholder="Dni" id="username" name="dniCliente">
                            <input type="password" placeholder="Password" id="password" name="pwd">
                            <button role="button" type="submit" name="login">Get in</button>
                        </form>
                    </div>
                    <!--signup-->
                    <div class="form__signup" id="form-signup">
                        <h2>Sign up</h2>
                        <form action="" method="post" id="formRegistro">
                            <input type="text" placeholder="Dni" id="signup-dni" name="dniCliente">
                            <input type="text" placeholder="Name" id="signup-name" name="nombre">
                            <input type="text" placeholder="Dirección" id="signup-direccion" name="direccion">
                            <input type="text" placeholder="Email" id="signup-email" name="email">
                            <input type="password" placeholder="Password" id="signup-password" name="pwd">
                            <button role="button" type="submit" name="register">Register</button>
                        </form>
                    </div>
                </div>
            </div>
            <form action="../../controller/validar.php" method="post" id="formHidden" style="visibility: hidden;display:none;">
                <input type="text" placeholder="Dni" id="formHidden-dni" name="dniCliente">
                <input type="text" placeholder="Name" id="formHidden-name" name="nombre">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../js/signUpFetch.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/login.js"></script>
    <script src="../js/logInFetch.js"></script>
</body>

</html>