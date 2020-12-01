<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
    <?php include '../php/Menus.php' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <section class="main" id="s1">
    <h2>¡Regístrate!</h2><br>
    <div>
        <form name="Registrar" action="SignUp.php" method="POST">
            Tipo usuario:* <input type="radio" id="alumno" name="tipo" value="1" checked>
            <label for="alumno">Alumno</label>
            <input type="radio" id="profesor" name="tipo" value="2">
            <label for="profesor">Profesor</label>
            <br><br>
            Email:* <input type="text" id="email" name="email"><br><br>
            <div id="SOAP"></div><br>
            Nombre y Apellidos:* <input type="text" id="nomApe" name="nomApe"><br><br>
            Password:* <input type="password" id="pass" name="pass"><br><br>
            <div id="SOAPPASS"></div><br>
            Repetir password:* <input type="password" id="passR" name="passR"><br><br>

            <button type="submit" class= "boton-3d" id="botonEnviar">Registrar</button>
            <input type="reset" value="¡Borrar!"class="boton-3d"><br>
        </form>
    </div>

    <?php
    if(isset($_POST['email'])){
        $email=$_POST['email'];
        $nomApe=$_POST['nomApe'];
        $pass=$_POST['pass'];
        $passR=$_POST['passR'];
        $tipo=$_POST['tipo'];
        $salt = '(|0.#f6cQn&';
        $encriptPpass = md5($salt . md5($pass . $salt));
        
        //Ahora vamos a abrir una sesion con mysqli:
        $mysqli = mysqli_connect("localhost", "id14878982_root", "ContraRoot_99", "id14878982_quiz");
        if(!$mysqli){
          die("Hay algo raro que esta fallando con MySQL". mysql_connect_error());
        }

        $usuarios = mysqli_query($mysqli,"select * from usuarios where email ='$email'");
        $cont = mysqli_num_rows($usuarios); 
        $error = validar($email, $nomApe, $pass, $passR);

        if($error == ''){
            if($cont == 0){
                $sql="INSERT INTO usuarios(email,nomApe,pass,tipo,Bloqueado) VALUES ('$email','$nomApe','$encriptPpass', '$tipo','0')";
                //Ahora insertamos a la base de datos los datos de la pregunta
                if(mysqli_query($mysqli,$sql)){        
                    echo("<script> 
                        alert('Usuario correctamente registrado');
                        document.location.href = 'Login.php';
                        </script>");
                } else {
                    echo ''.mysqli_error($mysqli).'';
                }
            } else {
                echo "
                    <a>
                        El usuario $email ya estaba registrado
                    </a>" ;  
            }
        } else {
            echo "
                <a>
                    $error
                </a>" ;   
        }
    //Ahora cerramos la conexion con la base de datos
    mysqli_close($mysqli); 
    }

   //validacion
   function validar($email, $nomApe, $pass, $passR){
        $error = '';
        if($email == '' && $nomApe == '' && $pass == '' && $passR == ''){
            $error ='Rellena todos los campos';
        } else if($email == ''){
            $error ='Es obligatorio introducir una dirección de correo';
        } else if(!preg_match("/^[a-z]+[0-9]{3}(@ikasle.ehu.)(eus|es)$/",$email) && (!preg_match("/^[a-z]+([\.-]{1}[a-z]+)?(@ehu.)(eus|es)$/",$email))){
            $error = 'La dirección de correo introducida no es válida';
        } else if(str_word_count($nomApe, 0) < 2){
            $error = 'Introduce nombre y apellido completos';
        } else if(strcmp($pass, $passR)){
            $error = 'Las contraseñas no coinciden';
        } else if(strlen($pass) < 6){
            $error = 'La contraseña debe tener al menos 6 carácteres';
        }
        return $error;
    }
   
    ?>
    </section>
    <?php include '../html/Footer.html' ?>

</body>
</html>
<script>

$(document).ready(function () {
    $('#botonEnviar').prop("disabled",true);
    
    XMLHttpRequestCorreo = new XMLHttpRequest();
    XMLHttpRequestCorreo.onreadystatechange = function () {
        if (XMLHttpRequestCorreo.readyState == 4) {
            var obj = document.getElementById('SOAP');
            obj.innerHTML = XMLHttpRequestCorreo.responseText;
            if(XMLHttpRequestCorreo.responseText.includes("El usuario es VIP.")){
                $('#botonEnviar').prop("disabled",false);
            }else{
                $('#botonEnviar').prop("disabled",true);    
            }
        }
    }

    XMLHttpRequestPass = new XMLHttpRequest();
    XMLHttpRequestPass.onreadystatechange = function () {
        if (XMLHttpRequestPass.readyState == 4) {
            var obj = document.getElementById('SOAPPASS');
            obj.innerHTML = XMLHttpRequestPass.responseText;
            if(XMLHttpRequestPass.responseText.includes("INVALIDA")){
                $('#botonEnviar').prop("disabled",true);
            }else{
                $('#botonEnviar').prop("disabled",false);    
            }
        }
    }




    $("#email").focusout(function () {
        var obj = document.getElementById('SOAP');
        obj.innerHTML = "<img src='../images/espera.gif'>";
        var data = new FormData();
        mail=$('#email').val();
        data.append('mail', mail);
        XMLHttpRequestCorreo.open("POST", 'ClientVerifyEnrollment.php', true);
        XMLHttpRequestCorreo.send(data);
    });

    $("#pass").focusout(function () {
        var data = new FormData();
        pass=$('#pass').val();
        data.append('pass', pass);
        XMLHttpRequestPass.open("POST", 'VerifyPassWS.php', true);
        XMLHttpRequestPass.send(data);
    });
});

</script>