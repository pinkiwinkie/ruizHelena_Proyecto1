<?php
include "../public/html/carrito.php";

echo '<script src="../public/js/carritoFetch.js"></script>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['source']) && $_POST['source'] == 'form') {
        echo '<script>alert("Formulario")</script>';
        if (isset($_POST['idProducto']) && isset($_POST['cantidad'])) {
            $idProducto = $_POST['idProducto'];
            $cantidad = $_POST['cantidad'];
            $dniCliente = $_COOKIE['dni'];
            echo "<script>
        insertarProducto(0, 3, $idProducto, $cantidad, '$dniCliente');
        </script>"; 
        } else {
            echo "Error: Datos incompletos recibidos.";
        }
        
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['source']) && $_GET['source'] == 'link') {
        echo '<script>alert("link")</script>';
    }
}
