<?php
$api_url = 'http://localhost/ruizHelena_Proyecto1/serviceProduct/productService.php?idProducto=' . $_GET['idProducto'];
$response = file_get_contents($api_url);


if ($response === false) {
    echo 'Error al hacer la solicitud: ' . error_get_last()['message'];
} else {
    // Procesar la respuesta JSON
    $data = json_decode($response);
    if (!empty($data)) {   
        include "../public/html/details.php";  
    } else {
        echo 'No se obtuvieron datos válidos';
    }
}