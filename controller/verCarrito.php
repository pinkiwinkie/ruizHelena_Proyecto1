<?php

if (!isset($_COOKIE['idUnico'])) {
    $idUnic = uniqid();
    setcookie('idUnico', $idUnic, 0, '/'); 
} else {
    $idUnic = $_COOKIE['idUnico'];
}
require "../public/html/carrito.php";
echo '<script src="../public/js/carritoFetch.js"></script>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['source']) && $_POST['source'] == 'form') {

        if (isset($_POST['idProducto']) && isset($_POST['cantidad'])) {
            $idProducto = $_POST['idProducto'];
            $cantidad = $_POST['cantidad'];
            $dniCliente = isset($_COOKIE['dni']) ? $_COOKIE['dni'] : '';

            echo "<script>
                    insertarProducto(0, '$idUnic', $idProducto, $cantidad, '$dniCliente');
                </script>";
        } else {
            echo "Error: Datos incompletos recibidos.";
        }
    }
}
