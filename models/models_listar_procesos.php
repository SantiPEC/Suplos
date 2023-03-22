<?php

    class models_listar_procesos{
        private $conexion;
        
        function __construct(){
            require_once "conexion.php";

        }
        /*Lista los procesos y los envia a la datatable
         va anidada la consulta del select para filtrar por estados para su posterior funcionalidad de exportar a excel */
        function listar_procesos($selectEstado){
            if ($selectEstado == '0') {
                $mostrarEstado = '';
            }else{
                $mostrarEstado = "WHERE estado = ".$selectEstado;
            }
            $h = new conexion();
            $h->conectar();
            $sql =$h->consulta("SELECT
                                    p.id, 
                                    p.objeto,
                                    p.descripcion,
                                    p.presupuesto, 
                                    p.fechaInicio, 
                                    p.horaInicio, 
                                    p.fechaCierre, 
                                    p.horaCierre, 
                                    p.estado, 
                                    m.tipoMoneda, 
                                    pr.nombre_Producto
                                FROM
                                    proceso AS p
                                    INNER JOIN
                                    moneda AS m
                                    ON 
                                        (p.moneda = m.id)
                                    INNER JOIN
                                    producto AS pr
                                    ON 
                                        (p.actividad = pr.id) $mostrarEstado ");

            while ($consulta_VU = mysqli_fetch_array($sql)) {
                $data['data'][]=$consulta_VU;
            }

                return $data;
        }
    }


?>