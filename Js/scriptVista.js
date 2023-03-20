function accederEventos(){
    $("#eventos").html('<button type="button" class="btn btn-primary" data-toggle="modal" onclick="modalRegistro();">Crear</button><button type="button" class="btn btn-primary" id="copiarProceso">Copiar</button><button type="button" class="btn btn-primary" id="consultarProceso">Consultar</button>')
    $('#acceder').hide();
}
function modalRegistro(){
    $("#modalRegistro").modal({backdrop:'static',keyboard:false})
    $("#modalRegistro").modal('show');
    $(document).ready(function(){
        $("#modalRegistro").on('shown.bs.modal',function(){
        });   
        // inicimos wizzard
          // BS-Stepper Init
          window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      });
}
function verFormulario(id){

    //alert(id);

    if (id==1) {
        
        $('#formInfoBasica').show();
        $('#formCronograma').hide();
        $('#formDocumentacionOferta').hide();
    } else if (id==2) {
        
        $('#formInfoBasica').hide();
        $('#formCronograma').show();
        $('#formDocumentacionOferta').hide();

    } else if (id==3) {
        
        $('#formInfoBasica').hide();
        $('#formCronograma').hide();
        $('#formDocumentacionOferta').show();
    }

}

function listarActividad( ){
    console.log("entra");
    $.ajax({
        url: '../controllers/controller_listar_Actividad.php',
        type: 'POST',

    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena ="";
        if (data.length>0) {
            for (var i = 0; i < data.length; i++) {
                cadena +="<option value='" + data[i]['id']+"'>" + data[i]['nombre_Producto']+"</option>";
                
            }
            $("#selectActividad").html(cadena);
        } else {
            cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#selectActividad").html(cadena);
        }
    })
}
function guardaProceso(){
    
    var objeto = $("#inputObjeto").val();
    var actividad = $("#selectActividad").val();
    var descripcion = $("#inputDescripcion").val();
    var moneda = $("#selectMoneda").val();
    var presupuesto = $("#inputPrespuesto").val();
    var fechaInicio = $("#dateFechaInicio").val();
    var horaInicio = $("#timeHoraInicio").val();
    var fechaCierre =$("#dateFechaFin").val();
    var horaCierre = $("#timeHoraFin").val();


    if( objeto == '' ||
        actividad == '0' ||
        descripcion == '' ||
        moneda == '0' ||
        presupuesto == '' ||
        fechaInicio == '' ||
        horaInicio == '' ||
        fechaCierre == '' ||
        horaCierre == '' 


        ){
            return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
        }
    

    $.ajax({
        "url": "../controllers/controller_guardar_Actividad.php",
        "type": "POST",
        "data":{
            objeto:objeto,
            actividad:actividad,
            descripcion:descripcion,
            moneda:moneda,
            presupuesto:presupuesto ,
            fechaInicio:fechaInicio,
            horaInicio:horaInicio,
            fechaCierre:fechaCierre,
            horaCierre:horaCierre,
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            if(resp==1){
                
            $("#modalRegistro").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Registro realizado', "success").then((value)=>{
                table_cliente.ajax.reload();
                
            });
        }else{
            Swal.fire("Mensaje De Advertencia",'El proceso ya se encuentra creado', "warning");
        }
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar el Registro', "error");
        }
    })

}