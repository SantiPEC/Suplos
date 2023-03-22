<?php
    require '../models/models_cambio_estado.php';

    //instancia una nueva funcion de models_cambio_estado
    $MU = new models_cambio_estado();
    
    //recibe la data de la vista y la envia al modelo
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $nuevoEstado = htmlspecialchars($_POST['nuevoEstado'],ENT_QUOTES,'UTF-8');

    //funcion para cambiar de estado si la fecha actual es mayor a la cierre ESTADO = EVALUADO
    $proceso = $MU->verHoraCierre($id);
    if ($proceso['fechaCierre']<date("Y-m-d hh-mm-ss")) {
        $nuevoEstado = '3';
    }
    //se genera variable consulta, la cual envia al modelo y requiere la funcion cambiarEstatus
    $consulta = $MU->cambiarEstatus($id,$nuevoEstado);
    echo $consulta;

?>