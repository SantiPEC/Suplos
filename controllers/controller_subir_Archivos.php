<?php

    require '../models/models_crearProceso.php';
    $MU = new models_crear_Proceso();
    
    function cargarArchivos();

        $files_post = $_FILES['archivos'];
        $files = array();
        $file_count = count($files_post['name']);
        $file_keys = array_keys($files_post);

        for ($i=0; $i < $file_count; $i++) { 
            
            foreach($file_keys as $key){
                $files[$i][$key] = $files_post[$key][$i];
            }

        }

        foreach ($files as $fileID => $file) {
            $fileContent = file_get_contents($file['tmp_name']);

            file_put_contents("../Documentacion/procesos/".$file['name'],$fileContent);
        }

?>