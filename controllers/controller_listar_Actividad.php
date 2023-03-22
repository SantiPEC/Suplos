<?php
    require '../models/models_listar_Actividad.php';

    //instancia una nueva funcion de listar actividad
    $MU = new models_listar_Actividad();
    
    //se genera variable consulta, la cual envia al modelo y requiere la funcion listarActividad
    $consulta = $MU->listarActividad();
    echo json_encode($consulta);
?>