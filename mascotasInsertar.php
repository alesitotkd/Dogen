<?php
include "elementos/cabecera.php";
?>
<form action="mascotasInsertar" enctype="multipart/form-data" method="post">
<div class="container" style="margin-top: 30px" id="app">
    <hr>
        <h5 class="card-title text-muted text-uppercase text-center">ADOPCIONES</h5>
        <h6 class="card-price text-center">1€<span class="period">/Anuncio</span></h6>
    <hr>
    <br>
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Imagen de la Mascota</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <input id="inputFile1" type="file" class="form-control" name="imagen" value="" accept="image/x-png,image/gif,image/jpeg" required>
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
            <input type="number" v-model="telefono_contacto" class="form-control" name="telefono_contacto" value="" required >
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Nombre Mascota</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <input type="text" v-model="nombre" class="form-control" name="nombre" value="" required >
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Edad Mascota (Opcional)</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <input type="number"v-model="edad" class="form-control" name="edad" value="">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Raza</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <input type="text" v-model="raza" class="form-control" name="raza" value="" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Sexo</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <select v-model="sexo" name="sexo"  class="form-control" required >
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Fecha de nacimiento (Opcional)</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <input type="date" v-model="fecha_nacimiento" class="form-control" name="fecha_nacimiento" value="">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Vacunación</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <select v-model="vacunacion" name="vacunacion" class="form-control" required >
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Peso (Kg)</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <input type="number" v-model="peso" class="form-control" name="peso" value="" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Tamaño</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <select v-model="tamanio" name="tamanio" class="form-control" required >
                <option value="Grande">Grande</option>
                <option value="Mediano">Mediano</option>
                <option value="Pequeño">Pequeño</option>
            </select>
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
            <h6 class="mb-0">CHIP (Opcional)</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <select v-model="chip" name="chip" class="form-control" >
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Nivel de actividad</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <select v-model="nivel_actividad" name="nivel_actividad" class="form-control" required >
                <option value="Alto">Alto</option>
                <option value="Medio">Medio</option>
                <option value="Bajo">Bajo</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Desparasitación (Opcional)</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <select v-model="desparasitacion" name="desparasitacion" class="form-control" >
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">Descripción (Opcional)</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <textarea name="descripcion"  v-model="descripcion" class="form-control"  cols="30" rows="10" maxlength="200"></textarea>
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
                <div class="col-xl-4 col-md-4 mb-3"><b>Edad:</b> {{ edad }}</div>
                <div class="col-xl-4 col-md-4 mb-3"><b>Raza:</b> {{ raza }}</div>
                <div class="col-xl-4 col-md-4 mb-3"><b>Sexo:</b> {{ sexo }}</div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-3"><b>Fecha de nacimiento</b> {{ fecha_nacimiento }}</div>
                <div class="col-xl-4 col-md-4 mb-3"><b>Vacunacion:</b> {{ vacunacion }}</div>
                <div class="col-xl-4 col-md-4 mb-3"><b>Peso:</b> {{ peso }}</div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-3"><b>Tamaño:</b> {{ tamanio }}</div>
                <div class="col-xl-4 col-md-4 mb-3"><b>Direccion:</b> {{ direccion }}</div>
                <div class="col-xl-4 col-md-4 mb-3"><b>Chip:</b> {{ chip }}</div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-3"><b>Nivel de actividad:</b> {{ nivel_actividad }}</div>
                <div class="col-xl-4 col-md-4 mb-3"><b>Desparasitación:</b> {{ desparasitacion }}</div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-4 mb-3"><b>Descripción:</b> {{ descripcion }}</div>
            </div>
            <div class="row justify-content-center" style="margin-top: 20px">
                <img id="img1" class="col-xl-6 col-md-4 mb-3" style="width: 35%; height: 35%">
                <input style="background-color:  #269825;; border-color:  #269825; width: 100%" type="submit" name="publicar" class="btn btn-primary px-4" value="Confirmar y publicar macota">
            </div>
        </div>
    </div>
</div>

    <?php
    include "funciones/funcionesMascotas.php";
    if (isset($_POST['publicar'])){
        //Campos Not null de la BBDD
        if (!empty('mail_contacto') && !empty('telefono_contacto') && !empty('nombre') && !empty('raza') && !empty('sexo') && !empty('vacunación')
        && !empty('peso') && !empty('tamanio') && !empty('direccion') && !empty('nivel_actividad')){


            //---------------------------- CARGA DE IMG EN EL SERVIDOR START ---------------------------------
            $nombre_img =$_FILES['imagen']['name'];
            $tipo = $_FILES['imagen']['type'];
            $tamano = $_FILES['imagen']['size'];


            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagen"]["type"] == "image/gif")
                || ($_FILES["imagen"]["type"] == "image/jpeg")
                || ($_FILES["imagen"]["type"] == "image/jpg")
                || ($_FILES["imagen"]["type"] == "image/png"))
            {
                $path = './img/mascotas/'.$_SESSION['id'];
                if (!file_exists($path)) {
                    mkdir($path);
                }
                // Ruta donde se guardarán las imágenes que subamos
                $directorio = $_SERVER['DOCUMENT_ROOT'].'/PROYECTO_FINAL/'.$path;
                // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.'/'.$nombre_img);
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
                                 window.location.href = "mascotasInsertar";
                            })
                         });
                    </script>';
            }
            //---------------------------- CARGA DE IMG EN EL SERVIDOR END ---------------------------------

            $insercion=insertarMascota($_SESSION['id'],$_POST['mail_contacto'],$_POST['telefono_contacto'],$_POST['nombre'],
                $_POST['edad'],$_POST['raza'],$_POST['sexo'],$_POST['fecha_nacimiento'],$_POST['vacunacion'],
                $_POST['peso'],$_POST['tamanio'],$_POST['direccion'], $_POST['chip'],$_POST['nivel_actividad'],
                $_POST['desparasitacion'],$_POST['descripcion']);

            if ($insercion==true){
                echo '<script>
                        jQuery(function(){   
                           swal({
                                 title: "MASCOTA PUBLICADA CORRECTAMENTE",
                                 type: "success",
                                 showConfirmButton: false,
                                 timer: 1500,
                            }, 
                            function(){
                                 window.location.href = "mascotas";
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
                             timer: 1500,
                        }, 
                        function(){
                             window.location.href = "mascotasInsertar";
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
                edad: '',
                raza: '',
                sexo: '',
                fecha_nacimiento: '',
                vacunacion: '',
                peso: '',
                tamanio: '',
                direccion: '',
                chip: '',
                nivel_actividad: '',
                desparasitacion: '',
                descripcion: '',

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