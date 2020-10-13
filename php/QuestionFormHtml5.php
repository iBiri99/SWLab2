<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
  <script src="../js/ValidateFieldsQuestion.js"></script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      <form id='fquestion' name='fquestion' action=’AddQuestion.php’>
        <label for="lCorreo" id="lCorreo">Correo electronico*:</label>
        <input type="text" id="correo" name="correo" size="35" required pattern="([a-z]+[0-9]{3}(@ikasle.ehu.)(eus|es))|([a-z]+([\.-]{1}[a-z]+)?(@ehu.)(eus|es))"><br>

        <label for="lEnun" id="lEnun">Enunciado de la pregunta*:</label>
        <input type="text" id="enunciado" name="enunciado" size="100" required minlength="10"><br>

        <label for="lCorrec" id="lCorrec">Respuesta correcta*:</label>
        <input type="text" id="correcta" name="correcta" size="100" required><br>

        <label for="lIncor1" id="lIncor1">Respuesta incorrecta 1*:</label>
        <input type="text" id="inc1" name="inc1" size="100" required><br>

        <label for="lIncor2" id="lIncor1">Respuesta incorrecta 2*:</label>
        <input type="text" id="inc2" name="inc2" size="100" required><br>

        <label for="lIncor3" id="lIncor3">Respuesta incorrecta 3*:</label>
        <input type="text" id="inc3" name="inc3" size="100" required><br>

        <label for="lComplej" id="lComplej">Complejidad*:</label>
        <select required id="complej">
          <option value="1">Baja</option>
          <option value="2">Media</option>
          <option value="3">Alta</option>
        </select><br><br>
        
        <label for="ltema" id="lTema">Tema de la pregunta*:</label>
        <input type="text" id="tema" name="tema" required><br><br>
        <input type="file" id="img" name="imagen" accept=".jpeg, .jpg, .png"><br>
        
        <input type="submit" id="submit" value="Enviar"><br>
        <output id="list"></output><br>
      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
<script>
  document.getElementById('img').addEventListener('change', mostrarImagen, false);
</script>

</html>