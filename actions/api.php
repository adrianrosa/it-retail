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

    $request = new Request();
    $action = $request->action;

    switch($action){
        case "listar-destacados":
            listarDestacados($request);
        break;
        default:
            sendResponse(array(
                "error" => true,
                "mensaje" => "Request mal formado"
            ));
        break;
    }

?>