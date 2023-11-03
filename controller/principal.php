<?php
$api_url = 'http://localhost/ruizHelena_Proyecto1/serviceProduct/productService.php';
$response = file_get_contents($api_url);

if ($response == false) {
    echo 'error';
} else {
    $data = json_decode($response);
    if ($data != null) {     
    } else {
        echo 'error 2';
    }
}
?>

<!-- <?php
$api_url = 'http://localhost/ruizHelena_Proyecto1/serviceProduct/productService.php';
$response = file_get_contents($api_url);

if ($response == false) {
    echo 'error';
} else {
    $data = json_decode($response);
    if ($data != null) {
        var_dump($data);
        echo "
        <div class='card' style='width: 18rem; display: inline-block; margin: 10px;'> 
            <img src='" . $data->foto . "' class='card-img-top' alt='...'>
            <div class='card-body'>
                <h5 class='card-title'>" . $data->nombre . "</h5>
                <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href='#' class='btn btn-primary'>Añadir carrito</a>
                <a href='#' class='btn btn-primary'>Ver detalles</a>
            </div>
        </div>";
    } else {
        echo 'error 2';
    }
}
 ?>-->