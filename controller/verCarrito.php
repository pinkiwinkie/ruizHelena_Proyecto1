<?php
include "../public/html/carrito.php";

echo '<script src="../public/js/carritoFetch.js"></script>';

echo ($_POST['idProducto']);
echo ($_POST['cantidad']);
echo "<script>
insertarProducto(0,0,'". $_COOKIE['dni']. "' ,".  isset($_POST['idProducto']). ",'". isset($_POST['cantidad'])."');
</script>";
?>