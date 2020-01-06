<!DOCTYPE html>
<html>
<head>
  <!--<?php include '../html/Head.html'?>-->
</head>
<body>
  <!--<?php include '../php/Menus.php' ?>-->
  <section class="main" id="s1">
    <div>
         <?php
         //Añadir preguntas a la BD
            if(isset($_REQUEST['dirCorreo'])){
                $regexMail="/((^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$)|^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$)/";
                $regexPreg="/^.{10,}$/";
                 if(preg_match($regexMail,$_REQUEST['dirCorreo'])){
                     if(preg_match($regexPreg,$_REQUEST['nombrePregunta'])){                      
                            include 'DbConfig.php';
                            //Creamos la conexion con la BD.
                            $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
                            if(!$mysqli)
                            {
                                die("Fallo al conectar a MySQL: " .mysqli_connect_error());
                            }
                            //Creamos la consulta que introducira los datos en el servidor
                            $email = $_REQUEST['dirCorreo'];
                            $enunciado = $_REQUEST['nombrePregunta'];
                            $respuestac = $_REQUEST['respuestaCorrecta'];
                            $respuestai1 = $_REQUEST['respuestaIncorrecta1'];
                            $respuestai2 = $_REQUEST['respuestaIncorrecta2'];
                            $respuestai3 = $_REQUEST['respuestaIncorrecta3'];
                            $complejidad = $_REQUEST['complejidad'];
                            $tema = $_REQUEST['temaPregunta'];
  
                            $image = $_FILES['file']['tmp_name'];
                            $contenido_imagen = base64_encode(file_get_contents($image));
                                                        
                            
                            $sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema, imagen) VALUES('$email', '$enunciado', '$respuestac', '$respuestai1', '$respuestai2', '$respuestai3', $complejidad, '$tema', '$contenido_imagen')";
                            if(!mysqli_query($mysqli,$sql))
                            {                              
                              die("Error: " .mysqli_error($mysqli));
                            }
                            echo "Registro añadido<br>";

                            mysqli_close($mysqli);

                            //Añadir preguntas a Questions.xml
                            if(!$xml = simplexml_load_file('../xml/Questions.xml')){
                              echo "No se ha podido insertar la pregunta en el XML.";
                            } else {
                                $pregunta = $xml->addChild('assessmentItem');
                                $pregunta->addAttribute('subject',$tema);
                                $pregunta->addAttribute('author',$email);
                                $enunciado_ = $pregunta->addChild('itemBody');
                                $p = $enunciado_->addChild('p',$enunciado);
                                $correcta = $pregunta->addChild('correctResponse');
                                $value = $correcta->addChild('value',$respuestac);
                                $incorrectas = $pregunta->addChild('incorrectResponses');
                                $i1 = $incorrectas->addChild('value',$respuestai1);
                                $i2 = $incorrectas->addChild('value',$respuestai2);
                                $i3 = $incorrectas->addChild('value',$respuestai3);
                                $xml->asXML('../xml/Questions.xml');
                                echo "Pregunta añadida al archivo XML";
                              }  
                                                       
                     }else{
                         echo "El enunciado de la pregunta debe tener mas de 10 caracteres.<br>";
                         echo"<a href='javascript:history.back()'>Volver al formulario.</a>";
                     }
                 }else{
                    echo "El correo electronico no es correcto.<br>";
                    echo"<a href='javascript:history.back()'>Volver al formulario.</a>";
                 }  
                 }                    
          ?>
    </div>
  </section>
  <!--<?php include '../html/Footer.html' ?>-->
</body>
</html>