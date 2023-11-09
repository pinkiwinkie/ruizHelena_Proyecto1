<?php
require '../../serviceProduct/clases/Product.php';
require '../../model/Bd.php';

class ProductController {
    public function showProductDetails() {
        $bd = new Bd();

        if (isset($_GET['idProducto'])) {
            $idProducto = $_GET['idProducto'];
            $product = new Product($idProducto);
            $productoEncontrado = $product->buscarProductoPorId($bd->link);
            return $productoEncontrado;
        } else {
            return null;
        }
    }
}