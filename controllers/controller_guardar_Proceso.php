<?php
    require '../models/models_crearProceso.php';

    $MU = new models_crear_Proceso();
    
    $objeto = htmlspecialchars($_POST['objeto'],ENT_QUOTES,'UTF-8');
    $actividad = htmlspecialchars($_POST['actividad'],ENT_QUOTES,'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'],ENT_QUOTES,'UTF-8');
    $moneda = htmlspecialchars($_POST['moneda'],ENT_QUOTES,'UTF-8');
    $presupuesto = htmlspecialchars($_POST['presupuesto'],ENT_QUOTES,'UTF-8');
    $fechaInicio = htmlspecialchars($_POST['fechaInicio'],ENT_QUOTES,'UTF-8');
    $horaInicio = htmlspecialchars($_POST['horaInicio'],ENT_QUOTES,'UTF-8');
    $fechaCierre = htmlspecialchars($_POST['fechaCierre'],ENT_QUOTES,'UTF-8');
    $horaCierre = htmlspecialchars($_POST['horaCierre'],ENT_QUOTES,'UTF-8');
    
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