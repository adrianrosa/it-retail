<?php 
include_once('conexion.php');

class Usuario
{
    private $conexion;
    
    public function __construct(){
        $this->conexion = Conexion::obtenerInstancia();
    }
    
    public function iniciarSesionUsuario($usuario){
        $query = "SELECT U.*, C.* FROM Usuario as U, Cliente as C WHERE U.Email = '" . $usuario["Email"] . "' AND U.Password = '". $usuario["Password"] ."' AND U.IdUsuario = C.Usuario ;";
        $result = $this->conexion->query($query);
        return $result->fetch_assoc();
    }
    
    public function iniciarSesionUsuarioAdministrador($usuario){    
        $query = "SELECT * FROM Usuario WHERE Email='".$usuario["Email"]."' AND Password='".$usuario["Password"]."' AND EsAdministrador = 1;";
        $result = $this->conexion->query($query);
        return $result->fetch_assoc();
    }
    
    public function obtenerUsuario($idUsuario){
        $id = (int) $this->conexion->real_escape_string($idUsuario);
        $query = "SELECT U.*, C.*, L.Nombre as NombreLoc FROM Usuario as U, Cliente as C, Localidad as L WHERE U.IdUsuario = " . $id . " AND C.Usuario = U.IdUsuario AND L.IdLocalidad = C.Localidad;";
        $result = $this->conexion->query($query);
        return $result->fetch_assoc();
    }
    
}

?>