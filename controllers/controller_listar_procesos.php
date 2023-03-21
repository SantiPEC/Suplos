<?php
    require '../models/models_listar_procesos.php';

    $MU = new models_listar_procesos();
    $consulta = $MU->listar_procesos();
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
