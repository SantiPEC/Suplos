<?php

    class models_listar_Actividad{
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

    }


?>