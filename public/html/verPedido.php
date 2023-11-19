<?php

//esto seria el controlador y los metodos tienen que ir en el servicio
require "../../serviceCart/clases/LineaPedido.php";
require "../../serviceCart/clases/Pedido.php";
require "../../serviceCart/clases/Cart.php";
require "../../model/Bd.php";
$base = new Bd();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lineasPedido = [];
    $numeroTarjeta = $_POST['numero_tarjeta'];
    $dniCliente = $_COOKIE['dni'];
    $idUnico = $_COOKIE['idUnico'];

    $link = $base->link;
    $queryDireccion = "SELECT direccion FROM clientes WHERE dniCliente = :dniCliente";
    $resultDireccion = $link->prepare($queryDireccion);
    $resultDireccion->bindParam(':dniCliente', $dniCliente);
    $resultDireccion->execute();

    if ($rowDireccion = $resultDireccion->fetch(PDO::FETCH_ASSOC)) {

        $direccionEntrega = $rowDireccion['direccion'];

        $pedido = new Pedido(date('Y-m-d H:i:s'), $direccionEntrega, $numeroTarjeta, null, null, $dniCliente);


        if ($pedido->insertarPedido($link)) {

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
                $lineasPedido[] = $lineaPedido;
            }
            Cart::deleteCarrito($link, $idUnico);
        } else {
            echo "Error al añadir el pedido";
        }
        echo $pedido->toHTML();
        foreach ($lineasPedido as $lineaPedido) {
            echo $lineaPedido->toHTML($link);
        }
        echo "<form action='../../pdf/generarPdf.php' method='post'>";
        echo "<input type='hidden' name='idPedido' value='{$pedido->getIdPedido()}'>";

        echo "<input type='hidden' name='infoHTML' value='" . htmlspecialchars($pedido->toHTML()) . "'>";
        foreach ($lineasPedido as $index => $lineaPedido) {
            echo "<input type='hidden' name='infoHTMLLinea{$index}' value='" . htmlspecialchars($lineaPedido->toHTML($link)) . "'>";
        }
        echo "<button type='submit'>Generar PDF</button>";
        echo "</form>";
    } else {
        echo "Error: No se pudo obtener la dirección de entrega del cliente";
    }
}
