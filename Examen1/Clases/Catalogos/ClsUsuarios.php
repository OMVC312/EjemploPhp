<?php

require_once "Clases/Datos/BLL.php";

class ClsUsuarios{
    public function __construct() {
        $this->objBLL = new BLL();
    }
    
    //Propiedades
    private $objBLL;
    public function getObjBLL(){
        return $this->objBLL;
    }
    public function setObjBLL($value = NULL){
        $this->objBLL=$value;
    }
    private $idUsuario;
    private $nombreUsu;
    private $usuario;
    private $password;
    private $departamento;
    private $area;
    private $correo;
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($value =NULL){
        $this->idUsuario=$value;
    }
    
    public function getNombreUsu(){
        return $this->nombreUsu;
    }
    public function setNombreUsu($value =NULL){
        $this->nombreUsu=$value;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($value =NULL){
        $this->usuario=$value;
    }
    
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($value =NULL){
        $this->password=$value;
    }
    
    public function getDepartamento(){
        return $this->departamento;
    }
    public function setDepartamento($value =NULL){
        $this->departamento=$value;
    }
    
    public function getArea(){
        return $this->area;
    }
    public function setArea($value =NULL){
        $this->area=$value;
    }
    
    public function getCorreo(){
        return $this->correo;
    }
    public function setCorreo($value =NULL){
        $this->correo=$value;
    }
    
    public function obtenerUsuarios(){
        $comandoSql = "select * from ctlUsuarios";
        $arr = $this->objBLL->seleccionaDatos($comandoSql, $nReg);
        return $arr;
    }
    public function  obtieneNombreUsu(){
        $comandoSql = "select * from ctlUsuarios where nombreUsu=?";
        $params = array($this->nombreUsu);
        $arr=  $this->objBLL->seleccionaDatosPar($comandoSql, $nReg, "s", $params);
        return $arr;
    }
    public function validaUsuarios(){
        $comandoSql="select * from ctlUsuarios where usuario=? and pass=?";
        $params = array($this->usuario,  $this->password);
        $arr = $this->objBLL->seleccionaDatosPar($comandoSql, $nReg, "ss", $params);
        return $arr;
    }
}
?>

