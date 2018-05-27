<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use  \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';
require_once './BBDDaplicacion.php';



//prueba de Slim
$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});



//obtiene todos los usuarios
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

//obtiene el nombre del deporte y su respectiva foto
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


//obtener la lista de amigos de un usuario en concreto
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


//registrar usuario con todos los parametros marcados
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

//para crear un evento pasandole el idUsuario y el deporte
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



//comprobacion del login,si hay resultados,obtiene los datos de ese usuario
$app->get('/login/{email}/{password}', function (Request $request, Response $response){
    $db = new BBDDaplicacion();

    $email = $request-> getAttribute("email");
    $password = $request -> getAttribute("password");


    if ($db->ComprobarLogin($email, $password)) {
        $responseData['error'] = false;
        $responseData['user'] = $db->obtenerUsuarioEmail($email);
    } else {
        $responseData['error'] = true;
        $responseData['message'] = 'email inválido';
    }


});

$app->run();