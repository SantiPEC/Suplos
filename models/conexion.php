<?php

class conexion{
    private $localhost = "localhost";    
    private $usuario = "root";
    private $password = "";
    private $database = "suplos";

    public function conectar()
    {
        if(!isset($this->conexion)){
            $this->conexion = (mysqli_connect($this->localhost, $this->usuario,$this->password,  $this->database)) or die(mysqli_error() );
            mysqli_set_charset($this->conexion, 'utf8');
            mysqli_select_db($this->conexion,$this->database) or die(mysqli_error());      
        }
    }  
     // METODO PARA REALIZAR UNA CONSULTA 
    // INPUT: $q -> consulta
    // OUTPUT: $result
    public function consulta($q)
    {
        $resultado = mysqli_query($this->conexion,$q);
        if(!$resultado){
        
        exit;
        }
        return $resultado; 
    }
    #__________________________
    // METODO PARA CONTAR EL NUMERO DE FILAS DEVUELTAS
    // INPUT: $r
    // OUTPUT: numero de filas 
    function numero_de_filas($result){
    if(!is_resource($result)) 
                return false;
    return mysqli_num_rows($result);
    }   

}
?>