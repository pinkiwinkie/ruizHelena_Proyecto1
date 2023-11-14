<?php
include "../public/html/carrito.php";

echo '<script src="../public/js/carritoFetch.js"></script>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si proviene del formulario
    if (isset($_POST['source']) && $_POST['source'] == 'form') {
        echo '<script>alert("Formulario")</script>';
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar si proviene del enlace
    if (isset($_GET['source']) && $_GET['source'] == 'link') {
        echo '<script>alert("link")</script>';
    }
}


/* echo ($_POST['idProducto']);
echo ($_POST['cantidad']);
echo "<script>
insertarProducto(0,0,'". $_COOKIE['dni']. "' ,".  isset($_POST['idProducto']). ",'". isset($_POST['cantidad'])."');
</script>"; */
?>