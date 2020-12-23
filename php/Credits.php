<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html' ?>
  <link rel="stylesheet" href="../styles/DosCuadros.css">
</head>

<body>
  <?php
 include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div id="header">
      <h2>Autores:</h2>
    </div>
    <div id="container">
      <div id="first">
      <br/>
      <img src="../images/Yara.png" alt="Italian Trulli"><br/>
        Nombre: Yara Diaz de Cerio<br/>
        Especialidad cursada: Software.<br/>
        Correo electronico: ydiazdecerio001@ikasle.ehu.eus<br>
      </div>
      <div id="second">
      <br/>
      <img src="../images/JM.png" alt="Italian Trulli"><br/>
        Nombre: José María Irizar<br/>
        Especialidad cursada: Ingenieria de Computadores.<br/>
        Correo electronico: jirizar009@ikasle.ehu.eus<br>
      </div>
      <div id="clear"></div>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>