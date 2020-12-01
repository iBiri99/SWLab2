<?php
session_start();

if (!isset($_SESSION['Autenticado']) || $_SESSION['Autenticado'] != 'SI') {
    header("Location: Layout.php");
    exit();
}
if ($_SESSION['Tipo'] != '3') {
    header("Location: Layout.php");
    exit();
}
include '../php/Menus.php';
?>


<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
        text-align: left;
    }
    th {
        background-color: grey;
        color: white;
    }
    td {
        background-color: white;
        color: black;
    }
  </style>
</head>

<body>
    <section class="main" id="s1">
        <h1>Gestion de usuarios.</h1>
        <div>
            <?php
            $link = mysqli_connect("localhost", "id14878982_root", "ContraRoot_99", "id14878982_quiz");
            $preguntas = mysqli_query($link, "select * from usuarios");
            echo  '<table style="margin-left: auto; margin-right: auto;" border=1 > <tr> <th> Nombre </th> <th> Correo </th> <th> Contraseña </th> <th> Tipo de usuario </th> <th> Estado </th> <th> Bloquear </th> <th> Eliminar </th> </tr>';
            while ($row = mysqli_fetch_array($preguntas)) {
                if ($row['tipo'] == '1') {
                    $tipo = "Alumno";
                } else if ($row['tipo'] == '2') {
                    $tipo = "Profesor";
                } else if ($row['tipo'] == '3') {
                    $tipo = "Administrador";
                }
                if ($row['Bloqueado'] == 0) {
                    $estado = "Activo";
                    $boton="Bloquear";
                } else {
                    $estado = "Bloqueado";
                    $boton="Desbloquear";
                }
                if ($row['tipo'] == '3') {
                    //No bloquear ni eliminar
                    echo '<tr><td>' . $row['nomApe'] . '</td> <td>' . $row['email'] . '</td> <td>' . $row['pass'] . '</td> <td>' . $tipo . '</td> <td>' . $estado . '</td>
                    <td> Me da que no  </td>
                    <td> Ni de coña </td>
                    </tr>';
                } else {
                    echo '<tr><td>' . $row['nomApe'] . '</td> <td>' . $row['email'] . '</td> <td>' . $row['pass'] . '</td> <td>' . $tipo . '</td> <td>' . $estado . '</td> 
                    <td> <button class="boton-3d" id="'.$row['email'].'" > '.$boton.' </button>  </td> 
                    <td> <button class="boton-3d" id="Eli'.$row['email'].'"> Eliminar usuario </button></td> 
                    </tr>
                    <script type="text/javascript">
                        document.getElementById("'.$row['email'].'").onclick = function () {
                            var opcion = confirm("¿Cambiar estado?");
                            if (opcion == true) {
                                location.href = "ChangeUserState.php?usu='.$row['email'].'&modo='.$row['Bloqueado'].'";
                                alert("Estado cambiado");
                            } 
                        };

                        document.getElementById("Eli'.$row['email'].'").onclick = function () {
                            var opcion = confirm("¿Eliminar usuario?");
                            if (opcion == true) {
                                location.href = "RemoveUser.php?usu='.$row['email'].'";
                                alert("Usuario correctamente eliminado");
                            } 
                        };
                     
                    </script>

                    ';

                    
                }
            }
            echo '</table>';
            $preguntas->close();
            mysqli_close($link);
            ?>
        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>