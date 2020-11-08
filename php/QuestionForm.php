<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/ValidateFieldsQuestion.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <h2>¡Añade una nueva pregunta a nuestro formulario!</h2><br>
    <div>
      <form id="InsertarPregunta" action="AddQuestion.php" method="get">
      Inserta el correo electronico: <input type="text" id="correo" name="correo"><br><br>
      Cual es el enunciado de la pregunta? <input type="text" id="enunciado" name="enunciado"><br><br>
      Respuesta correcta: <input type="text" id="correcta" name="correcta"><br><br>
      Respuesta incorrecta 1: <input type="text" id="inc1" name="inc1"><br><br>
      Respuesta incorrecta 2: <input type="text" id="inc2" name="inc2"><br><br>
      Respuesta incorrecta 3: <input type="text" id="inc3" name="inc3"><br><br>
      Complejidad de la pregunta: 
      <div id="botones">
                <br>
                <input type="radio" id="facil" name="complej" value="1" checked="checked">
                <label for="facil">Fácil</label>
                <input type="radio" id="medio" name="complej" value="2">
                <label for="medio">Medio</label>
                <input type="radio" id="dificil" name="complej" value="3">
                <label for="dificil">Dificil</label> <br><br>
      </div>
      Inserte el tema: <input type="text" id="tema"><br><br>
      <div id="botones">
      <button type="button" onclick="validar();" class="boton-3d">Guardar las preguntas</button>
      <input type="reset" value="¡Borrar!"class="boton-3d">
    </div>
      </form>
    </div>

  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
