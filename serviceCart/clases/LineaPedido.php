<?php

class LineaPedido
{
    private $idPedido;
    private $nlinea;
    private $idProducto;
    private $cantidad;

    function __construct($idPedido, $nlinea, $idProducto, $cantidad)
    {
        $this->idPedido = $idPedido;
        $this->nlinea = $nlinea;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
    }

    function insertarLineaPedido($link)
    {
        try {
            $query = "INSERT INTO lineaspedidos (idPedido, nlinea, idProducto, cantidad) VALUES (:idPedido, :nlinea, :idProducto, :cantidad)";
            $result = $link->prepare($query);
            $result->bindParam(':idPedido', $this->idPedido);
            $result->bindParam(':nlinea', $this->nlinea);
            $result->bindParam(':idProducto', $this->idProducto);
            $result->bindParam(':cantidad', $this->cantidad);
            return $result->execute();
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            die();
        }
    }

    function toHTML($link)
    {
        $html = "<p>Detalles de la línea de pedido:</p>";
        $html .= "<p>ID Pedido: {$this->idPedido}</p>";
        $html .= "<p>Número de Línea: {$this->nlinea}</p>";
        
        // Obtener información del producto
        $queryProducto = "SELECT nombre, precio FROM productos WHERE idProducto = :idProducto";
        $resultProducto = $link->prepare($queryProducto);
        $resultProducto->bindParam(':idProducto', $this->idProducto);
        $resultProducto->execute();

        if ($rowProducto = $resultProducto->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<p>Producto: {$rowProducto['nombre']}</p>";
            $html .= "<p>Cantidad: {$this->cantidad}</p>";
            $html .= "<p>Precio Unitario: {$rowProducto['precio']}</p>";
            $total = $this->cantidad * $rowProducto['precio'];
            $html .= "<p>Total: {$total}</p>";
        } else {
            $html .= "<p>Error: No se pudo obtener la información del producto</p>";
        }

        return $html;
    }
}
