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
$mysqli = mysqli_connect("localhost", "id14878982_root", "ContraRoot_99", "id14878982_quiz");
if(!$mysqli){
    die("Hay algo raro que esta fallando con MySQL". mysql_connect_error());
}
        
$usu=$_GET['usu'];
$modo=$_GET['modo'];

if($modo==0){
    
    $query="UPDATE usuarios SET bloqueado='1' WHERE email='".$usu."'";
    $usuarios = mysqli_query($mysqli, $query);
}else{
    $query="UPDATE usuarios SET bloqueado='0' WHERE email='".$usu."'";
    $usuarios = mysqli_query($mysqli, $query);
}
 mysqli_close($mysqli); 
 $newURL="HandlingAccounts.php";
 header('Location: '.$newURL);

?>