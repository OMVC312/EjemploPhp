<?php
require_once ('DALAbs.php');
require_once 'phpConfiguracion.php';

class DAL extends DALAbs{
    #CONSTRUCTOR
    public function __construct() {
        if ($this->servidor == NULL) $this->servidor=SERVIDOR;
        if ($this->bd == NULL) $this->bd=BD;
        if ($this->usuario == NULL) $this->usuario=USUARIO;
        if ($this->password == NULL) $this->password=PASSWORD;
    }
    public function getServidor() {
        return $this->servidor;
    }
    public function setServidor($value = NULL) {
        $this->servidor=$value;
    }
    public function getBD() {
        return $this->bd;
    }
    public function setBD($value = NULL){
        $this->bd = $value;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($value = NULL){
        $this->usuario = $value;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($value = NULL){
        $this->password = $value;
    }
    
    public function getConexion(){
        if ($this->conexion==NULL)
            $this->OpenCnn();
        return $this->conexion;
    }
    
    #MÉTODOS DE ACCESO A DATOS
    public function openCnn(){
        try{
            if($this->servidor != NULL && $this->bd != NULL && $this->usuario != NULL){
                echo $this->password;
                $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->bd);
                if($this->conexion->connect_error){
                    trigger_error("Error de conexion", E_USER_ERROR);
                    throw new Exception("Error de conexion", $this->conexion->connect_error);
                }
            }
        } catch (Exception $ex) {
            $this->conexion = NULL;
        }
    }
    public function closeCnn(){
        mysqli($this->conexion);
    }
}
?>

