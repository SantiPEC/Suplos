<?php

    class models_listar_Estado{
        private $conexion;
        
        function __construct(){
            require_once "conexion.php";

        }
        //consulta que transmite al select de la vista los estados disponibles
        function listarEstado(){
            $h = new conexion();
            $h->conectar();
            $sql =$h->consulta("SELECT id,tipoEstado FROM estado");

            while ($consulta_VU = mysqli_fetch_array($sql)) {
                $arreglo[]=$consulta_VU;
            }

                return $arreglo;
        }

    }


?>