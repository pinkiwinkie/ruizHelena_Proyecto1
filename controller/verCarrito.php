<?php
require "../public/html/carrito.php";
//raleway -> google fonts
echo '<script src="../public/js/carritoFetch.js"></script>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['source']) && $_POST['source'] == 'form') {
        
        if (!isset($_COOKIE['idUnico'])) {
            $idUnic = uniqid();
            //echo($idUnic);
            setcookie('idUnico', $idUnic,time()+300000,'/');
            
            if (isset($_POST['idProducto']) && isset($_POST['cantidad'])) {
                $idProducto = $_POST['idProducto'];
                $cantidad = $_POST['cantidad'];
                $dniCliente = $_COOKIE['dni'];
                
                echo "<script>
                    insertarProducto(0, '$idUnic', $idProducto, $cantidad, '$dniCliente');
                </script>";
            } else {
                echo "Error: Datos incompletos recibidos.";
            }
        }else{
            if (isset($_POST['idProducto']) && isset($_POST['cantidad'])) {
                $idProducto = $_POST['idProducto'];
                $cantidad = $_POST['cantidad'];
                $dniCliente = $_COOKIE['dni'];
                $idUnic=$_COOKIE['idUnico'];
                echo "<script>
                    insertarProducto(0, '$idUnic', $idProducto, $cantidad, '$dniCliente');
                </script>";
            } else {
                echo "Error: Datos incompletos recibidos.";
            }
        }
    }
}
