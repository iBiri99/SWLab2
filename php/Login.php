<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <?php

    include '../html/Head.html';

    ?>
</head>

<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <h2>¡Iniciar sesión!</h2><br>
        <div>
            <form name="login" action="Login.php" method="POST">

                Email:* <input type="text" id="email" name="email" required><br><br>
                Password:* <input type="password" id="pass" name="pass" required><br><br>
                <a href="Recordar.php">Recordar Contraseña.</a> <br> <br>
                <button type="submit" class="boton-3d">Iniciar sesion</button><br>
            </form>
        </div>

        <?php
        if (isset($_POST['email']) && strlen($_POST['email']) != 0) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            //Ahora vamos a abrir una sesion con mysqli:
            $mysqli = mysqli_connect("localhost", "id14878982_root", "ContraRoot_99", "id14878982_quiz");
            if (!$mysqli) {
                die("Hay algo raro que esta fallando con MySQL" . mysql_connect_error());
            }

            $result = mysqli_query($mysqli, "select * from usuarios where email ='$email' LIMIT 1");

            $cont = mysqli_num_rows($result);

            if ($cont == 1) {
                //El usuario existe, comprobar contraseña
                $usuario = $result->fetch_assoc();
                $mail = $usuario["email"];
                $salt = '(|0.#f6cQn&';
                $encriptPass = md5($salt . md5($pass . $salt));
                if (strcmp($encriptPass, $usuario['pass'])) {
                    echo ("
                La contraseña no es correcta");
                } else if ($usuario['Bloqueado'] == 1) {
                    echo ("
                El usuario esta bloqueado");
                } else {
                    $correoaqui = $mail;

                    $_SESSION["Autenticado"] = "SI";
                    $_SESSION["Correo"] = $mail;
                    $_SESSION["Tipo"] = $usuario["tipo"];
                    if ($usuario["RutaFoto"] == NULL) {
                        $_SESSION["Foto"] = "/Trabajo complementario/images/anonimo.jpg";
                    } else {
                        $_SESSION["Foto"] = $usuario["RutaFoto"];
                    }

                    echo (' 
                <script type="text/javascript">
                    XMLHttpRequestObjectLogIn = new XMLHttpRequest();
                    XMLHttpRequestObjectLogIn.open("POST", "IncreaseGlobalCounter.php", true);
                    XMLHttpRequestObjectLogIn.send(null);
                 </script>
            
                <a>
                    Bienvenido de vuelta! El inicio de sesión ha sido existoso.<br>
                    <a href="Layout.php?mail=' . $mail . '">Continuar<a/>
                </a>');
                }
            } else {
                //El usuario no existe
                echo "
                <a>
                    El usuario no esta registrado.
                </a>";
            }

            //Ahora cerramos la conexion con la base de datos
            mysqli_close($mysqli);
        }

        ?>
    </section>
    <?php include '../html/Footer.html' ?>

</body>

</html>