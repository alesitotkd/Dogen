<?php
include "elementos/cabecera.php";
?>
<div class="container" style="margin-top: 20px">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center">
                <!----------------------------------- USUARIO START ------------------------------------->
                            <div class="mt-3">
                                <?php
                                    include "funciones/funcionesCuenta.php";
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
                                <h4 class="text-center"><?php echo $fila['nombre']?></h4>
                                <p class="text-secondary mb-1 text-center"><?php echo $fila['nickname']?></p>

                                <!----------------------------------- ELIMINAR USUARIO START ------------------------------------->
                                <form action="cuenta" method="post">
                                    <div class="row">
                                        <input style="width: 100%" type="submit" name="Eliminar" class="btn btn-danger px-4" value="Eliminar cuenta">
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
                                <!----------------------------------- MASCOTAS USUARIO START ------------------------------------->
                                <?php
                                $mascotas=mascotasUsuario($_SESSION['id']);
                                $total_mascotas = mysqli_num_rows($mascotas);

                                if ($total_mascotas != null){
                                    echo '
                                            <p class="text-secondary mb-1" style="margin-top: 35px"><u>MIS MASCOTAS</u></p>
                                            <table class="table table-sm table-responsive" style="margin-top: 10px">
                                            <tbody>';
                                    while ($linea = $mascotas->fetch_assoc()) {

                                ?>
                                                <tr>
                                                    <th scope="row" style="color: #269825"><?php echo $linea['NOMBRE'] ?></th>
                                                    <td>
                                                        <form action="cuenta" method="post">
                                                            <input type="hidden" value='<?php echo $linea['RUTA_IMG']?>' name="imgMascota" >
                                                            <button class="btn btn-danger px-1" type="submit" name="eliminarMascota" value='<?php echo $linea['ID_MASCOTA']?>' >Eliminar</button>
                                                            <?php
                                                            if (isset($_POST['eliminarMascota'])){
                                                                $borrado=borrarMascota($_POST['eliminarMascota']);
                                                                if ($borrado==0){
                                                                    echo '<script>
                                                                            jQuery(function(){   
                                                                               swal({
                                                                                     title: "ERROR AL ELIMINAR MASCOTA",
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
                                                                if ($borrado==1){
                                                                    unlink($_POST['imgMascota']);
                                                                    echo '<script>
                                                                            jQuery(function(){   
                                                                               swal({
                                                                                     title: "MASCOTA ELIMINADA CORRECTAMENTE",
                                                                                     type: "success",
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
                                                    </td>
                                                </tr>


                                <?php
                                    }
                                    echo '
                                         </table>
                                          </tbody>';
                                }

                                ?>
                                <!----------------------------------- MASCOTAS USUARIO END ------------------------------------->
                                <!----------------------------------- CUIDADORES USUARIO START ------------------------------------->
                                <?php
                                $cuidadores=cuidadorUsuario($_SESSION['id']);
                                $total_cuidadores = mysqli_num_rows($cuidadores);

                                if ($total_cuidadores != null){
                                    echo '
                                            <p class="text-secondary mb-1" style="margin-top: 35px"><u>CUIDADORES</u></p>
                                            <table class="table table-sm table-responsive" style="margin-top: 10px">
                                            <tbody>';
                                    while ($linea = $cuidadores->fetch_assoc()) {

                                        ?>
                                        <tr>
                                            <th scope="row" style="color: #269825"><?php echo $linea['NOMBRE'] ?></th>
                                            <td>
                                                <form action="cuenta" method="post">
                                                    <input type="hidden" value='<?php echo $linea['RUTA_IMG']?>' name="imgCuidador" >
                                                    <button class="btn btn-danger px-1" type="submit" name="eliminarCuidador" value='<?php echo $linea['ID_PERSONAL']?>' >Eliminar</button>
                                                    <?php
                                                    if (isset($_POST['eliminarCuidador'])){
                                                        $borrado=borrarCuidador($_POST['eliminarCuidador']);
                                                        if ($borrado==0){
                                                            echo '<script>
                                                                            jQuery(function(){   
                                                                               swal({
                                                                                     title: "ERROR AL ELIMINAR CUIDADOR",
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
                                                        if ($borrado==1){
                                                            unlink($_POST['imgCuidador']);
                                                            echo '<script>
                                                                            jQuery(function(){   
                                                                               swal({
                                                                                     title: "CUIDADOR ELIMINADO CORRECTAMENTE",
                                                                                     type: "success",
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
                                            </td>
                                        </tr>


                                        <?php
                                    }
                                    echo '
                                         </table>
                                          </tbody>';
                                }

                                ?>
                                <!----------------------------------- CUIDADORES USUARIO END ------------------------------------->
                                <!----------------------------------- ADIESTRADOR USUARIO START ------------------------------------->
                                <?php
                                $adiestradores=adiestradorUsuario($_SESSION['id']);
                                $total_adiestradores = mysqli_num_rows($adiestradores);

                                if ($total_adiestradores != null){
                                    echo '
                                            <p class="text-secondary mb-1" style="margin-top: 35px"><u>ADIESTRADORES</u></p>
                                            <table class="table table-sm table-responsive" style="margin-top: 10px">
                                            <tbody>';
                                    while ($linea = $adiestradores->fetch_assoc()) {

                                        ?>
                                        <tr>
                                            <th scope="row" style="color: #269825"><?php echo $linea['NOMBRE'] ?></th>
                                            <td>
                                                <form action="cuenta" method="post">
                                                    <input type="hidden" value='<?php echo $linea['RUTA_IMG']?>' name="imgAdiestrador" >
                                                    <button class="btn btn-danger px-1" type="submit" name="eliminarAdiestrador" value='<?php echo $linea['ID_PERSONAL']?>' >Eliminar</button>
                                                    <?php
                                                    if (isset($_POST['eliminarAdiestrador'])){
                                                        $borrado=borrarAdiestrador($_POST['eliminarAdiestrador']);
                                                        if ($borrado==0){
                                                            echo '<script>
                                                                            jQuery(function(){   
                                                                               swal({
                                                                                     title: "ERROR AL ELIMINAR ADIESTRADOR",
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
                                                        if ($borrado==1){
                                                            unlink($_POST['imgAdiestrador']);
                                                            echo '<script>
                                                                            jQuery(function(){   
                                                                               swal({
                                                                                     title: "ADIESTRADOR ELIMINADO CORRECTAMENTE",
                                                                                     type: "success",
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
                                            </td>
                                        </tr>


                                        <?php
                                    }
                                    echo '
                                         </table>
                                          </tbody>';
                                }

                                ?>
                                <!----------------------------------- ADIESTRADOR USUARIO END ------------------------------------->
                                <!----------------------------------- PROTECTORA USUARIO START ------------------------------------->
                                <?php
                                $protectoras=protectorasUsuario($_SESSION['id']);
                                $total_protectoras = mysqli_num_rows($protectoras);

                                if ($total_protectoras != null){
                                    echo '
                                            <p class="text-secondary mb-1" style="margin-top: 35px"><u>PROTECTORAS</u></p>
                                            <table class="table table-sm table-responsive" style="margin-top: 10px">
                                            <tbody>';
                                    while ($linea = $protectoras->fetch_assoc()) {

                                        ?>
                                        <tr>
                                            <th scope="row" style="color: #269825"><?php echo $linea['NOMBRE'] ?></th>
                                            <td>
                                                <form action="cuenta" method="post">
                                                    <input type="hidden" value='<?php echo $linea['RUTA_IMG']?>' name="imgProtectora" >
                                                    <button class="btn btn-danger px-1" type="submit" name="eliminarProtectora" value='<?php echo $linea['ID_COLABORADOR']?>' >Eliminar</button>
                                                    <?php
                                                    if (isset($_POST['eliminarProtectora'])){
                                                        $borrado=borrarProtectora($_POST['eliminarProtectora']);
                                                        if ($borrado==0){
                                                            echo '<script>
                                                                            jQuery(function(){   
                                                                               swal({
                                                                                     title: "ERROR AL ELIMINAR PROTECTORA",
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
                                                        if ($borrado==1){
                                                            unlink($_POST['imgProtectora']);
                                                            echo '<script>
                                                                            jQuery(function(){   
                                                                               swal({
                                                                                     title: "PROTECTORA ELIMINADA CORRECTAMENTE",
                                                                                     type: "success",
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
                                            </td>
                                        </tr>


                                        <?php
                                    }
                                    echo '
                                         </table>
                                          </tbody>';
                                }

                                ?>
                                <!----------------------------------- PROTECTORA USUARIO END ------------------------------------->
                                <!----------------------------------- PERRERA USUARIO START ------------------------------------->
                                <?php
                                $perreras=perrerasUsuario($_SESSION['id']);
                                $total_perreras = mysqli_num_rows($perreras);

                                if ($total_perreras != null){
                                    echo '
                                            <p class="text-secondary mb-1" style="margin-top: 35px"><u>PERRERAS</u></p>
                                            <table class="table table-sm table-responsive" style="margin-top: 10px">
                                            <tbody>';
                                    while ($linea = $perreras->fetch_assoc()) {

                                        ?>
                                        <tr>
                                            <th scope="row" style="color: #269825"><?php echo $linea['NOMBRE'] ?></th>
                                            <td>
                                                <form action="cuenta" method="post">
                                                    <input type="hidden" value='<?php echo $linea['RUTA_IMG']?>' name="imgPerrera" >
                                                    <button class="btn btn-danger px-1" type="submit" name="eliminarPerrera" value='<?php echo $linea['ID_COLABORADOR']?>' >Eliminar</button>
                                                    <?php
                                                    if (isset($_POST['eliminarPerrera'])){
                                                        $borrado=borrarPerrera($_POST['eliminarPerrera']);
                                                        if ($borrado==0){
                                                            echo '<script>
                                                                            jQuery(function(){   
                                                                               swal({
                                                                                     title: "ERROR AL ELIMINAR PERRERA",
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
                                                        if ($borrado==1){
                                                            unlink($_POST['imgPerrera']);
                                                            echo '<script>
                                                                            jQuery(function(){   
                                                                               swal({
                                                                                     title: "PERRERA ELIMINADA CORRECTAMENTE",
                                                                                     type: "success",
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
                                            </td>
                                        </tr>


                                        <?php
                                    }
                                    echo '
                                         </table>
                                          </tbody>';
                                }

                                ?>
                                <!----------------------------------- PROTECTORA USUARIO END ------------------------------------->
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
                            <p class="text-secondary mb-1" style="margin-top: 20px "><u>DATOS PERSONALES</u></p><br>
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
                            <p class="text-secondary mb-1" style="margin-top: 20px"><u>CAMBIAR CONTRASEÑA</u></p><br>
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
                        <br><hr><br>
                    </div>
                </div> <br><br>
            </div>
            <hr>
            <iframe  width="100%" height="350px" frameborder="0" scrolling="no" marginheight="0"
                     marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;
                    hl=es&amp;q=Talavera%20de%20la%20reina%2C%20avenida%20salvador%20allende+(DOGEN)&amp;
                    t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
            </iframe>
        </div>
    </div>
</div>

<!----------------------------------- FOOTER START ------------------------------------->
<?php
include "elementos/footer.html";
?>
<!----------------------------------- FOOTER END ------------------------------------->
