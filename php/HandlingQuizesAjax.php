<?php
session_start();
if(!isset($_SESSION['email'])){
    echo "<script>
                    alert('Tienes que estar registrado para usar esta aplicación');
                    window.location.href='../php/SignUp.php';
                    </script>"; 
}else if($_SESSION['email'] == "admin@ehu.es" ){
    echo "<script>
                    alert('Un administrador no puede gestionar preguntas');
                    window.location.href='Layout.php';
                    </script>"; 
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/ShowImageInForm.js"></script>
    <script src="../js/ValidateFieldsQuestion.js"></script>
    <script src="../js/ShowQuestionsAjax.js"></script>
    <script src="../js/AddQuestionsAjax.js"></script>
    <script type="text/javascript" src="../js/QuestionCount.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
        <div id="questionCount"></div><br>
         <form action="AddQuestionWithImage.php" name="fquestion" id="fquestion" method="post" enctype="multipart/form-data">
            <p>Introduce tu dirección de correo: *</p>
            <?php echo "<input type='text' id='dirCorreo' name='dirCorreo' size='60' value='".$_SESSION['email']."' readonly>"; ?>
            <p>Introduce el enunciado de la pregunta: *</p>
            <input type="text" size="60" id="nombrePregunta" name="nombrePregunta">
            <p>Respuesta correcta: *</p>
            <input type="text" size="60" id="respuestaCorrecta" name="respuestaCorrecta">
            <p>Respuesta incorrecta1: *</p>
            <input type="text" size="60" id="respuestaIncorrecta1" name="respuestaIncorrecta1">
            <p>Respuesta incorrecta2: *</p>
            <input type="text" size="60" id="respuestaIncorrecta2" name="respuestaIncorrecta2">
            <p>Respuesta incorrecta3: *</p>
            <input type="text" size="60" id="respuestaIncorrecta3" name="respuestaIncorrecta3">
            <p>Complejidad de la pregunta: *</p>
            <select id="complejidad" name="complejidad">
                <option value="1">Baja</option>
                <option value="2" selected>Media</option>
                <option value="3">Alta</option>
            </select>
            <p>Introduce el tema de la pregunta: *</p>
            <input type="text" size="60" id="temaPregunta" name="temaPregunta">
            <br>
            <input type="file" id="file" accept="image/*" name="file">
            <br>
            <p>
                <input type="button" name="enviar" id="enviar" value="Enviar"> 
                <input type="button" name="mostrarPreguntas" value="Mostrar Preguntas" onclick="mostrarPreguntasXML()">
                <input type="reset" id='reset' value="Limpiar">
            </p>
            <div id="mensaje"></div>
            <div id="preguntas"> </div>
        </form>    
    </div>

    <script>
        $('#reset').click(function(){
                    $('#preguntas').html("");
                    $('#mensaje').html("");
                });
    </script>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
