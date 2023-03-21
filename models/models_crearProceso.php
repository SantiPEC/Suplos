<?php

    class models_crear_Proceso{
        private $conexion;
        
        function __construct(){
            require_once "conexion.php";

        }
        function guardaProceso($objeto,$actividad,$descripcion,$moneda,$presupuesto,$fechaInicio,
        $horaInicio,$fechaCierre,$horaCierre){
            $h = new conexion();
            $h->conectar();
            $insert =$h->consulta("INSERT INTO proceso(objeto,actividad,descripcion,moneda,presupuesto,fechaInicio,
            horaInicio,fechaCierre,horaCierre) VALUES ('$objeto',$actividad,'$descripcion',$moneda,$presupuesto,'$fechaInicio',
            '$horaInicio','$fechaCierre','$horaCierre')");
            

            if($insert){
                return 1;
            }else{
                return 0;
            }
        }
    }


?>