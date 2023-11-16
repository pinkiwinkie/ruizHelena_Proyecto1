<?php
class Pedido {
    private static $contadorPedidos = 1;
    private $idPedido;
    private $fecha;
    private $dirEntrega;
    private $nTarjeta;
    private $fechaCaducidad;
    private $matriculaRepartidor;
    private $dniCliente;
    
    function __construct($fecha, $dirEntrega, $nTarjeta = null, $fechaCaducidad = null, $matriculaRepartidor = null, $dniCliente = null){
        $this->idPedido = self::$contadorPedidos++;
        $this->fecha = $fecha;
        $this->dirEntrega = $dirEntrega;
        $this->nTarjeta = $nTarjeta;
        $this->fechaCaducidad = $fechaCaducidad;
        $this->matriculaRepartidor = $matriculaRepartidor;
        $this->dniCliente = $dniCliente;
    }

    function getIdPedido() {
        return $this->idPedido;
    }

    function insertarPedido($link){
        try {
            $query = "INSERT INTO pedidos (idPedido, fecha, dirEntrega, nTarjeta, dniCliente) VALUES (:idPedido, :fecha, :dirEntrega, :nTarjeta, :dniCliente)";
            $result = $link->prepare($query);
            $result->bindParam(':idPedido', $this->idPedido);
            $result->bindParam(':fecha', $this->fecha);
            $result->bindParam(':dirEntrega', $this->dirEntrega);
            $result->bindParam(':nTarjeta', $this->nTarjeta);
            $result->bindParam(':dniCliente', $this->dniCliente);
            
            return $result->execute();
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            die();
        }
    }
    function toHTML() {
        $html = "<h2>Detalles del Pedido</h2><br/>";
        $html .= "<p>ID Pedido: {$this->idPedido}</p><br/>";
        $html .= "<p>Fecha: {$this->fecha}</p><br/>";
        $html .= "<p>Direccion de Entrega: {$this->dirEntrega}</p><br/>";
        $html .= "<p>Numero de Tarjeta: {$this->nTarjeta}</p><br/>";
        $html .= "<p>DNI del Cliente: {$this->dniCliente}</p><br/>";

        return $html;
    }
}