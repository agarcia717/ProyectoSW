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
        }else{
            include 'DbConfig.php';
            //Creamos la conexion con la BD.
            $link = mysqli_connect($server,$user,$pass,$basededatos);
            if(!$link){
                die("Fallo al conectar con la base de datos: " .mysqli_connect_error());
            }
            $email=$_REQUEST['email'];
            $sql="DELETE from usuarios where email='".$email."';";
            $resul = mysqli_query($link,$sql,MYSQLI_USE_RESULT);
            if(!$resul){
                die("Error 1: ".mysqli_error($link));
            }
            mysqli_close();
            echo "<script> window.location.href='../php/HandlingAccounts.php';</script>";
        }
?>