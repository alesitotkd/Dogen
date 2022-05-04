<?php


// Incluimos el archivo de conexión
include '../funciones/conectar.php';
$conexion=conectar();

if (isset($_POST["validar_login"])){
    if ((isset($_POST["mail"])) && (isset($_POST["passwd"]))) {

        $mail=$_POST["mail"];
        $contra=$_POST["passwd"];

        // Comprobamos si hay algún usuario con ese mail
        $sql="select count(*) from usuarios WHERE mail ='$mail'";
        $conexion->set_charset("utf8");
        $resultados=$conexion->query($sql);
        if ($resultados){
            $sql="select * from usuarios where mail='$mail'";
            $resultados = $conexion -> query($sql);
            $fila=$resultados->fetch_assoc();
            $hashbd=$fila['CONTRA'];

            if (password_verify($contra,$hashbd)==true){
                $usuario_mayus=strtoupper($fila["nombre"]);
                $conexion->close();
                    echo "<script> alert('BIENVENIDO, $usuario_mayus');window.location= '../home' </script>";
            }else{
                $conexion->close();
                echo "<script> alert('USUARIO O CONTRASEÑA INCORRECTA');window.location= '../index' </script>";

            }

        }else{
            $conexion->close();
            echo "<script> alert('USUARIO O CONTRASEÑA INCORRECTA');window.location= '../index' </script>";
        }

    }else {
        $conexion->close();
        echo "<script> alert('USUARIO O CONTRASEÑA INCORRECTA');window.location= '../index' </script>";
    }
}
?>