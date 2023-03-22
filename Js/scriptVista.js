
var table_consultar;

function accederEventos() {
    $("#eventos").html('<button type="button" class="btn btn-primary" data-toggle="modal" onclick="modalRegistro();">Crear</button><button type="button" class="btn btn-primary" id="copiarProceso">Copiar</button><button type="button" class="btn btn-primary" id="consultarProceso" onclick="modalConsulta();">Consultar</button>')
    $('#acceder').hide();
}
function modalRegistro() {
    $("#modalRegistro").modal({ backdrop: 'static', keyboard: false })
    $("#modalRegistro").modal('show');
    $(document).ready(function () {
        $("#modalRegistro").on('shown.bs.modal', function () {
        });
        // inicimos wizzard
        // BS-Stepper Init
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });
}
function AbrirModalCargueArchivos() {
    $("#modalCargaArchivos").modal({ backdrop: 'static', keyboard: false })
    $("#modalCargaArchivos").modal('show');
}

function modalConsulta() {
    $("#modalConsulta").modal({ backdrop: 'static', keyboard: false })
    $("#modalConsulta").modal('show');
}
function verFormularioRegistro(id) {

    if (id == 1) {

        $('#formInfoBasica').show();
        $('#formCronograma').hide();
        $('#formDocumentacionOferta').hide();
    } else if (id == 2) {

        $('#formInfoBasica').hide();
        $('#formCronograma').show();
        $('#formDocumentacionOferta').hide();

    } else if (id == 3) {

        $('#formInfoBasica').hide();
        $('#formCronograma').hide();
        $('#formDocumentacionOferta').show();
    }

}
function listarMoneda() {

    $.ajax({
        url: '../controllers/controller_listar_Moneda.php',
        type: 'POST',

    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "<option value='0'>Seleccione</option>";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i]['id'] + "'>" + data[i]['tipoMoneda'] + "</option>";

            }
            $("#selectMoneda").html(cadena);
        } else {
            cadena += "<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#selectMoneda").html(cadena);
        }
    })
}

function listarActividad() {

    $.ajax({
        url: '../controllers/controller_listar_Actividad.php',
        type: 'POST',

    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "<option value='0'>Seleccione</option>";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i]['id'] + "'>" + data[i]['nombre_Producto'] + "</option>";

            }
            $("#selectActividad").html(cadena);
        } else {
            cadena += "<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#selectActividad").html(cadena);
        }
    })
}
function listarEstado() {

    $.ajax({
        url: '../controllers/controller_listar_Estado.php',
        type: 'POST',

    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "<option value='0'>Seleccione</option>";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i]['id'] + "'>" + data[i]['tipoEstado'] + "</option>";

            }
            $("#selectEstadoProceso").html(cadena);
        } else {
            cadena += "<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#selectEstadoProceso").html(cadena);
        }
    })
}


function guardaProceso() {

    var objeto = $("#inputObjeto").val();
    var actividad = $("#selectActividad").val();
    var descripcion = $("#inputDescripcion").val();
    var moneda = $("#selectMoneda").val();
    var presupuesto = $("#inputPrespuesto").val();
    var fechaInicio = $("#dateFechaInicio").val();
    var horaInicio = $("#timeHoraInicio").val();
    var fechaCierre = $("#dateFechaFin").val();
    var horaCierre = $("#timeHoraFin").val();


    if (objeto == '' ||
        actividad == '0' ||
        descripcion == '' ||
        moneda == '0' ||
        presupuesto == '' ||
        fechaInicio == '' ||
        horaInicio == '' ||
        fechaCierre == '' ||
        horaCierre == ''

    ) {
        return swal.fire("Mensaje De Advertencia", "Porfavor llene los campos vacios", "warning");
    }
    if (fechaInicio > fechaCierre) {
        return swal.fire("Mensaje De Advertencia", "La Fecha de Inicio no puede ser mayor a la Fecha de Finalizacion", "warning");
    }
    $.ajax({
        "url": "../controllers/controller_guardar_Proceso.php",
        "type": "POST",
        "data": {
            objeto: objeto,
            actividad: actividad,
            descripcion: descripcion,
            moneda: moneda,
            presupuesto: presupuesto,
            fechaInicio: fechaInicio,
            horaInicio: horaInicio,
            fechaCierre: fechaCierre,
            horaCierre: horaCierre,
        }
    }).done(function (resp) {
        console.log(resp);
        if (resp > 0) {
            if (resp == 1) {
                limpiarRegistroProceso();
                $("#modalRegistro").modal('hide');
                Swal.fire("Mensaje De Confirmacion", 'Registro realizado', "success").then((value) => {
                    table_consultar.ajax.reload();

                });
            } else {
                Swal.fire("Mensaje De Advertencia", 'El proceso ya se encuentra creado', "warning");
            }
        } else {
            Swal.fire("Mensaje De Error", 'No se pudo completar el Registro', "error");
        }
    })

}

function subirArchivos() {

    var Form = new FormData($('#formCargarArchivos')[0]);
    $.ajax({

        url: "../controllers/controller_subir_Archivos.php",
        type: "POST",
        data: Form,
        processData: false,
        contentType: false,
        success: function (data) {
            Swal.fire("¡Documentacion Cargada!", 'Cargue de archivos exitoso');
        }
    });

}
function limpiarRegistroProceso() {
    $("#inputObjeto").val("");
    $("#selectActividad").val(0).trigger('change');
    $("#inputDescripcion").val("");
    $("#selectMoneda").val(0).trigger('change');
    $("#inputPrespuesto").val("");
    $("#dateFechaInicio").val("");
    $("#timeHoraInicio").val("");
    $("#dateFechaFin").val("");
    $("#timeHoraFin").val("");
    console.log("registro exitoso");
}
function ocultarDataTableConsultar() {
    var x = document.getElementById("ocultar");
    if (x.style.display === "none") {
        x.style.display = "block"; style = "width:100%";
    } else {
        x.style.display = "none";
    }
}
function dataTableConsultar() {
    
    table_consultar = $('#tabla_consulta_Procesos').DataTable({
        
        dom: 'Bfrtip',
        buttons: ['excel'],
        "searching": true,
        "ordering": true,
        "paging": true,
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": true,
        "processing": false,
        "lengthChange": false,
        "info": false,

        "ajax": {
            "url": "../controllers/controller_listar_procesos.php",
            "type": "POST"
        },

        "columns": [
            { "data": "id" },
            { "data": "objeto" },
            { "data": "descripcion" },
            { "data": "fechaInicio" },
            { "data": "fechaCierre" },
            {
                "data": "estado",
                render: function (data) {
                    if (data == '1') {
                        return "<span class='badge bg-primary'>Activo</span>"
                    } else if (data == '2') {
                        return "<span class='badge bg-success'>Publicado</span>"
                    } else if (data == '3') {
                        return "<span class='badge bg-danger'>Evaluacion</span>"
                    }
                }
            },
            {
                "defaultContent":
                    "<button style='font-size:13px;' type='button' class='publicar btn btn-primary'>Publicar</i></button><button style='font-size:13px;' type='button' class='subirArchivos btn btn-success'>Subir Documentacion</button>"
            }
        ],
        select: true
    });
    $('.dataTables_filter').hide();
 
    $('#inputIdCerrada').on('keyup', function() {
        table_consultar.search(this.value).draw();

    });

    $('#inputObjetoDescripcion').on('keyup', function() {
        table_consultar.search(this.value).draw();
    });
}

//Funcion boton de DataTable de cambio de estado "PUBLICAR" 
$('#tabla_consulta_Procesos').on('click', '.publicar', function () {

    if (table_consultar.row(this).child.isShown()) {
        var nuevoEstado = table_consultar.row(this).data().id;
    } else {
        var nuevoEstado = table_consultar.row($(this).parents('tr')).data().id;
    }
    Swal.fire({
        title: '¿Seguro desea publicar este proceso?',
        text: "Una vez hecho esto, se activara en el rango de horas programado",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {

        if (result.value) {
            modificar_estatus_proceso(nuevoEstado, 2);
            Swal.fire(
                'Publicado',
                '¡El proceso ha sido pubicado!',
                'success'
            )
        }
    })

})
//Complemento proceso de modificacion de estado del proceso 
function modificar_estatus_proceso(id, nuevoEstado) {

    $.ajax({
        "url": "../controllers/controller_modificar_estatus_proceso.php",
        type: "POST",
        data: {
            id: id,
            nuevoEstado: nuevoEstado
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                dataTableConsultar();
            } else {
                Swal.fire("Mensaje De Advertencia", 'No se pudo cambiar el estado del proceso', "warning")
            }
        }
    })
}
// FUNCION PARA EDITAR REGISTRO - pendiente
$('#tabla_consulta_Procesos').on('click', '.subirArchivos', function () {

    //levantar modal
    AbrirModalCargueArchivos();


})
