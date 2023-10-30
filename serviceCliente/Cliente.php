<?php
class Cliente {
    private $dniCliente;
    private $nombre;
    private $direccion;
    private $email;
    private $pwd;
    private $administrador;

    function __construct($dni, $nombre="", $direccion="",$email="",$pwd="",$administrador=""){
        $this->dniCliente=$dni;
        $this->nombre=$nombre;
        $this->direccion=$direccion;
        $this->email=$email;
        $this->pwd=$pwd;
        $this->administrador=$administrador;
    }

    static function getAll($link){
        try{
            $query = "SELECT * FROM clientes";
            $result=$link->prepare($query);
            $result->execute();
            return $result;
        } catch(PDOException $e){
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            require "../views/messageError.php";
            die();
        }
    }

    function search($link){
        try{
            $query="SELECT * FROM clientes WHERE dniCliente='$this->dniCliente'";
            $result=$link->prepare($query);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            require "../views/messageError.php";
            die();
        }
    }

    function insertCliente($link){
        try{
            $query="INSERT INTO clientes VALUES (:dniCliente,:nombre,:direccion,:email,:pwd,:administrador)";
            $result=$link->prepare($query);
            $result->bindParam(':dniCliente',$this->dniCliente);
            $result->bindParam(':nombre',$this->nombre);
            $result->bindParam(':direccion',$this->direccion);
            $result->bindParam(':email',$this->email);
            $result->bindParam(':pwd',$this->pwd);
            $result->bindParam(':administrador',$this->administrador);
            $result->execute();
            return $result;
        } catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
			require "../views/messageError.php";
			die();
        }
    }
}