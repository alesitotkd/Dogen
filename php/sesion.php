<?php session_start(); ?>
<!-- ========================= JS ALERTS ========================= -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
// Incluimos el archivo de conexión
include '../funciones/conectar.php';
$conexion=conectar();

if (isset($_POST["validar_login"])){
    if ((isset($_POST["mail"])) && (isset($_POST["passwd"]))) {

        $mail=$_POST["mail"];
        $contra=$_POST["passwd"];

        // Comprobamos si hay algún usuario con ese mail
        $sql="select count(*) from usuarios WHERE mail ='$mail'";
        $conexion->set_charset("utf8");
        $resultados=$conexion->query($sql);
        if ($resultados){
            $sql="select * from usuarios where mail='$mail'";
            $resultados = $conexion -> query($sql);
            $fila=$resultados->fetch_assoc();
            $hashbd=$fila['CONTRA'];

            if (password_verify($contra,$hashbd)==true){
                $usuario_mayus=strtoupper($fila["NOMBRE"]);
                $_SESSION['id']=$fila["ID_USUARIO"];
                $_SESSION['usuario']=$fila["NICKNAME"];
                $_SESSION['mail']=$fila["MAIL"];
                $conexion->close();
                echo '<script>
                        jQuery(function(){   
                           swal({
                                 title: "BIENVENIDO",
                                 type: "success",
                                 showConfirmButton: false,
                                 timer: 1500,
                            }, 
                            function(){
                                 window.location.href = "../home";
                            })
                        });
                        </script>';
            }else{
                $conexion->close();
                echo '<script>
                        jQuery(function(){   
                           swal({
                                 title: "ERROR",
                                 text: "Usuario o contraseña incorrectos",
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
                                 text: "Usuario o contraseña incorrectos",
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

    }else {
        $conexion->close();
        echo '<script>
                        jQuery(function(){   
                           swal({
                                 title: "ERROR",
                                 text: "Usuario o contraseña incorrectos",
                                 type: "error",
                                 showConfirmButton: false,
                                 timer: 2500,
                            }, 
                            function(){
                                 window.location.href = "../";
                            })
                        });
                        </script>';
    }
}
?>
<!-- ========================= JS ALERTS========================= -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">