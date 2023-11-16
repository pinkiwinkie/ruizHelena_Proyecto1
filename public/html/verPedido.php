<?php

require "../../serviceCart/clases/LineaPedido.php";
require "../../serviceCart/clases/Pedido.php";
require "../../serviceCart/clases/Cart.php";
require "../../model/Bd.php";
$base = new Bd();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroTarjeta = $_POST['numero_tarjeta'];
    $dniCliente = $_COOKIE['dni'];
    $idUnico = $_COOKIE['idUnico'];

    $link = $base->link;
    $queryDireccion = "SELECT direccion FROM clientes WHERE dniCliente = :dniCliente";
    $resultDireccion = $link->prepare($queryDireccion);
    $resultDireccion->bindParam(':dniCliente', $dniCliente);
    $resultDireccion->execute();
    echo "1";
    if ($rowDireccion = $resultDireccion->fetch(PDO::FETCH_ASSOC)) {
        echo "2";
        $direccionEntrega = $rowDireccion['direccion'];

        $pedido = new Pedido(date('Y-m-d H:i:s'), $direccionEntrega, $numeroTarjeta, null, null, $dniCliente);
        

        if ($pedido->insertarPedido($link)) {
            echo "3";
            $queryCarrito = "SELECT idProducto, cantidad FROM carrito WHERE idUnico = :idUnico";
            $result = $link->prepare($queryCarrito);
            $result->bindParam(':idUnico', $idUnico);
            $result->execute();
            while ($rowCarrito = $result->fetch(PDO::FETCH_ASSOC)) {
                $queryMaxNlinea = "SELECT MAX(nlinea) AS maxNlinea FROM lineaspedidos WHERE idPedido = :idPedido";
                $resultMaxNlinea = $link->prepare($queryMaxNlinea);
                $idPedido = $pedido->getIdPedido();
                $resultMaxNlinea->bindParam(':idPedido', $idPedido, PDO::PARAM_INT);
                $resultMaxNlinea->execute();
                $maxNlinea = $resultMaxNlinea->fetch(PDO::FETCH_ASSOC)['maxNlinea'];

                $lineaPedido = new LineaPedido($pedido->getIdPedido(), $maxNlinea + 1, $rowCarrito['idProducto'], $rowCarrito['cantidad']);
                $lineaPedido->insertarLineaPedido($link);
            }
            Cart::deleteCarrito($link, $idUnico);
        } else {
            echo "Error al añadir el pedido";
        }
        echo $pedido->toHTML();
        echo "<form action='../../pdf/generarPdf.php' method='post'>
                <input type='hidden' name='idPedido' value='{$pedido->getIdPedido()}'>
                <input type='hidden' name='infoHTML' value='" . htmlspecialchars($pedido->toHTML()) . "'>
                <button type='submit'>Generar PDF</button>
                </form>";
    } else {
        echo "Error: No se pudo obtener la dirección de entrega del cliente";
    }
}
