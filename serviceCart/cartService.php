<?php

include "../model/Bd.php";
include "./clases/Cart.php";

$base = new Bd();
$vector=json_decode( file_get_contents("php://input"),true);

if ($_SERVER['REQUEST_METHOD'] == 'GET') { //pasarle id para diferenciar personas
    $datos = Cart::getAll($base->link);
    header("HTTP/1.1 200 OK");
    echo json_encode($datos);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lineaCarrito = new Cart('', $vector['idUnico'], $vector['idProducto'], $vector['cantidad'], $vector['dniCliente']);
    if($lineaCarrito->insertarLineaCarrito($base->link)){
        http_response_code(200);
        echo json_encode("insertado");
    }else {
        http_response_code(500); 
        echo json_encode("no insertado");
    }
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

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $idCarrito = $_GET['idCarrito'];
    $cantidad = $_GET['cantidad'];

    if (isset($idCarrito) && isset($cantidad)) { //comprobar con isset
        // Es una actualización de la cantidad en el carrito
        $cart = new Cart($idCarrito, 0, 0, $cantidad, 0);

        if ($cart->updateCarrito($base->link)) {
            http_response_code(200);
            echo json_encode("update exitoso");
        } else {
            http_response_code(500);
            echo json_encode("Error en el update");
        }
    } else {
        // Es una actualización del campo dniCliente
        $idUnico = $vector['idUnico'];
        $dniCliente = $vector['dniCliente'];

        $cart = new Cart('', $idUnico, 0, 0, $dniCliente);

        if ($cart->updateDni($base->link)) {
            http_response_code(200);
            echo json_encode("update dniCliente exitoso");
        } else {
            http_response_code(500);
            echo json_encode("Error en el update dniCliente");
        }
    }
}