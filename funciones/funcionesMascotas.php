<?php
include "conectar.php";

// INSERTAR UNA MASCOTA

function insertarMascota($id_usuario,$mail_contacto,$telefono_contacto,$nombre,$edad ,$raza, $sexo, $fecha_nacimiento,$vacunacion,
                         $peso,$tamanio,$direccion,$chip,$nivel_actividad,$desparasitacion,$descripcion,$ruta) {

    $con = conectar();
    if (!$con)
        return null;
    else {
        $sql = "INSERT INTO mascotas(id_usuario,mail_contacto,telefono_contacto,nombre,edad,raza,sexo,
                     fecha_nacimiento,vacunacion,peso,tamaño,direccion,chip,nivel_actividad,desparasitacion,descripcion,ruta_img) 
                    VALUES ('{$id_usuario}','{$mail_contacto}', '{$telefono_contacto}','{$nombre}','{$edad}',
                            '{$raza}','{$sexo}','{$fecha_nacimiento}','{$vacunacion}','{$peso}','{$tamanio}',
                            '{$direccion}','{$chip}','{$nivel_actividad}','{$desparasitacion}','{$descripcion}','{$ruta}')";

        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
        mysqli_close($con);
    }

}

//------------------------------------------------------------------------------------------------------
// LISTAR MASCOTAS

function infoMascotas(){
    // Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select * from mascotas";
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

// FILTRO MASCOTAS

function infoFiltroMascotas($a){
    // Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select * from mascotas where mail_contacto like '%$a%' or telefono_contacto like '%$a%' 
              or nombre like '%$a%' or edad like '%$a%' or raza like '%$a%' 
                or sexo like '%$a%' or fecha_nacimiento like '%$a%' or vacunacion like '%$a%' 
                  or peso like '%$a%' or tamaño like '%$a%' or direccion like '%$a%' or chip like '%$a%' 
                    or desparasitacion like '%$a%' or descripcion like '%$a%'";
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
// LISTAR MASCOTAS POR ID

function infoMascotasId($id){
    // Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select * from mascotas where id_mascota='$id'";
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