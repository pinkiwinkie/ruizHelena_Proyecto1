<?php

include "../model/Bd.php";
include "./clases/Cart.php";

$base = new Bd();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lineaCarrito = new Cart($_POST['idUnico'], $_POST['dniCliente'], $_POST['idProducto'], $_POST['cantidad']);
    $lineaCarrito->insertar($base->link);
    echo json_encode('insertado');
    exit();
}