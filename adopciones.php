<?php
include "elementos/cabecera.php";
?>
<div class="container">
    <hr>
    <h5 class="card-title text-muted text-uppercase text-center">ADOPCIONES</h5>
    <br>
    <a href="adopcionesInsertar" class="btn btn-primary text-uppercase"
       style="background-color: #240463; border: #240463; width: 100%;">Anunciar mascota</a>
    <form action="adopciones" method="post" style="margin-top: 20px">
        <div class="input-group" style="">
            <div class="form-outline"  style="width: 100%; margin: 10px">
                <input type="text" name="filtro" class="form-control" placeholder="Filtrar..." />
            </div>
            <button  type="submit" name="filtrar" class="btn btn-primary" style="width: 100%; margin-left: 10px; margin-right: 10px; margin-bottom: 20px; background-color: #269825; border-color: #269825">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
        <?php
        include "funciones/funcionesMascotas.php";
        if (isset($_POST['filtrar'])){
            $resultado=infoFiltroMascotas($_POST['filtro']);
            // Dibujar la tabla de resultados


            if ($resultado != null) {
                echo '<div class="card-group">';
                $total=0;
                while ($fila = $resultado->fetch_assoc()) {
                    $total= $total + 1;
                    //tratamiento fechas
                    $originalDate = $fila['FECHA_NACIMIENTO'];
                    $Date = date("d-m-Y", strtotime($originalDate));
                    ?>
                    <div class="col-sm-4">
                        <div class="card" style="margin: 10px">
                            <a href="adopcion?n=<?php echo $fila['ID_MASCOTA']?>" >
                                <img src="<?php echo $fila['RUTA_IMG']?>" class="card-img-top" alt="..." style="object-fit: contain; height: 250px">
                                <div class="card-body" >
                                    <h3 class="card-title"><?php echo $fila['NOMBRE']?></h3>
                                    <h5 class="card-title"><?php echo $fila['RAZA']?></h5>
                                    <p class="card-text" style="color: black"><?php echo $fila['DESCRIPCION']?></p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Peso: <?php echo $fila['PESO'] ?>Kg</small><br>
                                    <small class="text-muted">Fecha nacimiento: <?php echo $Date?></small><br>
                                    <small class="text-muted">Dirección: <?php echo $fila['DIRECCION']?></small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php

                    if ($total%3 == 0){
                        echo '</div>';
                        echo '<div class="card-group">';
                    }
                }
            }

        }else{
        $resultado=infoMascotas();
        // Dibujar la tabla de resultados
        if ($resultado != null) {

            echo '<div class="card-group">';
            $total=0;
            while ($fila = $resultado->fetch_assoc()) {
                $total= $total + 1;
                //tratamiento fechas
                $originalDate = $fila['FECHA_NACIMIENTO'];
                $Date = date("d-m-Y", strtotime($originalDate));
        ?>
        <div class="col-sm-4">
                <div class="card" style="margin: 10px">
                    <a href="adopcion?n=<?php echo $fila['ID_MASCOTA']?>" >
                        <img src="<?php echo $fila['RUTA_IMG']?>" class="card-img-top" alt="..." style="object-fit: contain; height: 250px" >
                        <div class="card-body" >
                            <h3 class="card-title" style="color: #240463"><?php echo $fila['NOMBRE']?></h3>
                            <hr style="color: #269825">
                            <h5 class="card-title"><?php echo $fila['RAZA']?></h5>
                            <p class="card-text" style="color: black"><?php echo $fila['DESCRIPCION']?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Peso - <?php echo $fila['PESO'] ?>Kg</small><br>
                            <small class="text-muted">Fecha nacimiento - <?php echo $Date?></small><br>
                            <small class="text-muted">Dirección - <?php echo $fila['DIRECCION']?></small>
                        </div>
                    </a>
                </div>
        </div>
         <?php

                if ($total%3 == 0){
                    echo '</div>';
                    echo '<div class="card-group">';
                }
            }
        }
        }
        ?>
    </form>
    <!--***** PAGINACIÓN *****-->
<!----------------------------------- FOOTER START ------------------------------------->
<?php
include "elementos/footer.html";
?>
<!----------------------------------- FOOTER END ------------------------------------->