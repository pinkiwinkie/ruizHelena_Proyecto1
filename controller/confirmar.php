<?php

if (!isset($_COOKIE['dni'])) {
    echo "tienes que estar logueado para pagar </br>";
    echo '<a href="../public/html/login.php">Iniciar Sesión</a>';
} else{
    echo '
    <form action="procesar_tarjeta.php" method="post">
        <label for="numero_tarjeta">Número de tarjeta:</label>
        <input type="text" name="numero_tarjeta" id="numero_tarjeta" placeholder="Ingrese el número de tarjeta" required>

        <button type="submit">Pagar</button>
    </form>';
}