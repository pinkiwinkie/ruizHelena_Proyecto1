<?php
$api_url = 'http://localhost/ruizHelena_Proyecto1/serviceCart/cartService.php';


$response = file_get_contents($api_url);
$show = "";

if ($response === false) {
    echo 'error';
} else {
    $data = json_decode($response);
    
}
?>
