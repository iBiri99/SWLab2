<?php
session_start();

if(!isset($_SESSION['Autenticado']) || $_SESSION['Autenticado']!='SI'){
    header("Location: Layout.php");
    exit();
}
if ($_SESSION['Tipo'] == '3') {
    header("Location: Layout.php");
    exit();
}
include '../php/Menus.php';
?>


<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="../js/AddQuestionsAjax.js"></script>
    <script src="../js/ShowQuestionsAjax.js"></script>
    <script src="../js/CountQuestions.js"></script>
    <script src="../js/Nusuarios.js"></script>
</head>

<body>
    <section class="main" id="s1">
    

        <h2>¡Añade una nueva pregunta a nuestro formulario!</h2><br>
        <div id="cuantas"></div><br>
        <div id="nusuarios"></div><br>
        <div>   
            <form name="InsertarPregunta">
                <input type="hidden" id="mail" name="mail" value=<?php echo "" . $_SESSION["Correo"] . "" ?>>
                Inserta el correo electronico: <input type="text" id="correo" name="correo" value=<?php echo "" . $_SESSION["Correo"] . "" ?>><br><br>
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
                    <label for="dificil">Dificil</label> <br>
                </div>
                Inserte el tema: <input type="text" id="tema" name="tema"><br>

                <input type="file" id="img" name="imagen" accept=".jpeg, .jpg, .png"><br>
                <div id="botones">
                    <input type="button" value="Enviar mediante AJAX" onclick="EnviarPreguntas('<?php echo $correoaqui ?>',)">
                    <input type="button" value="Ver preguntas del XML"  id="VerPreguntas">
                    
                    <!-- onclick="return validar();" -->
                    <input type="reset" value="¡Borrar!" class="boton-3d"><br>
                    <output id="list"></output><br>
                </div>
            </form>
        </div>
        <div id="resultado">
    </div><br>

    </section>
    
    

    <?php include '../html/Footer.html' ?>
</body>
</html>