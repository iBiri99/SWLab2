<!DOCTYPE html>
<html>
<body>
    <?php
    $correo=$_POST['mail'];
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    $soapclient = new nusoap_client ( 'http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl',true);
    $result = $soapclient->call('comprobar', array('x'=>$correo));
    if($result=='SI'){
        echo "El usuario es VIP.";
    }else{
        echo "El usuario no es VIP.";
    }
    ?>
</body>
</html>