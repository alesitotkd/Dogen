<?php

// FUNCIÓN DE CONEXIÓN

function conectar()
{
    $servidor = "localhost:33060";
    $usuario = "root";
    $clave = "";
    $basededatos = "dogen";

    $conexion = mysqli_connect($servidor, $usuario, $clave, $basededatos);

    if ($conexion->connect_error) {
        echo "Fallo al conectar con la Base de Datos";
        return null;
    } else {
        return $conexion;
    }
}


?>