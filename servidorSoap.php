<?php

require_once 'lib/nusoap.php';

$namespace = "http://www.educacionit.com.ar/servicioAprender";

function producirEcho($param) {
    return "Hola: $param";
}

function sumar($a, $b) {
    return $a + $b;
}

$server = new soap_server();
$server->configureWSDL("servicioAprender", $namespace);

$server->register('producirEcho',
    array("type" => "xsd:string"),
    array("return" => "xsd:string"),
    $namespace,
    false,
    "rpc",
    "encoded",
    "Este servicio es para dar los primeros pasos en soap"
);

$server->register('sumar', 
    array("a" => "xsd:int", "b" => "xsd:int"),
    array("return" => "xsd:int"),
    $namespace,
    false,
    "rpc",
    "encoded",
    "Este servicio es para sumar"
);


if (!isset( $HTTP_RAW_POST_DATA )) {
    $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
}

$server->service($HTTP_RAW_POST_DATA);

?>