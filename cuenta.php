<?php
include "elementos/cabecera.php";
?>
<div class="container" style="margin-top: 20px">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                <!----------------------------------- USUARIO START ------------------------------------->
                            <div class="mt-3">
                                <?php
                                    include "funciones/funcionesUsuario.php";
                                    $resultado=infoUsuario($_SESSION['id']);
                                    $total = mysqli_num_rows($resultado);

                                    if($total!==0){

                                        $fila = $resultado->fetch_assoc();

                                    }else{
                                        echo '<script>
                                                jQuery(function(){   
                                                   swal({
                                                         title: "ERROR",
                                                         text: "Error al cargar la información de usuario",
                                                         type: "error",
                                                         showConfirmButton: false,
                                                         timer: 5000,
                                                    }, 
                                                    function(){
                                                         window.location.href = "home";
                                                    })
                                                 });
                                            </script>';
                                    }
                                ?>
                                <h4><?php echo $fila['nombre']?></h4>
                                <p class="text-secondary mb-1"><?php echo $fila['nickname']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!----------------------------------- USUARIO END ------------------------------------->
            <!----------------------------------- DATOS USUARIO START ------------------------------------->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="cuenta" method="post">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nombre</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $fila["nombre"]?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">1er apellido</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="apellido1" value="<?php echo $fila["apellido1"]?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">2º apellido</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="apellido2" value="<?php echo $fila["apellido2"]?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mail</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control" name="mail" value="<?php echo $fila["mail"]?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nickname</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="nickname" value="<?php echo $fila["nickname"]?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input style="background-color:  #269825;; border-color:  #269825; width: 100%" type="submit" name="guardar" class="btn btn-primary px-4" value="Guardar cambios">
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['guardar'])){
                            if(!empty($_POST['nombre']) && !empty($_POST['apellido1'])
                                && !empty($_POST['mail']) && !empty($_POST['nickname'])) {
                                    $modificacion = modificarUsuario($_SESSION['id'], $_POST['nombre'], $_POST['apellido1'],
                                        $_POST['apellido2'], $_POST['mail'], $_POST['nickname']);

                                    if ($modificacion == true) {
                                        echo '<script>
                                        jQuery(function(){   
                                           swal({
                                                 title: "CAMBIOS GUARDADOS",
                                                 type: "success",
                                                 showConfirmButton: false,
                                                 timer: 1500,
                                            }, 
                                            function(){
                                                 window.location.href = "cuenta";
                                            })
                                        });
                                        </script>';
                                    } else {
                                        echo '<script>
                                        jQuery(function(){   
                                           swal({
                                                 title: "ERROR AL GUARDAR CAMBIOS",
                                                 type: "error",
                                                 showConfirmButton: false,
                                                 timer: 1500,
                                            }, 
                                            function(){
                                                 window.location.href = "cuenta";
                                            })
                                        });
                                        </script>';
                                    }
                            }else{
                                echo '<script>
                                    jQuery(function(){   
                                       swal({
                                             title: "ERROR AL GUARDAR CAMBIOS",
                                             type: "error",
                                             showConfirmButton: false,
                                             timer: 1500,
                                        }, 
                                        function(){
                                             window.location.href = "cuenta";
                                        })
                                    });
                                        </script>';
                            }
                            }
                            ?>
                            <br><hr><br>
                        </form>
                        <!----------------------------------- DATOS USUARIO END ------------------------------------->
                        <!----------------------------------- CONTRA USUARIO START ------------------------------------->
                        <form action="cuenta" method="post">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Contraseña</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="form-control" name="contra1" value="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Confirmar contraseña</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="form-control" name="contra2" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input style="background-color:  #269825;; border-color:  #269825; width: 100%" type="submit" name="cambiar" class="btn btn-primary px-4" value="Guardar cambios">
                                </div>
                            </div>
                            <?php

                            if (isset($_POST['cambiar'])){
                                if(!empty($_POST['contra1']) && !empty($_POST['contra2']) && $_POST['contra1'] === $_POST['contra2'] ){
                                    $hash=password_hash($_POST['contra1'],PASSWORD_DEFAULT); // La contraseña cifrada
                                    $modificacion = modificarContraUsuario($_SESSION['id'], $hash);

                                    if ($modificacion == true) {
                                        echo '<script>
                                        jQuery(function(){   
                                           swal({
                                                 title: "CONTRASEÑA CAMBIADA",
                                                 type: "success",
                                                 showConfirmButton: false,
                                                 timer: 1500,
                                            }, 
                                            function(){
                                                 window.location.href = "cuenta";
                                            })
                                        });
                                        </script>';
                                    } else {
                                        echo '<script>
                                        jQuery(function(){   
                                           swal({
                                                 title: "ERROR AL CAMBIAR CONTRASEÑA",
                                                 type: "error",
                                                 showConfirmButton: false,
                                                 timer: 1500,
                                            }, 
                                            function(){
                                                 window.location.href = "cuenta";
                                            })
                                        });
                                        </script>';
                                    }
                                }else{
                                    echo '<script>
                                        jQuery(function(){   
                                           swal({
                                                 title: "ERROR AL CAMBIAR CONTRASEÑA",
                                                 type: "error",
                                                 showConfirmButton: false,
                                                 timer: 1500,
                                            }, 
                                            function(){
                                                 window.location.href = "cuenta";
                                            })
                                        });
                                        </script>';
                                }
                            }

                            ?>
                        </form>
                        <!----------------------------------- CONTRA USUARIO END ------------------------------------->
                        <!----------------------------------- ELIMINAR USUARIO START ------------------------------------->
                        <br><hr><br>
                        <form action="cuenta" method="post">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input style="width: 100%" type="submit" name="Eliminar" class="btn btn-danger px-4" value="Eliminar cuenta">
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['Eliminar'])){
                                $eliminacion = eliminarUsuario($_SESSION['id']);

                                if ($eliminacion == true) {
                                    echo '<script>
                                        jQuery(function(){   
                                           swal({
                                                 title: "CUENTA DE USUARIO BORRADA CORRECTAMENTE",
                                                 type: "success",
                                                 showConfirmButton: false,
                                                 timer: 1500,
                                            }, 
                                            function(){
                                                 window.location.href = "./";
                                            })
                                        });
                                        </script>';
                                } else {
                                    echo '<script>
                                        jQuery(function(){   
                                           swal({
                                                 title: "ERROR AL BORRAR CUENTA DE USUARIO",
                                                 type: "error",
                                                 showConfirmButton: false,
                                                 timer: 1500,
                                            }, 
                                            function(){
                                                 window.location.href = "cuenta";
                                            })
                                        });
                                        </script>';
                                }

                            }
                            ?>
                        </form>
                        <!----------------------------------- ELIMINAR USUARIO END ------------------------------------->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!----------------------------------- FOOTER START ------------------------------------->
<?php
include "elementos/footer.html";
?>
<!----------------------------------- FOOTER END ------------------------------------->
