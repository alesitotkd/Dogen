<?php
include "conectar.php";

// INSERTAR UNA MASCOTA

function insertarMascota($id_usuario,$mail_contacto,$telefono_contacto,$nombre,$edad ,$raza, $sexo, $fecha_nacimiento,$vacunacion,$peso,$tamanio,$direccion,$chip,$nivel_actividad,$desparasitacion,$descripcion) {

    $con = conectar();
    if (!$con)
        return null;
    else {
        $sql = "INSERT INTO mascotas(id_usuario,mail_contacto,telefono_contacto,nombre,edad,raza,sexo,
                     fecha_nacimiento,vacunacion,peso,tamaño,direccion,chip,nivel_actividad,desparasitacion,descripcion) 
                    VALUES ('{$id_usuario}','{$mail_contacto}', '{$telefono_contacto}','{$nombre}','{$edad}',
                            '{$raza}','{$sexo}','{$fecha_nacimiento}','{$vacunacion}','{$peso}','{$tamanio}',
                            '{$direccion}','{$chip}','{$nivel_actividad}','{$desparasitacion}','{$descripcion}')";

        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
        mysqli_close($con);
    }

}

//------------------------------------------------------------------------------------------------------