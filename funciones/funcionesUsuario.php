<?php
include "conectar.php";

// Obtiene la información del usuario
function infoUsuario($id){
    // Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select id_usuario, nombre, apellido1, apellido2, mail, nickname 
            from usuarios where id_usuario='$id'";
    $con=conectar(); //abrimos la conexión

    if ($con==null){
        echo "Error al conectar con la bd";
        return null;
    }
    else{
        $con->set_charset("utf8");
        $resultado=$con->query($sql);
        if ($resultado!=null){
            $con->close();
            return $resultado;
        }
        else{
            echo "No se ha ejecutado la consulta";
            $con->close();
        }
    }

}

//------------------------------------------------------------------------------------------------------

// Modificar datos de usuario

function modificarUsuario($id, $nombre,$apellido1,$apellido2,$mail, $nickname) {

    $con = conectar();
    if (!$con)
        return null;
    else {
        $sql = "UPDATE usuarios SET nombre='$nombre', apellido1='$apellido1', apellido2='$apellido2', mail='$mail', 
                    nickname='$nickname' WHERE id_usuario='$id'";
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
        mysqli_close($con);
    }

}

//------------------------------------------------------------------------------------------------------

// Modificar contraseña de usuario

function modificarContraUsuario($id, $contra)
{

    $con = conectar();
    if (!$con) {
        return null;
    } else {
        $sql = "UPDATE usuarios SET contra='$contra' WHERE id_usuario='$id'";
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
        mysqli_close($con);
    }
}

//------------------------------------------------------------------------------------------------------

// Eliminar usuario

function eliminarUsuario($id)
{

    $con = conectar();
    if (!$con) {
        return null;
    } else {
        $sql = "DELETE from usuarios WHERE id_usuario='$id'";
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
        mysqli_close($con);
    }
}