<?php
    require '../models/models_crearProceso.php';

    $MU = new models_crearProceso();
    $consulta = $MU->listarActividad();
    if($consulta){
        echo json_encode($consulta);
    }else {
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }
