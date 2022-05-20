//Alerta Home -> Personal, elegir apartado
function alertaPersonal(){
    Swal.fire({
        title: '<strong>PERSONAL</strong>',
        icon: 'question',
        html:
            '<h6>SELECCIONE EL APARTADO AL QUE DESEA ACCEDER</h6><br>' +
            '<a href="cuidadores"><button class="btn btn-success">Cuidadores</button></a>' +
            '<a href="adiestradores"><button class="btn btn-success" style="margin-left: 5px">Adiestradores</button></a>',
        showConfirmButton: false,
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
    })
}

//Alerta Home -> Colaboradores, elegir apartado
function alertaColaboradores(){
    Swal.fire({
        title: '<strong>COLABORADORES</strong>',
        icon: 'question',
        html:
            '<h6>SELECCIONE EL APARTADO AL QUE DESEA ACCEDER</h6><br>' +
            '<a href="protectoras"><button class="btn btn-success">Protectoras</button></a>' +
            '<a href="perreras"><button class="btn btn-success" style="margin-left: 5px">Perreras</button></a>',
        showConfirmButton: false,
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
    })
}

//Alerta Llamada
function alertaLlamada(){
    Swal.fire({
        title: '<strong>TELÉFONO</strong>',
        icon: 'info',
        html:
            '<h3>+34 612345678</h3><br>',
        showConfirmButton: true,
    })
}