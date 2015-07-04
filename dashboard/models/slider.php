<?php 
include_once('conexion.php');

class Slider
{
    private $conexion;
    
    public function __construct(){
        $this->conexion = Conexion::obtenerInstancia();
    }
    
    public function obtenerTodosLosSliders(){
        $query = "SELECT S.*, I.Path, I.FileName, I.IdImagen FROM Slider as S, Imagen as I WHERE S.Imagen = I.IdImagen;";
        $sliders = array();
        if( $result = $this->conexion->query($query) ){
            while( $fila = $result->fetch_assoc() ){
                $sliders[] = $fila;
            }
            $result->free();
        }
        return $sliders;
    }
    
    public function obtenerSlider($idSlider){
        $id = (int) $this->conexion->real_escape_string($idSlider);
        $query = "SELECT S.*, I.Path, I.FileName, I.IdImagen FROM Slider as S, Imagen as I WHERE S.Imagen = I.IdImagen AND IdSlider =" . $id;
        $result = $this->conexion->query($query);
        return $result->fetch_assoc();
    }
                                                        
    public function crearSlider($slider){
        $titulo = $this->conexion->real_escape_string($slider['TituloImagen']);
        $orden = $this->conexion->real_escape_string($slider['OrdenImagen']);
        $imagen = (int) $this->conexion->real_escape_string($slider['IdImagen']);
        $query = "INSERT INTO Slider VALUES( DEFAULT, '$titulo', $orden, $imagen);";
        if( $this->conexion->query($query) ){
            $slider['IdSlider'] = $this->conexion->insert_id;
            return $slider;
        }
        return false;
    }
                                                        
    public function actualizarSlider($slider){
        $id = (int) $this->conexion->real_escape_string($slider['IdSlider']);
        $titulo = $this->conexion->real_escape_string($slider['TituloImagen']);
        $orden = $this->conexion->real_escape_string($slider['OrdenImagen']);
        $query = "";
        if( !empty($slider["IdImagen"]) ){
            $imagen = (int) $this->conexion->real_escape_string($slider['IdImagen']);
            $query = "UPDATE Slider SET TituloImagen = '".$titulo."', OrdenImagen = ".$orden.", Imagen = ".$imagen." WHERE IdSlider = ".$id;
        }
        else{
            $query = "UPDATE Slider SET TituloImagen = '".$titulo."', OrdenImagen = ".$orden." WHERE IdSlider = ".$id;
        }
        return $this->conexion->query($query);
    }
    
    public function eliminarSlider($idSlider){
        $id = (int) $this->conexion->real_escape_string($idSlider);
        $query = "DELETE FROM Slider WHERE IdSlider = ".$id;
        return $this->conexion->query($query);
    }
}
?>