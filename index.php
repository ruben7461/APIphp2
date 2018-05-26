<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use  \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';
require_once './BBDDaplicacion.php';


$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});



$app->get('/usuarios', function (Request $request, Response $response){
	$db = new BBDDaplicacion();
    return $response
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $db->ObtenerPersonas()
            ));

});

$app->get('/deportes', function (Request $request, Response $response){
    $db = new BBDDaplicacion();
    return $response
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $db->ObtenerDeportes()
            ));

});


$app->get('/obtenerAmigos/{idUsuario}', function (Request $request, Response $response){
    $db = new BBDDaplicacion();
    $idUsuario = $request->getAttribute('idUsuario');
    return $response
        ->withHeader('Content-type', 'application/json')
        ->getBody()
        ->write(
            json_encode(
                $db->obtenerAmigos($idUsuario)
            ));

});


$app->get('/registroUsuario/{correo}/{nombre}/{apellido}/{password}/{nacionalidad}', function (Request $request, Response $response) {

    $correo = $request->getAttribute('correo');;
    $nombre = $request->getAttribute('nombre');;
    $apellido = $request->getAttribute('apellido');;
    $pass = $request->getAttribute('password');;
    $nacionalidad = $request->getAttribute('nacionalidad');;
    $db = new BBDDaplicacion();
    if($db->insertarUsuario($correo, $nombre, $apellido, $pass, $nacionalidad)){
        $responseData['error'] = false;
        $responseData['mensage'] = 'usuario registrado correctamente';
    } else {
        $responseData['error'] = true;
        $responseData['message'] = 'no se ha podido registrar';
    }

    $response->getBody()->write(json_encode($responseData));

});

$app->get('/crearEvento/{idUsuario}/{deporte}', function (Request $request, Response $response){
    $db = new BBDDaplicacion();
    $idUsuario = $request->getAttribute('idUsuario');
    $deporte = $request->getAttribute('deporte');

               if( $db->insertarEvento($idUsuario,$deporte)){
                   $responseData['error'] = false;
                   $responseData['mensage'] = 'evento registrado correctamente';
               } else {
                   $responseData['error'] = true;
                   $responseData['mensage'] = 'no se ha podido registrar';
               }

     $response->getBody()->write(json_encode($responseData));


});

$app->run();