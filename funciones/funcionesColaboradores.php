<?php
include "conectar.php";
//------------------------------------------------------------------------------------------------------
// LISTAR PROTECTORAS

function infoProtectoras(){
// Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select * from colaboradores where tipo='Protectora'";
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

function infoFiltroProtectoras($a){
// Almacenamos la consulta a ejecutar en una variable de tipo cadena.

        $sql="select * from colaboradores where nombre like '%$a%' or nombre_responsable
        like '%$a%' or direccion like '%$a%' or mail_contacto like '%$a%' or telefono_contacto like '%$a%'
        or ruta_img like '%$a%' having tipo='Protectora';";
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
// LISTAR PERRERAS

function infoPerreras(){
// Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select * from colaboradores where tipo='Perrera'";
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
// FILTRO ASOCIACIONES

function infoFiltroPerreras($a){
// Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select * from colaboradores where nombre like '%$a%' or nombre_responsable
        like '%$a%' or direccion like '%$a%' or mail_contacto like '%$a%' or telefono_contacto like '%$a%'
        or ruta_img like '%$a%' having tipo='Perrera';";
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

function infoColaboradoresId($id){
// Almacenamos la consulta a ejecutar en una variable de tipo cadena.

    $sql="select * from colaboradores where id_colaborador='$id'";
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