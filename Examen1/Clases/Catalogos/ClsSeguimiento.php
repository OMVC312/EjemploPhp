<?php

require_once "Clases/Datos/BLL.php";

class ClsSeguimiento{
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
    private $idSeguimiento;
    private $ticket;
    private $estatus;
    private $usuario;
    private $observaciones;
    private $fecha;


    public function getIdSeguimiento(){
        return $this->idSeguimiento;
    }
    public function setIdSeguimiento($value =NULL){
        $this->idSeguimiento=$value;
    }
    
    public function getTicket(){
        return $this->ticket;
    }
    public function setTicket($value =NULL){
        $this->ticket=$value;
    }
    
    public function getEstatus(){
        return $this->estatus;
    }
    public function setEstatus($value =NULL){
        $this->estatus=$value;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($value =NULL){
        $this->usuario=$value;
    }
    
    public function getObservaciones(){
        return $this->observaciones;
    }
    public function setObservaciones($value =NULL){
        $this->observaciones=$value;
    }
    
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($value =NULL){
        $this->fecha=$value;
    }
    
    public function insertaSeguimientoNew(){
        $comandoSql="insert into oprSeguimiento (ticket, usuario, observaciones) "
                . "values (?,?,?)";
        $params = array($this->ticket, $this->usuario, $this->observaciones);
        $arr = $this->objBLL->insertaDatos($comandoSql, $nReg, "iis", $params);
        return $nReg;
    }
    public function insertaSeguimientoOld(){
        $comandoSql="insert into oprSeguimiento (ticket, estatus, usuario, observaciones) "
                . "values (?,?,?,?)";
        $params = array($this->ticket, $this->estatus, $this->usuario, $this->observaciones);
        $arr = $this->objBLL->insertaDatos($comandoSql, $nReg, "isis", $params);
        return $nReg;
    }

    public function obtenerSeguimiento(){
        $comandoSql = "select * from oprSeguimiento";
        $arr = $this->objBLL->seleccionaDatos($comandoSql, $nReg);
        return $arr;
    }
    public function  obtieneSeguimientoTicket(){
        $comandoSql = "select * from oprSeguimiento where ticket = ?";
        $params = array($this->ticket);
        $arr=  $this->objBLL->seleccionaDatosPar($comandoSql, $nReg, "i", $params);
        return $arr;
    }
    
}
?>

