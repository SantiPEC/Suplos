<?php

    class models_crear_Proceso{
        private $conexion;
        
        function __construct(){
            require_once "conexion.php";

        }
         //Funcion para guardar los datos en la tabla procesos 
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
         /*Funcion para insertar los archivos en la tabla documentacion
            la cual va tambien con el id del proceso al que pertenece el archivo cargado */
        function insertArchivos($idProceso,$archivo){
            $h = new conexion();
            $h->conectar();
            $insert =$h->consulta("INSERT INTO documentacion (idProceso,nombreArchivo) VALUES ($idProceso,'$archivo')");
            
            if($insert){
                return 1;
            }else{
                return 0;
            }
        }
    }


?>