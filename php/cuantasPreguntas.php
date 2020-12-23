<!DOCTYPE html>
<html>
<body>
        <?php
            $questionsFile = '../xml/Questions.xml';
            $correo=$_POST['correo'];
            $cont=0;
            $conttotal=0;
            if(file_exists($questionsFile)){
                $xml = simplexml_load_file($questionsFile);
                foreach ($xml->children() as $assessmentItem){
                    $conttotal++;
                    if($correo==$assessmentItem['author']){
                        $cont=$cont+1;
                    }
                }
            }
            echo "Tu numero de preguntas es de: ".$cont."/".$conttotal;
            
        ?>
</body>
</html>

<?php
   
?>