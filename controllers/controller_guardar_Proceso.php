<?php
    require '../models/models_crear_Proceso.php';

    //instancia una nueva funcion de crear proceso
    $MU = new models_crear_Proceso();
    //recibe la data de la vista y la envia al modelo
    $objeto = htmlspecialchars($_POST['objeto'],ENT_QUOTES,'UTF-8');
    $actividad = htmlspecialchars($_POST['actividad'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $moneda = htmlspecialchars($_POST['moneda'],ENT_QUOTES,'UTF-8');
    $presupuesto = htmlspecialchars($_POST['presupuesto'],ENT_QUOTES,'UTF-8');
    $fechaInicio = htmlspecialchars($_POST['fechaInicio'],ENT_QUOTES,'UTF-8');
    $horaInicio = htmlspecialchars($_POST['horaInicio'],ENT_QUOTES,'UTF-8');
    $fechaCierre = htmlspecialchars($_POST['fechaCierre'],ENT_QUOTES,'UTF-8');
    $horaCierre = htmlspecialchars($_POST['horaCierre'],ENT_QUOTES,'UTF-8');

    //se genera variable consulta, la cual envia al modelo y requiere la funcion guardaProceso
    $consulta = $MU->guardaProceso(
                        $objeto,
                        $actividad,
                        $descripcion,
                        $moneda,
                        $presupuesto,
                        $fechaInicio,                        
                        $horaInicio,
                        $fechaCierre,
                        $horaCierre);

    echo $consulta;
?>