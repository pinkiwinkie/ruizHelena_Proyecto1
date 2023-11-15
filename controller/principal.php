<?php
$api_url = 'http://localhost/ruizHelena_Proyecto1/serviceProduct/productService.php';
$response = file_get_contents($api_url);

if ($response == false) {
    echo 'error';
} else {
    $data = json_decode($response);
    if (count($data) != 0) {   
        require_once "../public/html/products.php";  
    } else {
        echo 'error 2';
    }
}
?>