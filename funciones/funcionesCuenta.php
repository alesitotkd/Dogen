<?php
include "conectar.php";

// OBTENER INFORMACIÓN DE USUARIO
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

// MODIFICAR DATOS DE USUARIO

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

// MODIFICAR CONTRASEÑA DE USUARIO

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

// ELIMINAR USUARIO

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

//------------------------------------------------------------------------------------------------------

// MASCOTAS USUARIO

function mascotasUsuario($id)
{

    $sql="select * from mascotas where id_usuario='$id'";
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

// MASCOTAS BORRAR
function borrarMascota($id) {
    $consulta = "delete from mascotas where id_mascota = '$id'";
    $mensaje = null;
    $con = conectar();
    if ($con == null) {
        return 0;
    } else {
        $resultado = $con->query($consulta);

        if ($resultado) {
            if ($con->affected_rows == 1)
                return 1; // se borra
            else
                return -1; // no se borra
        } else {
            if ($con->errno == 1451) {
                return -2;
            }
        }
    }

}

//------------------------------------------------------------------------------------------------------

// CUIDADOR ANUNCIOS USUARIO

function cuidadorUsuario($id)
{

    $sql="select * from personal where id_usuario='$id' and tipo='Cuidador'";
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

// CUIDADOR BORRAR
function borrarCuidador($id) {
    $consulta = "delete from personal where id_personal = '$id'";
    $mensaje = null;
    $con = conectar();
    if ($con == null) {
        return 0;
    } else {
        $resultado = $con->query($consulta);

        if ($resultado) {
            if ($con->affected_rows == 1)
                return 1; // se borra
            else
                return -1; // no se borra
        } else {
            if ($con->errno == 1451) {
                return -2;
            }
        }
    }

}

//------------------------------------------------------------------------------------------------------

// ADIESTRADOR ANUNCIOS USUARIO

function adiestradorUsuario($id)
{

    $sql="select * from personal where id_usuario='$id' and tipo='Adiestrador'";
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

// ADIESTRADOR BORRAR
function borrarAdiestrador($id) {
    $consulta = "delete from personal where id_personal = '$id'";
    $mensaje = null;
    $con = conectar();
    if ($con == null) {
        return 0;
    } else {
        $resultado = $con->query($consulta);

        if ($resultado) {
            if ($con->affected_rows == 1)
                return 1; // se borra
            else
                return -1; // no se borra
        } else {
            if ($con->errno == 1451) {
                return -2;
            }
        }
    }

}