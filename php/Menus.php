<div id='page-wrap'>
<header class='main' id='h1'>
  
  <?php
if (isset($correoaqui)){
  echo '
  '.$correoaqui.'
  <span class="right"><a href="LogOut.php">Logout</a></span>
  ';
}else{
  echo '
  <span class="right"><a href="SignUp.php">Registro</a></span>
  <span class="right"><a href="Login.php">Login</a></span>
  
  ';
}
  ?>


</header>
<nav class='main' id='n1' role='navigation'>
  
  <?php
if (isset($correoaqui)){
  echo "
  <span><a href='Layout.php?mail=".$correoaqui."'>Inicio</a></span>
  <span><a href='Credits.php?mail=".$correoaqui."'>Creditos</a></span>
  <span><a href='QuestionFormWithImage.php?mail=".$correoaqui."'> Insertar Pregunta</a></span>
  <span><a href='HandlingQuizesAjax.php?mail=".$correoaqui."'> Seccion de AJAX</a></span>
  <span><a href='ShowQuestions.php?mail=".$correoaqui."'> Ver pregunta</a></span>
  <span><a href='ShowXmlQuestions.php?mail=".$correoaqui."'> Ver preguntas XML</a></span>
  ";
}else{
  echo "
  <span><a href='Layout.php'>Inicio</a></span>
  <span><a href='Credits.php'>Creditos</a></span>
  ";
}
?>
</nav>


