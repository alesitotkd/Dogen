<?php
include "conectar.php";

// INSERTAR PERSONAL

function insertarPersonal($id_usuario,$tipo,$mail_contacto,$telefono_contacto,$nombre,$apellido1 ,$apellido2,
                         $direccion,$tarifa,$disponibilidad,$experiencia,$ruta) {

    $con = conectar();
    if (!$con)
        return null;
    else {
        $sql = "INSERT INTO personal(id_usuario,tipo,mail_contacto,telefono_contacto,nombre,apellido1,apellido2,
                     direccion,tarifa,disponibilidad,experiencia,ruta_img) 
                    VALUES ('{$id_usuario}','{$tipo}','{$mail_contacto}', '{$telefono_contacto}','{$nombre}','{$apellido1}',
                            '{$apellido2}','{$direccion}','{$tarifa}','{$disponibilidad}','{$experiencia}','{$ruta}')";

        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
        mysqli_close($con);
    }

}

//------------------------------------------------------------------------------------------------------
// LISTAR CUIDADORES

function infoCuidadores(){
    // Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select * from personal where tipo='Cuidador'";
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
// FILTRO CUIDADORES

function infoFiltroCuidadores($a){
    // Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select * from personal where id_personal like '%$a%' 
        or id_usuario like '%$a%' or mail_contacto like '%$a%' or telefono_contacto 
        like '%$a%' or nombre like '%$a%' or apellido1 like '%$a%' or apellido2 like '%$a%' 
        or direccion like '%$a%' or tarifa like '%$a%' or disponibilidad like '%$a%' 
        or experiencia like '%$a%' or ruta_img like '%$a%' having tipo='Cuidador';";
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
// LISTAR CUIDADORES

function infoAdiestradores(){
    // Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select * from personal where tipo='Adiestrador'";
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
// FILTRO CUIDADORES

function infoFiltroAdiestradores($a){
    // Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select * from personal where id_personal like '%$a%' 
        or id_usuario like '%$a%' or mail_contacto like '%$a%' or telefono_contacto 
        like '%$a%' or nombre like '%$a%' or apellido1 like '%$a%' or apellido2 like '%$a%' 
        or direccion like '%$a%' or tarifa like '%$a%' or disponibilidad like '%$a%' 
        or experiencia like '%$a%' or ruta_img like '%$a%' having tipo='Adiestrador';";
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
// LISTAR PERSONAL POR ID

function infoPersonalId($id){
    // Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select * from personal where id_personal='$id'";
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