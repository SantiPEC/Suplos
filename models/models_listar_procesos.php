<?php

    class models_listar_procesos{
        private $conexion;
        
        function __construct(){
            require_once "conexion.php";

        }
        function listar_procesos(){
            $h = new conexion();
            $h->conectar();
            $sql =$h->consulta("SELECT id, objeto, descripcion, fechaInicio, fechaCierre, estado 
                                FROM proceso");
            while ($consulta_VU = mysqli_fetch_array($sql)) {
                $data['data'][]=$consulta_VU;
            }

                return $data;
        }
    }


?>