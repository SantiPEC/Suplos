<?php
    require '../models/models_listar_Actividad.php';

    $MU = new models_listar_Actividad();
    $consulta = $MU->listarActividad();
    echo json_encode($consulta);
?>