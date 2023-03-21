<?php
    require '../models/models_listar_Estado.php';

    $MU = new models_listar_Estado();
    $consulta = $MU->listarEstado();
    echo json_encode($consulta);
?>