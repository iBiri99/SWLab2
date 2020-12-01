<?php
     $pass=$_POST['pass'];
     require_once('../lib/nusoap.php');
     require_once('../lib/class.wsdlcache.php');
     $soapclient = new nusoap_client ( 'https://lab0sistemasweb.000webhostapp.com/Lab6/php/ClientVerifyPass.php?wsdl',true);
     $result = $soapclient->call('comprobar', array('pass'=>$pass,'ticket'=>'1010'));
     echo $result;
?>