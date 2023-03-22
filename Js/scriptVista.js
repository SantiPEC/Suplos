//Declaramos variable que contendra la datatable 
var table_consultar;

//funcion que permite al hacer onclick acceder a los eventos-modales para registrar, consultar
function accederEventos() {
    $("#eventos").html('<button type="button" class="btn btn-primary" data-toggle="modal" onclick="modalRegistro();">Crear</button><button type="button" class="btn btn-primary" id="copiarProceso">Copiar</button><button type="button" class="btn btn-primary" id="consultarProceso" onclick="modalConsulta();">Consultar</button>')
    $('#acceder').hide();
}

//funcion onclick que Abre modal para registrar procesos, se inicializa el Bs-Stepper que se uso en este modal
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

//funcion onclick que Abre modal para subir documentos
function AbrirModalCargueArchivos() {
    $("#modalCargaArchivos").modal({ backdrop: 'static', keyboard: false })
    $("#modalCargaArchivos").modal('show');
}
//funcion onclick que abre modal que contiene los inputs para realizar consultas
function modalConsulta() {
    $("#modalConsulta").modal({ backdrop: 'static', keyboard: false })
    $("#modalConsulta").modal('show');
}

//funcion para pasar entre los formularios de registro
//informacion basica del proceso - cronograma del proceso}
function verFormularioRegistro(id) {

    //al hacer clic abre modal de informacion basica del proceso
    if (id == 1) {

        $('#formInfoBasica').show();
        $('#formCronograma').hide();

        //al hacer clic abre modal de cronograma del proceso
    } else if (id == 2) {

        $('#formInfoBasica').hide();
        $('#formCronograma').show();

    }

}

//lista los productos-actividades en el select de actividad
function listarActividad() {

    $.ajax({
        url: '../controllers/controller_listar_Actividad.php',
        type: 'POST',

    }).done(function (resp) {
        var data = JSON.parse(resp);
        //valor por defecto
        var cadena = "<option value='0'>Seleccione</option>";
        if (data.length > 0) {
            //se lee la informacion traida por el controlador
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i]['id'] + "'>" + data[i]['nombre_Producto'] + "</option>";

            }
            $("#selectActividad").html(cadena);
        } else {
            //si no datos disponibles
            cadena += "<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#selectActividad").html(cadena);
        }
    })
}

//funcion que nos lista en el select las opciones posibles de moneda
function listarMoneda() {

    $.ajax({
        url: '../controllers/controller_listar_Moneda.php',
        type: 'POST',

    }).done(function (resp) {
        var data = JSON.parse(resp);
        //valor por defecto
        var cadena = "<option value='0'>Seleccione</option>";
        //se lee la informacion traida por el controlador
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i]['id'] + "'>" + data[i]['tipoMoneda'] + "</option>";

            }
            $("#selectMoneda").html(cadena);
        } else {
            //si no datos disponibles
            cadena += "<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#selectMoneda").html(cadena);
        }
    })
}

//funcion que nos lista en el select los valores posibles a buscar en el modal de consulta
function listarEstado() {

    $.ajax({
        url: '../controllers/controller_listar_Estado.php',
        type: 'POST',

    }).done(function (resp) {
        var data = JSON.parse(resp);
        //valor por defecto
        var cadena = "<option value='0'>TODOS</option>";
        if (data.length > 0) {
            //se lee la informacion traida por el controlador
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i]['id'] + "'>" + data[i]['tipoEstado'] + "</option>";

            }
            $("#selectEstadoProceso").html(cadena);
        } else {
            //si no datos disponibles
            cadena += "<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#selectEstadoProceso").html(cadena);
        }
    })
}

//funcion para guardar procesos e ingresar a la base de datos
function guardaProceso() {

    //se instancian las variables que almacenaran los datos de la vista
    var objeto = $("#inputObjeto").val();
    var actividad = $("#selectActividad").val();
    var descripcion = $("#inputDescripcion").val();
    var moneda = $("#selectMoneda").val();
    var presupuesto = $("#inputPrespuesto").val();
    var fechaInicio = $("#dateFechaInicio").val();
    var horaInicio = $("#timeHoraInicio").val();
    var fechaCierre = $("#dateFechaFin").val();
    var horaCierre = $("#timeHoraFin").val();

    //se valida que no esten vacios los campos
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
        //en caso de que esten vacios los campos, envia aviso a pantalla
        return swal.fire("Mensaje De Advertencia", "Porfavor llene los campos vacios", "warning");
    }
    //se valida que las fechas de inicio del cronograma no sea mayor a la fecha de cierre
    //se envia mensaje en caso de que esto suceda
    if (fechaInicio > fechaCierre) {
        return swal.fire("Mensaje De Advertencia", "La Fecha de Inicio no puede ser mayor a la Fecha de Finalizacion", "warning");
    }
    // se envia la data al controlador para darle manejo
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
        if (resp > 0) {
            if (resp == 1) {
                //si resultado exitoso limpia los modales y los cierra
                limpiarRegistroProceso();
                $("#modalRegistro").modal('hide');
                //mensanje de registro extioso
                Swal.fire("Mensaje De Confirmacion", 'Registro realizado', "success").then((value) => {
                    table_consultar.ajax.reload();

                });
            } else {
                //mensaje de error en caso de algun fallo en la peticion
                Swal.fire("Mensaje De Error", 'No se pudo completar el Registro', "error");
            }
        }
    })

}

//funcion para limpiar los campos de los modales de info basica y cronograma
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
}

//funcion para ocultar la datatable por defecto hasta que se detecte el onclick al boton de "buscar" en el modal
function ocultarDataTableConsultar() {
    var x = document.getElementById("ocultar");
    if (x.style.display === "none") {
        x.style.display = "block"; style = "width:100%";
    } else {
        x.style.display = "none";
    }
}
//datatable con la lista de procesos, conteniendo las columnas solicitadas
function dataTableConsultar() {
    //se crea una variable para el select de estado de procesos, que recibira la informacion de la vista
    var selectEstado = $('#selectEstadoProceso').val();
    //se inicializa la variable global de tabla y se le asigna el id de la vista, se inicia la funcion .DataTable
    table_consultar = $('#tabla_consulta_Procesos').DataTable({

        /*se ocultan las columnas de
        actividad
        moneda
        presupuesto
        hora inicio
        hora cierre
        */
        "columnDefs": [
            {
                "targets": [2, 4, 5, 7, 9],
                "visible": false,
                "searchable": false
            }],

        //se habilita la opcion de las DataTable para exportar el excel
        "dom": 'Bfrtip',
        "buttons": [{
            extend: 'excel',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
            }
        }],
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

        //se envia la peticion al controlador
        "ajax": {
            "url": "../controllers/controller_listar_procesos.php",
            "type": "POST",
            data: {
                selectEstado: selectEstado
            }
        },
        //se les asigna el valor a las columnas del datatable
        "columns": [
            { "data": "id" },
            { "data": "objeto" },
            { "data": "nombre_Producto" },
            { "data": "descripcion" },
            { "data": "tipoMoneda" },
            { "data": "presupuesto" },
            { "data": "fechaInicio" },
            { "data": "horaInicio" },
            { "data": "fechaCierre" },
            { "data": "horaCierre" },
            {
                "data": "estado",
                //se indica por medio de un contenedor el estado de los procesos 
                render: function (data) {
                    if (data == '1') {
                        return "<span class='badge bg-primary'>ACTIVO</span>"
                    } else if (data == '2') {
                        return "<span class='badge bg-success'>PUBLICADO</span>"
                    } else if (data == '3') {
                        return "<span class='badge bg-danger'>EVALUACION</span>"
                    }
                }
            },
            {
                //se inicializan los botones de publicar y subir documentacion
                "defaultContent":
                    "<button style='font-size:13px;' type='button' class='publicar btn btn-primary'>Publicar</i></button><button style='font-size:13px;' type='button' class='subirArchivos btn btn-success'>Subir Documentacion</button>"
            }
        ],
        select: true
    });
    //se oculta filtro por defecto de la datatable
    $('.dataTables_filter').hide();

    /*mediante la funcion keyup se habilita el input IdCerrada
     para que busque en la datatable de acuerdo a lo que ingresen en el input
     asi mismo para que su consulta solo aplique en la columna del ID  */
    $('#inputIdCerrada').on('keyup', function () {
        table_consultar.columns(0).search(this.value).draw();

    });
    /*mediante la funcion keyup se habilita el input ObjetoDescripcion
     para que busque en la datatable de acuerdo a lo que ingresen en el input
     asi mismo para que busque directamente en las columnas objeto y descripcion  */
    $('#inputObjetoDescripcion').on('keyup', function () {
        table_consultar.columns(1, 3).search(this.value).draw();
    });
}

//Funcion boton de DataTable de cambio de estado "PUBLICAR" 
$('#tabla_consulta_Procesos').on('click', '.publicar', function () {
    //se recibe el id del proceso 
    if (table_consultar.row(this).child.isShown()) {
        var nuevoEstado = table_consultar.row(this).data().id;
    } else {
        var nuevoEstado = table_consultar.row($(this).parents('tr')).data().id;
    }
    //modal de aviso en pantalla para confirmar o cancelar la peticion
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
        /* se le asigna el nuevo valor al estado
        en este caso 2 ya que es el definido como estado "PUBLICADO"*/
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
    //se envia la peticion al controlador
    $.ajax({
        "url": "../controllers/controller_modificar_estatus_proceso.php",
        type: "POST",
        data: {
            //se recibe id del proceso y el nuevo estado
            id: id,
            nuevoEstado: nuevoEstado
        }
    }).done(function (resp) {
        //si la peticion es correcta, se actualiza en la datatable
        if (resp > 0) {
            if (resp == 1) {
                dataTableConsultar();
            } else {
                //si no es correcta, se envia mensaje        
                Swal.fire("Mensaje De Advertencia", 'No se pudo cambiar el estado del proceso', "warning")
            }
        }
    })
}
// Funcion de boton para cargar documentacion
$('#tabla_consulta_Procesos').on('click', '.subirArchivos', function () {
    //se tome el id del proceso
    if (table_consultar.row(this).child.isShown()) {
        var idProceso = table_consultar.row(this).data().id;
    } else {
        var idProceso = table_consultar.row($(this).parents('tr')).data().id;
    }
    //levantar modal de cargue de archivos
    AbrirModalCargueArchivos();

    /*se recibe por medio de un input:hidden 
    el id del proceso y se le asigna a la variable */
    $('#idPro').val(idProceso);


})

//Funcion que recibe el onclick del boton "Agregar contenido" en la vista
$(function () {
    $('#btnSubirArchivos').on('click', function (e) {
        e.preventDefault();
        //se construye un nuevo FormData y se le indexa el idProceso y los archivos
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('inputVariosArchivos', $('#inputVariosArchivos')[0].files[0]);
        paqueteDeDatos.append('idPro', $('#idPro').prop('value'));

        //se envia peticion al controlador
        $.ajax({
            url: "../controllers/controller_subir_Archivos.php",
            type: 'POST',
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false,
            success: function (resultado) {
                //si se cargan correctamente - mensaje de exito
                if (resultado == 1) {
                    Swal.fire("Mensaje De Confirmacion", 'Archivo cargado con exito', "success").then((value) => {

                    });
                    //se cierra el modal de cargue de archivos
                    $("#modalCargaArchivos").modal('hide');
                } else {
                    //en caso de erorr, muestra mensaje informativo
                    Swal.fire({
                        icon: 'error',
                        title: '<div class="animate_animated animate_hinge mb-5">Algo ha fallado</div>',
                        html: data.respuesta
                    })
                }
            },
            //si hay un erro en la funcion muestra mensaje informativo
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: '<div class="animate_animated animate_hinge mb-5">Algo ha fallado</div>',
                    html: data.respuesta
                })
            }
        });
    });
});