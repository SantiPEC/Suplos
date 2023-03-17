<?php

    class models_crearProceso{
        private $conexion;
        public $data;

        function listarActividad(){
            $conn = conectar();     
    
            $sql  = "SELECT id, nombre_Producto FROM producto";
            $query=mysqli_query($conn,$sql);

            $i = 0;
            $data = [];

            while ($row=mysql_fetch_array($query)) {
                
                $data[$i] = $row;
				$i++;
            }
            
            if($data>0){
                return $data;
            }else{
                return 0;
            }

    
    }

}

    