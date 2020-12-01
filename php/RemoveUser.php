<?php
session_start();

if (!isset($_SESSION['Autenticado']) || $_SESSION['Autenticado'] != 'SI') {
    header("Location: Layout.php");
    exit();
}
if ($_SESSION['Tipo'] != '3') {
    header("Location: Layout.php");
    exit();
}

$mysqli = mysqli_connect ("localhost", "root", "pass", "preguntas");
        if(!$mysqli){
          die("Hay algo raro que esta fallando con MySQL". mysql_connect_error());
        }
        
$usu=$_GET['usu'];
    
 $query="DELETE FROM usuarios WHERE email='".$usu."'";
mysqli_query($mysqli, $query);

 mysqli_close($mysqli); 
 $newURL="HandlingAccounts.php";
 header('Location: HandlingAccounts.php');

?>