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
        <h2>¡Recordar contraseña!</h2><br>
        <div>
            <form name="login" action="Recordar.php" method="POST">
                Necesitamos tu correo electronico para poder recuperar la contraseña: <br> <br>
                Email:* <input type="text" id="email" name="email" required><br><br>

                <button type="submit" class="boton-3d">Recuperar contraseña</button><br>
            </form>
        </div>

        <?php
        if (isset($_POST['email']) && strlen($_POST['email']) != 0) {
            //Ahora vamos a abrir una sesion con mysqli:
            $mysqli = mysqli_connect("localhost", "id14878982_root", "ContraRoot_99", "id14878982_quiz");
            if (!$mysqli) {
                die("Hay algo raro que esta fallando con MySQL" . mysql_connect_error());
            }

            $email = $_POST['email'];
            $asunto = "Recuperación de la cuenta";

            //Primero comprobaremos si el correo insertado esta registrado:
            $result = mysqli_query($mysqli, "select * from usuarios where email ='$email' LIMIT 1");

            $cont = mysqli_num_rows($result);

            if ($cont == 1) {
                //Generamo un código aleatorio

                $codigo = rand(10000, 99999);

                //Guardamos en variables de sesion los valores:

                $_SESSION['codigo'] = $codigo;
                $_SESSION['correo'] = $email;
                //$email="biribari99@gmail.com";
                $mensaje= "
                <html>
                <head>
                <title> Recuperación de la contraseña</title>
                </head>
                <body>
                Clica el siguiente link e inserta el siguiente código: ".$codigo."
                <br>
                <a href='http://lab0sistemasweb.000webhostapp.com/Trabajo%20complementario/php/RecordarCodigo.php?email=".$email."'> Clicka aqui </a>
                </body>
                ";

                $headers="MIME-Version: 1.0"."\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

                //Ahora procedemos a enviar el correo:

                mail($email,$asunto,$mensaje,$headers);

                echo 'El correo se ha enviado correctamente a la siguiente direccion: '.$email;
            } else {
                //El correo insertado no esta registrado
                echo 'El correo insertado no esta registrado o es erroneo.';
            }

            //Ahora cerramos la conexion con la base de datos
            mysqli_close($mysqli);
        }

        ?>
    </section>
    <?php include '../html/Footer.html' ?>

</body>

</html>