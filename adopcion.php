<?php
include "elementos/cabecera.php";
$id_mascota=$_GET['n'];

include "funciones/funcionesMascotas.php";
$resultado=infoMascotasId($id_mascota);
$total = mysqli_num_rows($resultado);

if($total!==0){

    $fila = $resultado->fetch_assoc();
    $originalDate = $fila['FECHA_NACIMIENTO'];
    $Date = date("d-m-Y", strtotime($originalDate));

}else{
    echo '<script>
                jQuery(function(){   
                   swal({
                         title: "ERROR",
                         text: "Error al cargar información de adopción",
                         type: "error",
                         showConfirmButton: false,
                         timer: 1500,
                    }, 
                    function(){
                         window.location.href = "adopciones";
                    })
                 });
            </script>';
}
?>
<div class="container">
    <div class="card" style="margin: 10px">
        <a href="adopcion?n=<?php echo $fila['ID_MASCOTA']?>" >
            <img src="<?php echo $fila['RUTA_IMG']?>" class="card-img-top" alt="..." style="object-fit: contain; height: 250px">
            <div class="card-body" >
                <h1 class="card-title" style="color: #240463"><?php echo $fila['NOMBRE']?></h1>
                    <a href="https://wa.me/34<?php echo $fila['TELEFONO_CONTACTO'] ?>" target="_blank" style="float: right; margin-right: 20px; margin-left: 10px">
                        <img src="./img/dogen/whatsapp.png" width="45px" height="45px">
                    </a>
                    <a href="mailto:<?php echo $fila['MAIL_CONTACTO']?>" target="_blank" style="float: right; margin-right: 20px; margin-left: 10px">
                        <img src="./img/dogen/correo.png" width="50px" height="50px">
                    </a>
                <hr style="color: #269825; margin-top: 20px">
                <h3 class="card-title" style="color: rgba(36,4,99,0.51)"><?php echo $fila['RAZA']?></h3>
                <p class="card-text" style="color: #269825"><?php echo $fila['DESCRIPCION']?></p>
            </div>
            <div class="card-footer" style=""><br>
                <div class=" table-responsive">
                    <table class="table table-success">
                        <tbody>
                        <tr>
                            <th scope="row">Mail de contacto</th>
                            <td><?php echo $fila['MAIL_CONTACTO']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Teléfono contacto</th>
                            <td><?php echo $fila['TELEFONO_CONTACTO']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Direccion</th>
                            <td><?php echo $fila['DIRECCION']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Edad</th>
                            <td><?php echo $fila['EDAD']?> Año/s</td>
                        </tr>
                        <tr>
                            <th scope="row">Sexo</th>
                            <td><?php echo $fila['SEXO']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Fecha de nacimiento</th>
                            <td><?php echo $Date?></td>
                        </tr>
                        <tr>
                            <th scope="row">Vacunacion</th>
                            <td><?php echo $fila['VACUNACION']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Peso</th>
                            <td><?php echo $fila['PESO']?> Kg</td>
                        </tr>
                        <tr>
                            <th scope="row">Tamaño</th>
                            <td><?php echo $fila['TAMAÑO']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Chip</th>
                            <td><?php echo $fila['CHIP']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Nivel de actividad</th>
                            <td><?php echo $fila['NIVEL_ACTIVIDAD']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Desparasitación</th>
                            <td><?php echo $fila['DESPARASITACION']?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </a>
    </div>
</div>
<!----------------------------------- FOOTER START ------------------------------------->
<?php
include "elementos/footer.html";
?>
<!----------------------------------- FOOTER END ------------------------------------->