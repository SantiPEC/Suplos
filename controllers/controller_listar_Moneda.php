<?php
    require '../models/models_listar_Moneda.php';

    //instancia una nueva funcion de models_listar_Moneda
    $MU = new models_listar_Moneda();
    //se genera variable consulta, la cual envia al modelo y requiere la funcion listarMoneda

    $consulta = $MU->listarMoneda();
    echo json_encode($consulta);
?>