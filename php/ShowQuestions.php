<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
<?php 
  if(isset($_GET['mail'])){
   $correoaqui=$_GET['mail'];
  include '../php/Menus.php';
 }else{
  echo 'No tienes permiso para estar aqui';
  include '../php/Menus.php';
  die();
}  ?>
  <section class="main" id="s1">
    <div>
      <?php  
        $link = mysqli_connect("localhost", "", "", "id14878982_quiz");
        $preguntas = mysqli_query($link, "select * from preguntas");
        echo  '<table border=1> <tr> <th> CORREO </th> <th> ENUNCIADO </th> <th> RESPUESTA CORRECTA </th><th> RESPUESTA INCORRECTA 1 </th><th> RESPUESTA INCORRECTA 2 </th> <th> RESPUESTA INCORRECTA 3 </th>
        <th> TEMA </th><th> COMPLEJIDAD </th>
        </tr>';
        while ($row = mysqli_fetch_array($preguntas)) {
          echo '<tr><td>' . $row['correo'] . '</td> <td>' . $row['enunciado'] . '</td> <td>' . $row['correcto'] . '</td> <td>' . $row['incor1'] . '</td> <td>' . $row['incor2'] .'</td> <td>' . $row['incor3'] . '</td> <td>' . $row['tema'] . '</td> <td>' . $row['complejidad'] . 
          '</td></tr>';
        }
        echo '</table>';
        $preguntas->close();
        mysqli_close($link);
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
