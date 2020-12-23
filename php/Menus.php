<div id='page-wrap'>
    <header class='main' id='h1'>

        <?php
        if (isset($_SESSION['Autenticado'])) {
            if ($_SESSION['Autenticado'] == 'SI') {
                $correo = $_SESSION['Correo'];
                echo $correo . '
                <img src="' . $_SESSION['Foto'] . '" width="50" height="50>
                <span class="right"><br><a href="LogOut.php">Logout</a></span> ';
            }
        } else {
            
            echo '
    <span class="right"><a href="SignUp.php">Registro</a></span>
    <span class="right"><a href="Login.php">Login</a></span>
    <span class="right"><a href="redirect.php">Inicio de sesion con Google.</a></span>
    ';
        }
        ?>


    </header>
    <nav class='main' id='n1' role='navigation'>

        <?php
        if (isset($_SESSION['Autenticado']) && $_SESSION['Autenticado'] == 'SI') {
            if ($_SESSION["Tipo"] == '3') {
                echo "
                <span><a href='Layout.php'>Inicio</a></span>
                <span><a href='Credits.php'>Creditos</a></span>
                <span><a href='HandlingAccounts.php'>Administración de usuarios.</a></span>
                ";
            } else
                echo "
  <span><a href='Layout.php'>Inicio</a></span>
  <span><a href='Credits.php'>Creditos</a></span>
  <span><a href='HandlingQuizesAjax.php'> Seccion de AJAX</a></span>
  ";
        } else {
            echo "
  <span><a href='Layout.php'>Inicio</a></span>
  <span><a href='Credits.php'>Creditos</a></span>
  ";
        }
        ?>
    </nav>