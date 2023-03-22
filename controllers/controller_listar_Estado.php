<?php
    require '../models/models_listar_Estado.php';

    //instancia una nueva funcion de listarEstado
    $MU = new models_listar_Estado();
    //se genera variable consulta, la cual envia al modelo y requiere la funcion listarEstado
    $consulta = $MU->listarEstado();
    echo json_encode($consulta);
?>