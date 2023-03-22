<?php
    require '../models/models_listar_procesos.php';
     
    //se idica la variable del estado a consultar de acuerdo a lo recibido por el select
    $selectEstado = htmlspecialchars($_POST['selectEstado'],ENT_QUOTES,'UTF-8');

    //instancia una nueva funcion de models_listar_procesos
    $MU = new models_listar_procesos();
    //se genera variable consulta, la cual envia al modelo y requiere la funcion listar_procesos
    $consulta = $MU->listar_procesos($selectEstado);
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
