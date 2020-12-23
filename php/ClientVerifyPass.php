<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$server = new soap_server;
$server->configureWSDL('comprobar','urn:soapdemo');

$server->register('comprobar',
array('pass'=>'xsd:string','ticket'=>'xsd:int'),
array('resul'=>'xsd:string'));

$server->service(file_get_contents("php://input"));

function comprobar($pass,$ticket){
    if($ticket==1010){
        $string = file_get_contents("../txt/toppasswords.txt");
        $string = explode("\n", $string); // \n is the character for a line break
        if(in_array($pass, $string)){
            return "INVALIDA";
        } else {
            return "VALIDA";
        }
    }else{
        return "SIN SERVICIO";
    }

}
?>