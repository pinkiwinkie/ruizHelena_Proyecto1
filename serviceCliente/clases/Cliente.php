<?php
class Cliente {
    private $dniCliente;
    private $nombre;
    private $direccion;
    private $email;
    private $pwd;
    private $administrador;

    function __construct($dni, $pwd="", $nombre="", $direccion="",$email="",$administrador=""){
        $this->dniCliente=$dni; 
        $this->pwd=$pwd;
        $this->nombre=$nombre;
        $this->direccion=$direccion;
        $this->email=$email;
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
            $query="INSERT INTO clientes VALUES (:dniCliente,:pwd,:nombre,:direccion,:email,:administrador)";
            $result=$link->prepare($query);
            $result->bindParam(':dniCliente',$this->dniCliente);
            $result->bindParam(':pwd',$this->pwd);
            $result->bindParam(':nombre',$this->nombre);
            $result->bindParam(':direccion',$this->direccion);
            $result->bindParam(':email',$this->email);
            $result->bindParam(':administrador',$this->administrador);
            $result->execute();
            return $result;
        } catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
			require "../views/messageError.php";
			die();
        }
    }

    public function validarUsuario($link) {
        try {
            $query = "SELECT * FROM clientes WHERE dniCliente = :dniCliente AND pwd = :pwd";
            $result = $link->prepare($query);
            $result->bindParam(':dniCliente', $this->dniCliente);
            $result->bindParam(':pwd', $this->pwd);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            require "../views/messageError.php";
            die();
        }
    }
}