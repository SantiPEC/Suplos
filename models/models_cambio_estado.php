<?php

    class models_cambio_estado{
        private $conexion;
        
        function __construct(){
            require_once "conexion.php";

        }
        //Funcion para consultar fehca de cierre y hora de cierre, para proceder con la funcion de cambio de estatus 
        function verHoraCierre($id){
            $h = new conexion();
            $h->conectar();
            $sql =$h->consulta("SELECT fechaCierre,horaCierre FROM proceso WHERE id = $id");

            $consulta_VU = mysqli_fetch_array($sql);

            if($consulta_VU){
                return $consulta_VU;
            }else{
                return 0;
            }
        }
        //funcion para actualizar el proceso en la BD
        function cambiarEstatus($id,$nuevoEstado){
            $h = new conexion();
            $h->conectar();
            $sql =$h->consulta("UPDATE proceso 
                                SET estado = $nuevoEstado 
                                WHERE id=$id");

            if($sql){
                return 1;
            }else{
                return 0;
            }
        }

    }


?>