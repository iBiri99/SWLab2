<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
    <h2>¡Iniciar sesión!</h2><br>
    <div>
        <form name="login" action="Login.php" method="POST">

            Email:* <input type="text" id="email" name="email" required><br><br>
            Password:* <input type="password" id="pass" name="pass" required><br><br>

            <button type="submit" class= "boton-3d">Iniciar sesion</button><br>
        </form>
    </div>

    <?php
    if(isset($_POST['email'])&& strlen($_POST['email'])!=0){
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        
        //Ahora vamos a abrir una sesion con mysqli:
        $mysqli = mysqli_connect ("localhost", "", "", "");
        if(!$mysqli){
          die("Hay algo raro que esta fallando con MySQL". mysql_connect_error());
        }

        $result = mysqli_query($mysqli,"select * from usuarios where email ='$email' LIMIT 1");
        
        $cont = mysqli_num_rows($result); 

        if($cont == 1){
            //El usuario existe, comprobar contraseña
            $usuario = $result->fetch_assoc();
            $mail=$usuario["email"];
            if(strcmp($pass,$usuario['pass'])){
                echo ("
                'La contraseña no es correcta')");
            }else{
                $correoaqui=$mail;
                echo ('<a>
                Bienvenido de vuelta! El inicio de sesión ha sido existoso.<br>
                <a href="Layout.php?mail='.$mail.'">Continuar<a/>
            </a>');
            }
            

        } else {
            //El usuario no existe
            echo "
                <a>
                    El usuario $email no esta registrado.
                </a>" ;  
        }

    //Ahora cerramos la conexion con la base de datos
    mysqli_close($mysqli); 
    }
   
    ?>
    </section>
    <?php include '../html/Footer.html' ?>

</body>
</html>