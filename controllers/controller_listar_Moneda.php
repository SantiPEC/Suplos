<?php
    require '../models/models_listar_Moneda.php';

    $MU = new models_listar_Moneda();
    $consulta = $MU->listarMoneda();
    echo json_encode($consulta);
?>