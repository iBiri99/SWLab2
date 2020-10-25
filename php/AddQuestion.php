<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  <?php
    //Esto va a realizar la insercción en la base de datos de la pregunta.
    //Primero cogeremos los valores del formulario via GET.

    $enunciado=$_GET["enunciado"];
    $correo=$_GET["correo"];
    $correcta=$_GET["correcta"];
    $incor1=$_GET["inc1"];
    $incor2=$_GET["inc2"];
    $incor3=$_GET["inc3"];
    $complejidad=$_GET["complej"];
    $tema=$_GET["tema"];

    //Ahora vamos a abrir una sesion con mysqli:
    $mysqli = mysqli_connect ("localhost", "id15223212_root", "", "id15223212_quiz");
    if(!$mysqli){
      die("Hay algo raro que esta fallando con MySQL". mysql_connect_error());
    }
    $sql="INSERT INTO preguntas(correo,enunciado,correcto,incor1,incor2,incor3,tema,complejidad) VALUES ('$correo','$enunciado','$correcta','$incor1','$incor2','$incor3','$tema','$complejidad')";
    //Ahora insertamos a la base de datos los datos de la pregunta
    if( mysqli_query($mysqli,$sql)){
        echo "
    <div>
      
      La pregunta ha sido añadida correctamente
    </div>" ;
    echo'<a href="ShowQuestions.php">Mostrar preguntas</a>';
    
    }else{
        echo ''.mysqli_error($mysqli).'';
    }

    //Ahora cerramos la conexion con la base de datos
    mysqli_close($mysqli);

  
  ?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
