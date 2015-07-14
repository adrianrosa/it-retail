<?php
    session_start('objcarrito');

    class Carrito { 
        var $num_productos; 
        var $array_id_prod; 
        var $array_nombre_prod; 
        var $array_precio_prod; 
        var $array_cantidad_prod;
        var $suma_cantidad;
        
        /*function carrito () { 
           $this->num_productos=0;
        }*/
        
        public function __construct(){
             $this->num_productos = 0;
             $this->suma_cantidad = 0;
        }

        function introduceProducto($id_prod, $nombre_prod, $precio_prod, $cantidad_prod){ 
            try{
                for ($i=0;$i<$this->num_productos;$i++){
                    if( $this->array_id_prod[$i] == $id_prod){
                        $this->array_cantidad_prod[$i]  = $this->array_cantidad_prod[$i] + $cantidad_prod;
                        return true;
                    }
                }
                $this->array_id_prod[$this->num_productos]=$id_prod; 
                $this->array_nombre_prod[$this->num_productos]=$nombre_prod; 
                $this->array_precio_prod[$this->num_productos]=$precio_prod; 
                $this->array_cantidad_prod[$this->num_productos]=$cantidad_prod; 
                $this->num_productos++;
                return true;
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
            return false;
        } 

        function imprimeCarrito(){ 
            $this->suma_cantidad = 0;
            $suma = 0; 
            $html = '<div class="carrito-compras">
                        <h3 class="titulo-carrito">
							<span class="glyphicon glyphicon-shopping-cart"></span>Carrito de compras
						</h3>
                        <table class="table carrito">
							<thead>
								<tr class="cabecera-carrito">
                                    <th class="hide">Id</th>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Precio</th>
                                    <th></th>
								</tr>
							</thead>
                            <tbody>';
            
            if( $this->num_productos == 0 ){
                $html = $html .  '<tr id="no-items">
				            <td>0 artíulos</td>
				          </tr>';
                $html = $html .  '<tr id="total-carrito" class="linea-carrito total">';      
                    $html = $html .  '<td>TOTAL</td>
                             <td></td>
                             <td id="importe-total"> $ 0.00 </td>';
                $html = $html .  '</tr>';
            } else {
                
                for ($i=0;$i<$this->num_productos;$i++){ 
                    if($this->array_id_prod[$i]!=0){
                        $this->suma_cantidad += $this->array_cantidad_prod[$i];
                        $html = $html .  '<tr class="linea-carrito linea">';
                            $html = $html .   "<td class='hide'>" . $this->array_id_prod[$i] . "</td>";
                            $html = $html .  "<td class='nombre-prod'>" . $this->array_nombre_prod[$i] . "</td>";  
                            $html = $html .  "<td>" . $this->array_cantidad_prod[$i] . "</td>"; 
                            $html = $html .  "<td class='importe'>$" . $this->array_precio_prod[$i] . "</td>";
                            $html = $html .  "<td><a href='#' class='eliminar-carrito' url='actions/api.php?action=eliminar-carrito&linea=$i'><span class='btn-eliminar glyphicon glyphicon-remove-circle'></span></a></td>"; 
                        $html = $html .  '</tr>'; 
                        $suma += ($this->array_precio_prod[$i] * $this->array_cantidad_prod[$i] ); 
                    } 
                } 
 
                $html = $html .  '<tr id="total-carrito" class="linea-carrito total">';      
                    $html = $html .  '<td>TOTAL</td>
                             <td>' . $this->suma_cantidad . '</td>
                             <td id="importe-total">$'. $suma .'</td>';
                $html = $html .  '</tr>';
                $html = $html .  '<tr class="ver-carrito"><td></td><td><a href="ver-carrito.php" class="btn btn-primary">Ver carrito</a></td><td></td></tr>';
                $html = $html .  '<tr class="confirmar-carrito"><td></td><td><a href="confirmar-carrito.php" class="btn btn-primary">Confirmar compra</a></td><td></td></tr>';
            }
            
            $html = $html .  '   </tbody>
				      </table>
					</div>';
            
            return $html;
        } 

        function eliminaProducto($linea){ 
            $this->array_id_prod[$linea]=0;
            return true;
        } 
    }
?>