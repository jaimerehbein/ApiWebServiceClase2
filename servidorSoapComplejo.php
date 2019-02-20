<?php

require_once 'lib/nusoap.php';

$namespace = "http://www.educacionit.com.ar/servicioAvanzado";

function agregarStock($ladrillo) {
    return "Nos falta el tipo complejo para la clase 4";
}


$server = new soap_server();
$server->configureWSDL("servicioAvanzado", $namespace);

$tipoComplejo = array(
    "tipo" => array("name" => "tipo", "type" => "xsd:string"),
    "tabla" => array("name" => "tabla", "type" => "xsd:int"),
    "canto" => array("name" => "canto", "type" => "xsd:int"),
    "testa" => array("name" => "testa", "type" => "xsd:int")
);

$server->wsdl->addComplexType('Ladrillo', 'complexType',
            'struct','all','', $tipoComplejo);

$server->register('agregarStock',
    array("ladrillo" => "tns:Ladrillo"),
    array("return" => "xsd:string"),
    $namespace,
    false,
    "rpc",
    "encoded",
    "Este servicio es para aprender complex type"
);

if (!isset( $HTTP_RAW_POST_DATA )) {
    $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
}

$server->service($HTTP_RAW_POST_DATA);

?>