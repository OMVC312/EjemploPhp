<?php

require_once "Clases/Datos/BLL.php";

class ClsBitacora{
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
    private $idBitacciones;
    private $usuario;
    private $accion;
    private $fecha;


    public function getIdBitacciones(){
        return $this->idBitacciones;
    }
    public function setIdBitacciones($value =NULL){
        $this->idBitacciones=$value;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($value =NULL){
        $this->usuario=$value;
    }
    
    public function getAccion(){
        return $this->accion;
    }
    public function setAccion($value =NULL){
        $this->accion=$value;
    }
    
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($value =NULL){
        $this->fecha=$value;
    }
    
    public function insertaBitacora(){
        $comandoSql="insert into bitacciones (usuario, accion) values (?,?)";
        $params = array($this->usuario, $this->accion);
        $arr = $this->objBLL->insertaDatos($comandoSql, $nReg, "is", $params);
        return $nReg;
    }

    public function obtenerBitacoraDesc(){
        $comandoSql = "select * from bitacciones order by fecha desc";
        $arr = $this->objBLL->seleccionaDatos($comandoSql, $nReg);
        return $arr;
    }
    public function obtenerBitacoraAsc(){
        $comandoSql = "select * from bitacciones order by fecha";
        $arr = $this->objBLL->seleccionaDatos($comandoSql, $nReg);
        return $arr;
    }
    
}
?>

