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
                cadena +="<option value='" + data[i][0]+"'>" + data[i][1]+"</option>";
                
            }
            $("#selectActividad".html(cadena));
        } else {
            cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#selectActividad").html(cadena);
        }
    })
}
