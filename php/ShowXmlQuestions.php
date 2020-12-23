<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
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
    <?php
  if(isset($_GET['mail'])){
   $correoaqui=$_GET['mail'];
  include '../php/Menus.php';
 }else{
     echo 'No tienes permiso para estar aqui';
     include '../php/Menus.php';
     die();
 } ?>
  <section class="main" id="s1">
    <table>   
        <tr>
            <th>Autor</th>
            <th>Enunciado</th>
            <th>Respuesta correcta</th>
        </tr>
        <?php
            $questionsFile = '../xml/Questions.xml';
            if(file_exists($questionsFile)){
                $xml = simplexml_load_file($questionsFile);
                foreach ($xml->children() as $assessmentItem){
                    echo "<tr><td>".$assessmentItem['author']."</td>
                    <td>".$assessmentItem->itemBody->p."</td>
                    <td>".$assessmentItem->correctResponse->response."</td></tr>";
                }
            }
            
        ?>
    </table> 
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<?php
   
?>