<?php

    class models_crearProceso{
        private $conexion;
        
        function __construct(){
            require_once "conexion.php";

        }
        function listarActividad(){
            $h = new conexion();
            $h->conectar();
            $sql =$h->consulta("SELECT id,nombre_Producto FROM producto");

            while ($consulta_VU = mysqli_fetch_array($sql)) {
                $arreglo[]=$consulta_VU;
            }

                return $arreglo;
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