<?php
session_start();
if(!isset($_SESSION['email'])){
     echo "<script>
                    alert('Tienes que estar registrado para usar esta aplicación');
                    window.location.href='../php/SignUp.php';
                    </script>"; 
}else if($_SESSION['email'] != "admin@ehu.es" ){
    echo "<script>
                    alert('No tienes privilegios para gestionar usuarios');
                    window.location.href='Layout.php';
                    </script>"; 
}
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
      <?php
        include 'DbConfig.php';
        //Creamos la conexion con la BD.
        $link = mysqli_connect($server,$user,$pass,$basededatos);
        if(!$link){
            die("Fallo al conectar con la base de datos: " .mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM usuarios";
        $resul = mysqli_query($link,$sql,MYSQLI_USE_RESULT);
        if(!$resul){
            die("Error: ".mysqli_error($link));
        }
        
        echo "<table border = ><tr><th>Email</th><th>Pass</th><th>Imagen</th><th>Estado</th> <th>Bloqueo</th><th>Borrar</th></tr>";
        while($row = mysqli_fetch_array($resul)){
          if($row['email']!="admin@ehu.es"){
            echo "<tr><td>".$row['email']."</td><td>".$row['pass']."</td><td><img width=\"150\" height=\"150\" src=\"data:image/*;base64, ".$row['foto']."\" alt=\"Imagen\"/></td><td>".$row['estado']."</td><td><input type='button' value = 'Cambiar Estado' onclick= CambiarEstado('".$row['email']."')></td><td><input type='button' value = 'Borrar Usuario' onclick= BorrarUsuario('".$row['email']."')></td></tr>";
          }else{
            echo "<tr><td>".$row['email']."</td><td>".$row['pass']."</td><td><img width=\"150\" height=\"150\" src=\"data:image/*;base64, ".$row['foto']."\" alt=\"Imagen\"/></td><td>".$row['estado']."</td><td>-</td><td>-</td></tr>";
          }
        }
        echo "</table>";
    ?>
    <script type="text/javascript">
      function CambiarEstado(email){
        var conf = confirm("¿Deseas cambiar el estado?");
        if(conf){
          window.location.href="../php/ChangeState.php?email="+email;
        }
      }
      function BorrarUsuario(email){
        var conf = confirm("¿Deseas eliminar este usuario?");
        if(conf){
          window.location.href="../php/RemoveUser.php?email="+email;
        }
      }

    </script>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>