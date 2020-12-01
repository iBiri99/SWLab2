<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <?php  
        $link = mysqli_connect("localhost", "id14878982_root", "ContraRoot_99", "id14878982_quiz");
        $preguntas = mysqli_query($link, "select * from PREGUNTAS");
        echo  '<table border=1> <tr> <th> CORREO </th> <th> ENUNCIADO </th> <th> RESPUESTA CORRECTA </th><th> RESPUESTA INCORRECTA 1 </th><th> RESPUESTA INCORRECTA 2 </th> <th> RESPUESTA INCORRECTA 3 </th>
        </tr>';
        while ($row = mysqli_fetch_array($preguntas)) {
          echo '<tr><td>' . $row['correo'] . '</td> <td>' . $row['enunciado'] . '</td> <td>' . $row['correcta'] . '</td> <td>' . $row['inc1'] . '</td> <td>' . $row['inc2'] .'</td> <td>' . $row['inc3'] . '</td> <td>' . $row['complej'] . '</td> <td>' . $row['name'] . '</td> <td>' . $row['iamgen'] .
          '</td></tr>';
          echo '</table>';
          $preguntas->close();
          mysqli_close($link);
        }
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
