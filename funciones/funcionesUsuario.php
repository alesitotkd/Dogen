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
