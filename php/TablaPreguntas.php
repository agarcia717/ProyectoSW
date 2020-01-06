<!DOCTYPE html>
<html>
<head>
</head>
<body>
      <?php
        echo "<table align='center' border><tr><th>Autor</th><th>Enunciado</th><th>Respuesta Correcta</th>";
        if(!$xml = simplexml_load_file('../xml/Questions.xml')){
          echo "No se ha podido cargar el archivo XML.";
        } else {
            foreach ($xml->assessmentItem as $pregunta){    
              $atributos = $pregunta->attributes();        
              echo '<tr><td>'.$atributos[1].'</td>';
              echo '<td>'.$pregunta->itemBody->p.'</td>';
              echo '<td>'.$pregunta->correctResponse->value.'</td></tr>';              
            }
          }
          echo "</table>";
    ?> 
</body>
</html> 