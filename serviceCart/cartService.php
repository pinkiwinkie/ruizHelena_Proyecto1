<?php

include "../model/Bd.php";
include "./clases/Cart.php";

$base = new Bd();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $dato = Cart::getAll($base->link);
        $dato->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($dato->fetchAll());
        exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lineaCarrito = new Cart(0,$_POST['idUnico'], 0, $_POST['dniCliente'], $_POST['idProducto'], $_POST['cantidad']);
    $lineaCarrito->insertarLineaCarrito($base->link);
    echo json_encode('insertado');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $idProducto = $_GET['idProducto'];
        
    $cart = new Cart($idCarrito, $idUnico, $dniCliente, $idProducto);
    
    if ($cart->deleteLineaCarrito($base->link)) {
        http_response_code(200); 
        echo json_encode(["message" => "Eliminación exitosa"]);
    } else {
        http_response_code(500); 
        echo json_encode(["message" => "Error en la eliminación"]);
    }
}