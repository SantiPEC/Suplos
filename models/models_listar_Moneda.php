<?php

    class models_listar_Moneda{
        private $conexion;
        
        function __construct(){
            require_once "conexion.php";

        }
        function listarMoneda(){
            $h = new conexion();
            $h->conectar();
            $sql =$h->consulta("SELECT id,tipoMoneda FROM moneda");

            while ($consulta_VU = mysqli_fetch_array($sql)) {
                $arreglo[]=$consulta_VU;
            }

                return $arreglo;
        }

    }


?>