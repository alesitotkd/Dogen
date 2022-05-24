<?php
include "elementos/cabecera.php";
$id_personal=$_GET['n'];

include "funciones/funcionesPersonal.php";
$resultado=infoPersonalId($id_personal);
$total = mysqli_num_rows($resultado);

if($total!==0){

    $fila = $resultado->fetch_assoc();

}else{
    echo '<script>
                jQuery(function(){   
                   swal({
                         title: "ERROR",
                         text: "Error al cargar información de personal",
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
?>
<div class="container">
    <div class="card" style="margin: 10px">
        <a href="personal?n=<?php echo $fila['ID_PERSONAL']?>" >
            <img src="<?php echo $fila['RUTA_IMG']?>" class="card-img-top" alt="..." style="object-fit: contain; height: 250px">
            <div class="card-body" >
                <h1 class="card-title" style="color: #240463; margin-top: 10px"><?php echo $fila['NOMBRE']?> <?php echo $fila['APELLIDO1']?> <?php echo $fila['APELLIDO2']?></h1>
                <a href="https://wa.me/34<?php echo $fila['TELEFONO_CONTACTO'] ?>" target="_blank" style="float: right; margin-right: 20px; margin-left: 10px">
                    <img src="./img/dogen/whatsapp.png" width="45px" height="45px">
                </a>
                <a href="mailto:<?php echo $fila['MAIL_CONTACTO']?>" target="_blank" style="float: right; margin-right: 20px; margin-left: 10px">
                    <img src="./img/dogen/correo.png" width="50px" height="50px">
                </a>
                <hr style="color: #269825; margin-top: 20px">
                <h3 class="card-title" style="color: rgba(36,4,99,0.51)"><?php echo $fila['TIPO']?></h3>
                <h4 class="card-title" style="color: rgba(36,4,99,0.51)"><?php echo $fila['DISPONIBILIDAD']?></h4>
                <p class="card-text" style="color: #269825"><?php echo $fila['EXPERIENCIA']?></p>
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
                            <th scope="row">Tarifa</th>
                            <td><?php echo $fila['TARIFA']?> €/Hora</td>
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