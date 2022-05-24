<?php
include "elementos/cabecera.php";
?>
<form action="personalInsertar" enctype="multipart/form-data" method="post">
    <div class="container" style="margin-top: 30px" id="app">
        <hr>
        <h5 class="card-title text-muted text-uppercase text-center">PERSONAL</h5>
        <h6 class="card-price text-center">2,5€<span class="period">/Anuncio</span></h6>
        <hr>
        <br>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Imagen Personal</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input id="inputFile1" type="file" class="form-control" name="imagen" value="" accept="image/x-png,image/gif,image/jpeg" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Tipo</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <select v-model="tipo" name="tipo"  class="form-control" required >
                    <option value="Cuidador">Cuidador</option>
                    <option value="Adiestrador">Adiestrador</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Mail de contacto</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="email" v-model="mail_contacto" class="form-control" name="mail_contacto" value="" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Teléfono de contacto</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="number" v-model="telefono_contacto" class="form-control" name="telefono_contacto" maxlength="9" value="" required >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Nombre</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" v-model="nombre" class="form-control" name="nombre" value="" required >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">1er apellido</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" v-model="apellido1" class="form-control" name="apellido1" value="" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">2º apellido (Opcional)</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" v-model="apellido2" class="form-control" name="apellido2" value="" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Dirección</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" v-model="direccion" class="form-control" name="direccion" value="" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Tarifa (€/Hora)</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="number" v-model="tarifa" class="form-control" name="tarifa" maxlength="3" value="" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Disponibilidad</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <select v-model="disponibilidad" name="disponibilidad" class="form-control" required >
                    <option value="Entre diario - Mañana">Entre diario - Mañana</option>
                    <option value="Entre diario - Tarde">Entre diario - Tarde</option>
                    <option value="Entre diario - Mañana y tarde">Entre diario - Mañana y tarde</option>
                    <option value="Fines de semana - Mañana">Fines de semana - Mañana</option>
                    <option value="Fines de semana - Tarde">Fines de semana - Tarde</option>
                    <option value="Fines de semana - Mañana y tarde">Fines de semana - Mañana y tarde</option>
                    <option value="Todos los días - Mañana">Todos los días - Mañana</option>
                    <option value="Todos los días - Tarde">Todos los días - Tarde</option>
                    <option value="Todos los días - Mañana y tarde">Todos los días - Mañana y tarde</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Experiencia (Opcional)</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <textarea name="experiencia"  v-model="experiencia" class="form-control"  cols="30" rows="10" maxlength="200"></textarea>
            </div>
        </div>



        <div class="card" style="margin-top: 30px">
            <div class="card-body">
                <h4 style="color:#240463 ">Confirmar datos</h4>
                <hr>
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-3"><b>Mail de contacto:</b> {{ mail_contacto }}</div>
                    <div class="col-xl-4 col-md-4 mb-3"><b>Teléfono de contacto:</b> {{ telefono_contacto }}</div>
                    <div class="col-xl-4 col-md-4 mb-3"><b>Nombre:</b> {{ nombre }}</div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-3"><b>1er apellido:</b> {{ apellido1 }}</div>
                    <div class="col-xl-4 col-md-4 mb-3"><b>2º apellido:</b> {{ apellido2 }}</div>
                    <div class="col-xl-4 col-md-4 mb-3"><b>Dirección:</b> {{ direccion }}</div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-3"><b>Tarifa</b> {{ tarifa }} €/Hora</div>
                    <div class="col-xl-4 col-md-4 mb-3"><b>Disponibilidad:</b> {{ disponibilidad }}</div>
                    <div class="col-xl-4 col-md-4 mb-3"><b>Tipo:</b> {{ tipo }}</div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-4 mb-3"><b>Experiencia:</b> {{ experiencia }}</div>
                </div>
                <div class="row justify-content-center" style="margin-top: 20px">
                    <img id="img1" class="col-xl-6 col-md-4 mb-3" style="width: 35%; height: 35%">
                    <input style="background-color:  #269825;; border-color:  #269825; width: 100%" type="submit" name="publicar" class="btn btn-primary px-4" value="Confirmar y publicar">
                </div>
            </div>
        </div>
    </div>

    <?php
    include "funciones/funcionesPersonal.php";
    if (isset($_POST['publicar'])){
        //Campos Not null de la BBDD
        if (!empty('mail_contacto') && !empty('telefono_contacto') && !empty('tipo') && !empty('nombre')
            && !empty('apellido1') && !empty('direccion') && !empty('direccion') && !empty('tarifa') && !empty('disponibilidad')){


            //---------------------------- CARGA DE IMG EN EL SERVIDOR START ---------------------------------
            $nombre_img =$_FILES['imagen']['name'];
            $tipo = $_FILES['imagen']['type'];
            $tamano = $_FILES['imagen']['size'];


            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagen"]["type"] == "image/gif")
                || ($_FILES["imagen"]["type"] == "image/jpeg")
                || ($_FILES["imagen"]["type"] == "image/jpg")
                || ($_FILES["imagen"]["type"] == "image/png")
                || ($_FILES["imagen"]["type"] == "image/svg")
                || ($_FILES["imagen"]["type"] == "image/tiff")
                || ($_FILES["imagen"]["type"] == "image/heif")
                || ($_FILES["imagen"]["type"] == "image/hevc")
                || ($_FILES["imagen"]["type"] == "image/webp"))
            {
                $path = './img/personal/'.$_SESSION['id'];
                if (!file_exists($path)) {
                    mkdir($path);
                }

                // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                move_uploaded_file($_FILES['imagen']['tmp_name'],$path.'/'.$nombre_img);
                $rutaImg= $path.'/'.$nombre_img;
            }
            else
            {
                //si no cumple con el formato
                echo '<script>
                        jQuery(function(){   
                           swal({
                                 text: "ERROR DE FOTMATO EN LA IMAGEN ",
                                 type: "error",
                                 showConfirmButton: false,
                                 timer: 3500,
                            }, 
                            function(){
                                 location.reload();
                            })
                         });
                    </script>';
            }
            //---------------------------- CARGA DE IMG EN EL SERVIDOR END ---------------------------------

            $insercion=insertarPersonal($_SESSION['id'],$_POST['tipo'],$_POST['mail_contacto'],$_POST['telefono_contacto']
                ,$_POST['nombre'], $_POST['apellido1'],$_POST['apellido2'],$_POST['direccion'],$_POST['tarifa'],
                $_POST['disponibilidad'],$_POST['experiencia'],$rutaImg);

            if ($insercion==true){
                echo '<script>
                        jQuery(function(){   
                           swal({
                                 title: "PUBLICACIÓN CORRECTA",
                                 type: "success",
                                 showConfirmButton: false,
                                 timer: 2000,
                            }, 
                            function(){
                                 window.location.href = "home";
                            })
                        });
                        </script>';
            }else{
                echo '<script>
                        jQuery(function(){   
                           swal({
                                 text: "ERROR AL CONECTAR CON LA BASE DE DATOS",
                                 type: "error",
                                 showConfirmButton: false,
                                 timer: 1500,
                            }, 
                            function(){
                                 window.location.href = "home";
                            })
                         });
                    </script>';
            }

        }else{
            echo '<script>
                    jQuery(function(){   
                       swal({
                             text: "COMPLETE LOS CAMPOS NECESARIOS",
                             type: "error",
                             showConfirmButton: false,
                             timer: 2000,
                        }, 
                        function(){
                             location.reload();
                        })
                     });
                </script>';
        }

    }


    ?>
</form>

<script src="https://unpkg.com/vue@3"></script>

<script>
    const { createApp } = Vue

    createApp({
        data() {
            return {
                mail_contacto: '',
                telefono_contacto: '',
                nombre: '',
                apellido1: '',
                apellido2: '',
                tipo: '',
                direccion: '',
                tarifa: '',
                disponibilidad: '',
                experiencia: '',
            }
        }
    }).mount('#app')
</script>
<!----------------------------------- IMG PREVIEW -------------------------------------->
<script src="./js/previewImagen.js"></script>
<!----------------------------------- FOOTER START ------------------------------------->
<?php
include "elementos/footer.html";
?>
<!----------------------------------- FOOTER END ------------------------------------->