<?php

if ($_SERVER['REQUEST_METHOD']==='OPTIONS'){
    header('Access-Control-Allow-Origin: *');
    header ("Access-Control-Allow-Header: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: POST,GET,DELETE,PUT,PATCH,OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');

/*if (isset($_SERVER['HTTP_ORIGIN'])){
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Origin: $_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    header("Access-Control-Allow-Methods: POST,GET,DELETE,PUT,PATCH,OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}*/

    

    require_once("../config/conexion.php");
    require_once("../models/Socio.php");
    $socio = new Socios();

    $body = json_decode(file_get_contents("php://input"), true);
    
    switch($_GET["op"]){
        case 'GetSocio':
            $datos=$socio->get_socio_all();
            echo json_encode($datos);
        break;
        
        case 'GetUno':
            $datos=$socio->get_socio($body['id']);
            echo json_encode($datos);
        break;

        case 'insertsocio':
            $datos=$socio->insert_socio($body['nombre'],$body['razon_social'],$body['direccion'],$body['tipo_socio'],$body['contacto'],$body['email'],$body['fecha_creado'],$body['estado'],$body['telefono']);
            echo json_encode('Socio Agregado');
        break;

        case 'updatesocio':
            $datos=$socio->update_socio($body['id'],$body['nombre'],$body['razon_social'],$body['direccion'],$body['tipo_socio'],$body['contacto'],$body['email'],$body['fecha_creado'],$body['telefono']);
            echo json_encode('Socio Actualizado');
        break;

        case 'deletesocio':
            $datos=$socio->delete_socio($body['id']);
            echo json_encode('Socio Eliminado');
        break;

    }

    





?>