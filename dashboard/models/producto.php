<?php 
include_once('conexion.php');

class Producto
{
    private $conexion;
    
    public function __construct(){
        $this->conexion = Conexion::obtenerInstancia();
    }
    
    public function obtenerTodosLosProductos(){
        $query = "SELECT P.*, C.NombreCategoria FROM Producto as P, Categoria as C WHERE P.CategoriaProducto = C.IdCategoria;";
        $productos = array();
        if( $result = $this->conexion->query($query) ){
            while( $fila = $result->fetch_assoc() ){
                $productos[] = $fila;
            }
            $result->free();
        }
        return $productos;
    }
    
    public function obtenerProducto($idProducto){
        $id = (int) $this->conexion->real_escape_string($idProducto);
        $query = "SELECT P.*, I.* FROM Producto as P, Imagen as I WHERE P.Imagen = I.IdImagen AND IdProducto =" . $idProducto;
        $result = $this->conexion->query($query);
        return $result->fetch_assoc();
    }
                                                        
    public function crearProducto($producto){
        $nombre = $this->conexion->real_escape_string($producto['NombreProducto']);
        $descripcionCorta = $this->conexion->real_escape_string($producto['DescripcionCortaProducto']);
        $descripcionLarga = $this->conexion->real_escape_string($producto['DescripcionLargaProducto']);
        $precio = (float) $this->conexion->real_escape_string($producto['PrecioProducto']);
        $cantidad = (int) $this->conexion->real_escape_string($producto['CantidadStockProducto']);
        $categoria = (int) $this->conexion->real_escape_string($producto['CategoriaProducto']);
        if($producto['EsDestacado'])
            $esDestacado = 1;
        else
            $esDestacado = 0;
        $imagen = (int) $this->conexion->real_escape_string($producto['IdImagen']);
        $query = "INSERT INTO Producto VALUES( DEFAULT, '$nombre', '$descripcionCorta', '$descripcionLarga', $precio, $cantidad, $categoria, $esDestacado, $imagen);";
        if( $this->conexion->query($query) ){
            $producto['IdProducto'] = $this->conexion->insert_id;
            return $producto;
        }
        return false;
    }
                                                        
    public function actualizarProducto($producto){
        $id = (int) $this->conexion->real_escape_string($producto['IdProducto']);
        $nombre = $this->conexion->real_escape_string($producto['NombreProducto']);
        $descripcionCorta = $this->conexion->real_escape_string($producto['DescripcionCortaProducto']);
        $descripcionLarga = $this->conexion->real_escape_string($producto['DescripcionLargaProducto']);
        $precio = (float) $this->conexion->real_escape_string($producto['PrecioProducto']);
        $cantidad = (int) $this->conexion->real_escape_string($producto['CantidadStockProducto']);
        $categoria = (int) $this->conexion->real_escape_string($producto['CategoriaProducto']);
        if($producto['EsDestacado'])
            $esDestacado = 1;
        else
            $esDestacado = 0;
        /*if( $producto['IdImagen'] != null){
            $imagen = (int) $this->conexion->real_escape_string($producto['IdImagen']);
            $query = "UPDATE Producto SET NombreProducto = '".$nombre."', DescripcionCortaProducto = '".$descripcionCorta."', DescripcionLargaProducto = ' ".$descripcionLarga."', PrecioProducto = ".$precio.", CantidadStockProducto = ".$cantidad.", CategoriaProducto = ".$categoria.", ProductoEsDestacado = ".$esDestacado.", UrlImagenProducto = '".$imagen."'  WHERE IdProducto = ".id;
        }
        else*/
            $query = "UPDATE Producto SET NombreProducto = '".$nombre."', DescripcionCortaProducto = '".$descripcionCorta."', DescripcionLargaProducto = ' ".$descripcionLarga."', PrecioProducto = ".$precio.", CantidadStockProducto = ".$cantidad.", CategoriaProducto = ".$categoria.", EsDestacado = ".$esDestacado."  WHERE IdProducto = ".$id;
        return $this->conexion->query($query);
    }
    
    public function eliminarProducto($idProducto){
        $id = (int) $this->conexion->real_escape_string($idProducto);
        $query = "DELETE FROM Producto WHERE IdProducto = ".$id;
        return $this->conexion->query($query);
    }
}
?>