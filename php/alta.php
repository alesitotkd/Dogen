<!-- ========================= JS ALERTS ========================= -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
// Incluimos el archivo de conexión
include '../funciones/conectar.php';
$conexion=conectar();

// Juego caracteres
$conexion->set_charset("utf8");
if (isset($_POST['enviar_login'])) {
    if ((isset($_POST['nombre'])) && (isset($_POST['apellido1'])) &&
        (isset($_POST['mail'])) && (isset($_POST['contra']))) {

        if ((!empty($_POST['nombre'])) && (!empty($_POST['apellido1'])) &&
            (!empty($_POST['mail'])) && (!empty($_POST['contra']))) {


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
            echo '
                <script>
                    jQuery(function(){   
                       swal({
                             title: "CUENTA CREADA CORRECTAMENTE",
                             type: "success",
                             showConfirmButton: false,
                             timer: 1500,
                        }, 
                        function(){
                             window.location.href = "../index";
                        })
                    });
                </script>';
        } else {
            $conexion->close();
            echo '<script>
                    jQuery(function(){   
                       swal({
                             title: "ERROR",
                             text: "Error al crear cuenta, intentelo de nuevo",
                             type: "error",
                             showConfirmButton: false,
                             timer: 2500,
                        }, 
                        function(){
                             window.location.href = "../index";
                        })
                    });
                 </script>';
        }
        }else{
            $conexion->close();
            echo '<script>
                    jQuery(function(){   
                       swal({
                             title: "ERROR",
                             text: "Error al crear cuenta, intentelo de nuevo",
                             type: "error",
                             showConfirmButton: false,
                             timer: 2500,
                        }, 
                        function(){
                             window.location.href = "../index";
                        })
                    });
                 </script>';

        }

    }
}else{
    $conexion -> close();
}



?>
<!-- ========================= JS ALERTS========================= -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
