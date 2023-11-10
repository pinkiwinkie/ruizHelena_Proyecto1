<?php
$api_url = 'http://localhost/ruizHelena_Proyecto1/serviceCart/cartService.php';
$response = file_get_contents($api_url);
$show = "";

if ($response === false) {
    echo 'error';
} else {
    $data = json_decode($response);

    if (count($data) != 0) {
        echo "<div class='offcanvas-body'>
            <div class='carrito-items'>";

        foreach ($data as $product) {
            echo "<div class='carrito-item'>
                <img src='../img/{$product['nombre']}.png' alt='' width='80px'>
                <div class='carrito-item-details'>
                    <span class='carrito-item-title'>{$product['nombreProducto']}</span>
                    <div class='selector-cantidad'>
                        <i class='bi bi-dash-lg restar-cantidad'></i>
                        <input type='text' value='{$product['cantidad']}' class='carrito-item-cantidad' disabled>
                        <i class='bi bi-plus-lg sumar-cantidad'></i>
                    </div>
                </div>
                <span class='carrito-item-precio'>{$product['precio']}€</span>
                </div>
                <span class='btn-eliminar'>
                    <i class='bi bi-trash-fill'></i>
                </span>
            </div>";
        }

        echo "</div></div>";
    } else {
        $show .= "No hay productos en la cesta";
    }
}

echo $show;
?>
