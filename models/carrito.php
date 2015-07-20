<?php
    if(!isset($_SESSION)) 
    { 
       session_start('objcarrito'); 
    } 
    

    class Carrito { 
        var $num_productos; 
        var $array_id_prod; 
        var $array_nombre_prod; 
        var $array_precio_prod; 
        var $array_cantidad_prod;
        //var $suma_cantidad;
        var $array_img_prod;
        var $suma;
        
        /*function carrito () { 
           $this->num_productos=0;
        }*/
        
        public function __construct(){
             $this->num_productos = 0;
             //$this->suma_cantidad = 0;
        }
        
        function introduceProducto($itemCarrito){ 
            try{
                for ($i=0;$i<$this->num_productos;$i++){
                    if( $this->array_id_prod[$i] == $itemCarrito["id"]){
                        $this->array_cantidad_prod[$i]  = $this->array_cantidad_prod[$i] +  $itemCarrito["cantidad"];
                        return true;
                    }
                }
                $this->array_id_prod[$this->num_productos]=$itemCarrito["id"]; 
                $this->array_nombre_prod[$this->num_productos]=$itemCarrito["nombre"]; 
                $this->array_precio_prod[$this->num_productos]=$itemCarrito["precio"]; 
                $this->array_cantidad_prod[$this->num_productos]=$itemCarrito["cantidad"]; 
                $this->array_img_prod[$this->num_productos]=$itemCarrito["img"]; 
                $this->num_productos++;
                return true;
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
            return false;
        } 
        
        function imprimeCarrito(){ 
            //$this->suma_cantidad = 0;
            $this->suma = 0; 
            $html = "<h3 class='titulo-carrito'>
							<span class='glyphicon glyphicon-shopping-cart'></span>Carrito de compras
						</h3>";
            $html .= '<ol id="carrito">';
            
            $itemsCount = false;
            $contador= 0;
            for ($i=0;$i<$this->num_productos;$i++){ 
                    if($this->array_id_prod[$i]==0){
                        $contador++;
                    }
            }
            if($contador ==  $this->num_productos)
                $itemsCount = true;
            
            if( $this->num_productos == 0 ||  $itemsCount){
                $html .= '';
                $html .= '<li class="no-items">0 artículos </li><li id="total-carrito" class="linea-carrito-vacio total">Total: $ 0.00 </li>';
            } else {
                for ($i=0;$i<$this->num_productos;$i++){ 
                    if($this->array_id_prod[$i]!=0){
                        //$this->suma_cantidad += $this->array_cantidad_prod[$i];
                        $html .= "<li class='item'> <span class='id-producto hide'>".$this->array_id_prod[$i]."</span>";
                        $html .= "<a><img class='img-producto' src='". $this->array_img_prod[$i] ."' alt='img prod' /></a>";
                        $html .= "<a href='#' class='eliminar-carrito' url='actions/api.php?action=eliminar-carrito&linea=".$i."'><span class='btn-eliminar glyphicon glyphicon-remove-circle'></span></a>";
                        $html .= "
                                    <div class='detalles'>
                                        <p class='nombre'>".$this->array_nombre_prod[$i]."</p>
                                        <span class='precio' precio='".$this->array_precio_prod[$i]."' >$ ".$this->array_precio_prod[$i]." </span>
                                    </div><div class='cantidad'>".$this->array_cantidad_prod[$i]."</div></li><hr/>";
                        $this->suma += ($this->array_precio_prod[$i] * $this->array_cantidad_prod[$i] ); 
                    }
                }
                $html .= "<li id='importe-total'  class='linea-carrito total'>Total: $ ". $this->suma . "</li>";
                //$html = $html .  '<li class="ver-carrito"><a href="ver-carrito.php" class="btn btn-primary">Ver carrito</a></li>';
                $html = $html .  '<li class="confirmar-carrito"><a href="confirmar-carrito.php" class="btn btn-primary">Confirmar compra</a></li>';
            }      
            $html = $html .  '</ol>';
            return $html;
        } 
        
        function eliminaProducto($linea){ 
            $this->array_id_prod[$linea]=0;
            return true;
        } 
        
        function confirmarCarrito($carrito){
            return true;
        }
    }
?>