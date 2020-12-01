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
                    $counter[0]->numero = $counter[0]->numero+1;
                    $xml->asXML('../xml/UserCounter.xml');
                }
           
            
        ?>
</body>
</html>

<?php
   
?>