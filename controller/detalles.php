<?php
$api_url = 'http://localhost/ruizHelena_Proyecto1/serviceProduct/productService.php';
$response = file_get_contents($api_url);

echo $response;
    $data = json_decode($response);
    var_dump($data);
    if (!empty($data)) {   
        include "../public/html/details.php";  
    } else {
        echo 'error 2';
    }

?>