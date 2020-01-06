<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <h2>DATOS DEL AUTOR/AUTORES</h2>
      <hr><br><br>
      <p><b>Aritz García & Gonzalo Galdós</b></p>
      <p>Especialidad de grado: Ingeniería del Software</p>
      <div align="center">
      <table>
        <tr>
        <td><img src="https://cdn.bulbagarden.net/upload/thumb/2/24/512Simisage.png/250px-512Simisage.png" width="128" height="128"></td>
        <td><img src="https://cdn.bulbagarden.net/upload/thumb/7/7c/514Simisear.png/600px-514Simisear.png" width="128" height="128"></td>
        </tr>
        <tr>
          <td><a href="mailto:agarcia717@ikasle.ehu.es">agarcia717@ikasle.ehu.es</a> | </td>
          <td><a href="mailto:ggaldos002@ikasle.ehu.es">ggaldos002@ikasle.ehu.es</a></td>
        </tr>
      </table>
    <br>
    <br>
    Mención especial a Gorka Alvarez Marlasca (<a href="mailto:galvarez024@ikasle.ehu.eus" >galvarez024@ikasle.ehu.eus</a>) e Iñaki García Noya (<a href="mailto:igarcia361@ikasle.ehu.eus" >igarcia361@ikasle.ehu.eus</a>) por la cesión del código.
    <hr>  
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
