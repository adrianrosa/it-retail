<?php
    require("../utils/request.php");

    function sendResponse($response){
        echo json_encode($response);
    }

    function listarDestacados($request){
        require("../dashboard/models/producto.php");
        $p = new Producto();
        if($productos = $p->obtenerTodosLosDestacados()){
            sendResponse(array(
                "error" => false,
                "mensaje" => "",
                "data" => $productos
            ));
        } else {
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error al obtener los productos destacados"
            ));
        }
    }

    function listarCategorias($request){
        require("../dashboard/models/categoria.php");
        $c = new Categoria();
        if($categorias = $c->obtenerTodasLasCategorias()){
            sendResponse(array(
                "error" => false,
                "mensaje" => "",
                "data" => $categorias
            ));
        } else {
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error al obtener las categorías"
            ));
        }
    }

    function listarProductosPorCategoria($request){
        require("../dashboard/models/producto.php");
        $p = new Producto();
        if($productos = $p->obtenerProductosPorCategoria($request->id)){
            sendResponse(array(
                "error" => false,
                "mensaje" => "",
                "data" => $productos
            ));
        } else {
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error al obtener los productos por categoría"
            ));
        }
    }

    function listarSliders($request){
        require("../dashboard/models/slider.php");
        $s = new Slider();
        if($sliders = $s->obtenerTodosLosSliders()){
            sendResponse(array(
                "error" => false,
                "mensaje" => "",
                "data" => $sliders
            ));
        } else {
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error al obtener los sliders"
            ));
        }
    }

    function listarCarrito($request){
        require("../models/carrito.php");
        $carrito = $_SESSION['objcarrito'];
        if($items = $carrito->imprimeCarrito()){
            sendResponse(array(
                "error" => false,
                "mensaje" => "",
                "data" => $items
            ));
        } else {
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error al obtener los ítems del carrito"
            ));
        }
    }

    function agregarProductoCarrito($request){
        require("../models/carrito.php");
        $carrito = $_SESSION['objcarrito'];
        $carrito->introduceProducto($request->id, $request->nombre, $request->precio, $request->cantidad); 
    }

    $request = new Request();
    $action = $request->action;

    switch($action){
        case "listar-destacados":
            listarDestacados($request);
        break;
        case "listar-categorias":
            listarCategorias($request);
        break;
        case "listar-productos-por-categoria":
            listarProductosPorCategoria($request);
        break;
        case "listar-sliders":
            listarSliders($request);
        break;
        case "listar-carrito":
            listarCarrito($request);
        break;
        case "agregar-carrito":
            agregarProductoCarrito($request);
        break;
        default:
            sendResponse(array(
                "error" => true,
                "mensaje" => "Request mal formado"
            ));
        break;
    }

?>