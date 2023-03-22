<?php

    require '../models/models_crear_Proceso.php';
    $MU = new models_crear_Proceso();

     //instancia una nueva funcion de models_crear_Proceso
     //se valida en la funcion insertarArchivos el id del proceso y se enlistan los archivos a cargar
    $consulta = $MU->insertArchivos(
        $_POST['idPro'],
        $_FILES['inputVariosArchivos']['name']
    );
    //se indica la variable con los archivos a cargar
        $fileContent = file_get_contents($_FILES['inputVariosArchivos']['tmp_name']);
    //se denimina la carpeta a guardar y el nombre de los archivos
        file_put_contents("../Documentacion/procesos/".$_FILES['inputVariosArchivos']['name'],$fileContent);
        
        echo $consulta;
?>