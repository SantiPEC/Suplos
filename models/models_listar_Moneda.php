<?php

    class models_listar_Moneda{
        private $conexion;
        
        function __construct(){
            require_once "conexion.php";

        }
        //consulta que transmite al select de la vista las monedas disponibles
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