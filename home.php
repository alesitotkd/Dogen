<?php
include "elementos/cabecera.php";
?>
<!----------------------------------- CARROUSEL START ------------------------------------->
<header>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('./img/dogen/carrusel1.jpg')">
                <div class="carousel-caption">
                    <p>Respetar a los animales es una obligación, amarlos es un privilegio</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('./img/dogen/carrusel2.jpg')">
                <div class="carousel-caption">
                    <p>Los amigos no se compran, se adoptan</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('./img/dogen/carrusel3.jpg')">
                <div class="carousel-caption">
                    <p>No hay mejor regalo que la mirada de un animal agradecido</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</header>
<!----------------------------------- CARROUSEL END ------------------------------------->
<!----------------------------------- TARGET START ------------------------------------->
<section style="margin-top: 60px" >
    <div class="container">
        <div class="row">
            <!-- Cuidados -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-0 shadow">
                    <a href="productos">
                        <img src="./img/dogen/productos.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Productos</h5>
                            <div class="card-text text-black-50">El cuidado que necesita</div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Mascotas -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-0 shadow">
                    <a href="adopciones">
                        <img src="./img/dogen/adopta.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Adopciones</h5>
                            <div class="card-text text-black-50">No compres, adopta</div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Personal -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-0 shadow">
                    <a href="personal">
                        <a onclick="alertaPersonal()">
                            <img src="./img/dogen/personal.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-0">Personal</h5>
                                <div class="card-text text-black-50">Dale el mejor trato</div>
                            </div>
                        </a>
                    </a>
                </div>
            </div>
            <!-- Colaboradores -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-0 shadow">
                    <a onclick="alertaColaboradores()">
                        <img src="./img/dogen/colaboradores.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Colaboradores</h5>
                            <div class="card-text text-black-50">Protectoras y perreras</div>
                        </div>
                    </a>
                </div>
            </div>
    </div>
    <!----------------------------------- TARGET END ------------------------------------->
    <!----------------------------------- PRICE START ------------------------------------->
    <section class="pricing py-5">
        <div class="container">
            <div class="row">
                <!-- Anuncio de mascota -->
                <div class="col-lg-4">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">ADOPCIONES</h5>
                            <h6 class="card-price text-center">1€<span class="period">/Anuncio</span></h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Anuncia, no abandones</strong></li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Datos de mascota</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Fotografía de mascota</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Datos de contacto</li>
                            </ul>
                            <div class="d-grid">
                                <a href="adopcionesInsertar" class="btn btn-primary text-uppercase"
                                   style="background-color: #240463; border: #240463">Anunciar mascota</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Anuncio de personal -->
                <div class="col-lg-4">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Cuidador / adiestrador</h5>
                            <h6 class="card-price text-center">2,5€<span class="period">/Anuncio</span></h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Anunciate, cuida, enseña</strong></li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Datos del anunciante</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Experiencias</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Tarifa del anunciante</li>
                            </ul>
                            <div class="d-grid">
                                <a href="personalInsertar" class="btn btn-primary text-uppercase"
                                   style="background-color: #240463; border: #240463">Anunciarme</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Anuncio de colaborador -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Colaborador</h5>
                            <h6 class="card-price text-center">5€<span class="period">/Al mes</span></h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Colabora con nosotros</strong>
                                </li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Colabora con el proyecto</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Anuncia tu protectora</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Anuncia tu perrera</li>
                            </ul>
                            <div class="d-grid">
                                <a href="tel:+123456789" class="btn btn-primary text-uppercase"
                                   style="background-color: #240463; border: #240463" onclick="alertaLlamada()">llámanos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------------------------------- PRICE END ------------------------------------->
    <!----------------------------------- CONTACT START ------------------------------------->
    <hr>
    <div class="row">
        <div class="col-md-10 col-md-offset-3" id="form_container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3058.1593041580845!2d-4.827918685325504!3d39.
            96019087942085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd401c097bcad393%3A0x32ad7d82ff66d92b!2sC.
            %20Cristo%20de%20la%20Gu%C3%ADa%2C%2016%2C%2045600%20Talavera%20de%20la%20Reina%2C%20Toledo!5e0!3m2!1ses-
            419!2ses!4v1654772078824!5m2!1ses-419!2ses" width="100%" height="350" style="border:0;"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="col-md-2 col-md-offset-3" id="form_container" style="margin-top: 40px">
            <center>
                <div class="col-md-6" style="margin-bottom: 20px">
                    <a href="mailto:Dogen@gmail.com" target="_blank">
                        <img src="./img/dogen/correo.png" width="120px" height="120">
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="https://wa.me/34637023488" target="_blank">
                        <img src="./img/dogen/whatsapp.png" width="120px" height="120px">
                    </a>
                </div>
            </center>
        </div>
    </div>
</section>
<!----------------------------------- CONTACT END ------------------------------------->
<!----------------------------------- FOOTER START ------------------------------------->
<?php
include "elementos/footer.html";
?>
<!----------------------------------- FOOTER END ------------------------------------->


</body>
</html>