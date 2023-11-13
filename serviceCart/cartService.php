<?php

include "../model/Bd.php";
include "./clases/Cart.php";

$base = new Bd();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $datos = Cart::getAll($base->link);
    header("HTTP/1.1 200 OK");
    echo json_encode($datos);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lineaCarrito = new Cart(0,$_POST['idUnico'], $_POST['idProducto'], $_POST['cantidad'], $_POST['dniCliente']);
    $lineaCarrito->insertarLineaCarrito($base->link);
    echo json_encode('insertado');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $idCarrito = $_GET['idCarrito'];
        
    $cart = new Cart($idCarrito, 0, 0, 0, 0);
    
    if ($cart->deleteLineaCarrito($base->link)) {
        http_response_code(200); 
        echo json_encode(["message" => "Eliminación exitosa"]);
    } else {
        http_response_code(500); 
        echo json_encode(["message" => "Error en la eliminación"]);
    }
}

if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    $idCarrito = $_GET['idCarrito'];
    $cantidad = $_GET['cantidad'];
    
    $cart = new Cart($idCarrito,0,0,$cantidad,0);

    if($cart->updateCarrito($base->link)){
        http_response_code(200); 
        echo json_encode(["message" => "update exitoso"]);
    }else {
        http_response_code(500); 
        echo json_encode(["message" => "Error en el update"]);
    }
}