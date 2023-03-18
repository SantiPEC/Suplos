<?php

class conexion{
private $servername;
private $database;
private $username;
private $password;

public function __construct(){
    $this->servername = "localhost";
    $this->database = "suplos";
    $this->username = "root";
    $this->password = "";
}

function conectar(){
    $this->conexion = new mysqli($this->servername,$this->username,$this->database,$this->password);
    $this->conexion-> set_charset("utf8");
}

function cerrar(){
    $this->conexion->close();
}
}
?>