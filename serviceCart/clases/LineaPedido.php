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
}
