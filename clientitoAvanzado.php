
<?php

define('WSDL','http://localhost/servidorSoapComplejo.php?wsdl');

$client = new SoapClient(WSDL);
$metodos = $client->__getFunctions();

$inputParams = array(
        "tipo" => "maciso", 
        "tabla" => 18,
        "canto" => 9,
        "testa" => 4
);

$resp = $client->__call('agregarStock', $inputParams);
var_dump($resp);


?>