<!DOCTYPE html>
<html>

<body>
 
        <?php
            $questionsFile = '../xml/UserCounter.xml';
            if (file_exists($questionsFile)) {
                    $xml = simplexml_load_file($questionsFile);
                }
            if ($xml) {
                    $counter=$xml->xpath('/cantidad');
                    echo "Nº de usuarios conectados ".$counter[0]->numero;
                }
           
            
        ?>
</body>
</html>

<?php
   
?>