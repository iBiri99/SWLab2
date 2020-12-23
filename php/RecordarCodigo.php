<?php
session_start();
if (isset($_SESSION['codigo']) &&  isset($_SESSION['correo']) && isset($_GET['email'])) {
    // Ha accedido desde el correo

} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Significa que estamos rellenando el formulario.
    } else {
        echo ("<script> 
        alert('No tienes permiso para estar aqui.');
        document.location.href = 'Login.php';
        </script>");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php

    include '../html/Head.html';
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <h2>Para poder recordar la contraseña necesitamos los siguiente campos:</h2><br>
        <div>
            <form name="login" action="RecordarCodigo.php" method="POST">
                Necesitamos tu correo electronico para poder recuperar la contraseña: <br> <br>
                Email:* <input type="text" id="email" name="email" required value="<?php echo  '' . $_SESSION['correo'] . '';   ?>"><br><br>

                Codigo recibido:* <input type="text" id="codi" name="codi" required><br><br>

                Contraseña nueva:* <input type="password" id="pass" name="pass" required><br><br>
                <div id="SOAPPASS"></div><br>
                Repetir contraseña:* <input type="password" id="pass2" name="pass2" required><br><br>

                <button type="submit" class="boton-3d" id="botonEnviar" disabled>Recuperar contraseña</button><br>
            </form>
        </div>

        <?php
        if (isset($_POST['pass'])) {
            // Ha respondido correctamente.;
            if (!strcmp($_POST['email'], $_SESSION['correo']) && !strcmp($_POST['codi'], $_SESSION['codigo'])) { //Ha cumplido las condiciones del codigo y correo
                //Ahora vamos a abrir una sesion con mysqli:
                $mysqli = mysqli_connect("localhost", "id14878982_root", "ContraRoot_99", "id14878982_quiz");
                if (!$mysqli) {
                    die("Hay algo raro que esta fallando con MySQL" . mysql_connect_error());
                }

                if(strcmp($_POST['pass'],$_POST['pass2'])){
                    echo ("<script> 
                    alert('Las contraseñas tienen que ser iguales.');
                    </script>");
                }else{
                    //Todo correcto, actualizar la contraseña.
                    $pass=$_POST['pass'];
                    $salt = '(|0.#f6cQn&';
                    $encriptPpass = md5($salt . md5($pass . $salt));

                    $query="UPDATE usuarios SET pass='".$encriptPpass."' WHERE email='".$_SESSION['correo']."'";
                    $usuarios = mysqli_query($mysqli, $query);
                    $_SESSION['codigo']=''; //Por si las moscas.
                    echo ("<script> 
                    alert('El cambio de contraseña se ha realizado correctamente, redirigiendo a inicio de sesión.');
                    document.location.href = 'Login.php';
                    </script>");
                }



                //Ahora cerramos la conexion con la base de datos
                mysqli_close($mysqli);
            } else {
                echo ("<script> 
                alert('Alguno de los datos insertados no son correctos.');
                </script>");
            }
        }





        ?>
    </section>
    <?php include '../html/Footer.html' ?>

</body>

</html>

<script>
    XMLHttpRequestPass = new XMLHttpRequest();
    XMLHttpRequestPass.onreadystatechange = function() {
        if (XMLHttpRequestPass.readyState == 4) {
            var obj = document.getElementById('SOAPPASS');
            obj.innerHTML = XMLHttpRequestPass.responseText;
            if (XMLHttpRequestPass.responseText.includes("INVALIDA")) {
                $('#botonEnviar').prop("disabled", true);
            } else {
                $('#botonEnviar').prop("disabled", false);
            }
        }
    }



    $("#pass").focusout(function() {
        var data = new FormData();
        pass = $('#pass').val();
        data.append('pass', pass);
        XMLHttpRequestPass.open("POST", 'VerifyPassWS.php', true);
        XMLHttpRequestPass.send(data);
    });
</script>