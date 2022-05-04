<?php
// Incluimos el archivo de conexión
include '../funciones/conectar.php';
$conexion=conectar();

// Juego caracteres
$conexion->set_charset("utf8");
if (isset($_POST['enviar_login'])) {
    if ((isset($_POST['nombre'])) && (isset($_POST['apellido1'])) &&
        (isset($_POST['mail'])) && (isset($_POST['contra']))) {
        $nombre=$_POST["nombre"];
        $apellido1=$_POST["apellido1"];
        $apellido2=$_POST["apellido2"];
        $mail=$_POST["mail"];
        $contra=$_POST["contra"];
        $hash=password_hash($contra,PASSWORD_DEFAULT); // La contraseña cifrada

        //Generamos el nickname a partir del correo
        $nickname = explode("@",$mail);
        $nickname = $nickname[0];

        $sql = "INSERT INTO usuarios(nombre, apellido1, apellido2, mail, nickname, contra) 
            VALUES ('{$nombre}','{$apellido1}','{$apellido2}', '{$mail}','{$nickname}','{$hash}')";

        if (mysqli_query($conexion, $sql)) {
            $conexion->close();
            $_POST["nombre"]="";
            $_POST["apellido1"]="";
            $_POST["apellido2"]="";
            $_POST["mail"]="";
            $_POST["nickname"]="";
            $_POST["contra"]="";
            $_POST["hash"]="";
            echo "<script> alert('CUENTA CREADA CORRECTAMENTE');window.location= '../index' </script>";
        } else {
            $conexion->close();
            echo "<script> alert('ERROR AL CREAR CUENTA, INTENTELO DE NUEVO');window.location= '../index' </script>";
        }

    }
}else{
    $conexion -> close();
}



?>