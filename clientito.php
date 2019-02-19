
<?php

define('WSDL','http://localhost/servidorSoap.php?wsdl');

$client = new SoapClient(WSDL);
$metodos = $client->__getFunctions();

/*
echo $client->__call('producirEcho', 
    array("type" => "jorge"));
*/

$inputParams = array("a" => 22, "b" => 34);

echo $client->__call('sumar', $inputParams);

?>