<?php
    require '../models/models_crearProceso.php';

    $MU = new models_crearProceso();
    $consulta = $MU->listarActividad();
    echo json_encode($consulta);
?>