<?php

require_once "Clases/Datos/BLL.php";

class ClsTickets{
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
    private $idTicket;
    private $asunto;
    private $estatus;
    private $origen;
    private $tipoDestino;
    private $destino;
    private $fecha;


    public function getIdTicket(){
        return $this->idTicket;
    }
    public function setIdTicket($value =NULL){
        $this->idTicket=$value;
    }
    
    public function getAsunto(){
        return $this->asunto;
    }
    public function setAsunto($value =NULL){
        $this->asunto=$value;
    }
    
    public function getEstatus(){
        return $this->estatus;
    }
    public function setEstatus($value =NULL){
        $this->estatus=$value;
    }
    
    public function getOrigen(){
        return $this->origen;
    }
    public function setOrigen($value =NULL){
        $this->origen=$value;
    }
    
    public function getTipoDestino(){
        return $this->tipoDestino;
    }
    public function setTipoDestino($value =NULL){
        $this->tipoDestino=$value;
    }
    
    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($value =NULL){
        $this->destino=$value;
    }
    
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($value =NULL){
        $this->fecha=$value;
    }
    
    public function insertaTicket(){
        $comandoSql="insert into oprTicket (asunto, origen, tipoDestino, destino) "
                . "values (?,?,?,?)";
        $params = array($this->asunto, $this->origen, $this->tipoDestino, $this->destino);
        $arr = $this->objBLL->insertaDatos($comandoSql, $nReg, "sisi", $params);
        return $nReg;
    }
    public function modificaEstatus(){
        $comandoSql = "update oprTicket set estatus = ? where idTicket = ?";
        $params = array($this->estatus, $this->idTicket);
        $arr = $this->objBLL->insertaDatos($comandoSql, $nReg, "si", $params);
        return $nReg;
    }

    public function obtenerTickets(){
        $comandoSql = "select * from oprTicket";
        $arr = $this->objBLL->seleccionaDatos($comandoSql, $nReg);
        return $arr;
    }
    public function obtineTicket(){
        $comandoSql = "select * from oprTicket where idTicket=?";
        $params = array($this->idTicket);
        $arr = $this->objBLL->seleccionaDatos($comandoSql, $nReg, "i", $params);
        return $arr;
    }

    public function  obtieneTicketsXOrigen(){
        $comandoSql = "select * from oprTicket where origen = ?";
        $params = array($this->origen);
        $arr = $this->objBLL->seleccionaDatosPar($comandoSql, $nReg, "i", $params);
        return $arr;
    }
    public function ObtieneTicketsXDestinoArea(){
        $comandoSql="select * from oprTicket where tipoDestino = 'area' and destino = ?";
        $params = array($this->destino);
        $arr = $this->objBLL->seleccionaDatosPar($comandoSql, $nReg, "i", $params);
        return $arr;
    }
    public function ObtieneTicketsXDestinoDepto(){
        $comandoSql="select * from oprTicket where tipoDestino = 'departamento' and destino = ?";
        $params = array($this->destino);
        $arr = $this->objBLL->seleccionaDatosPar($comandoSql, $nReg, "i", $params);
        return $arr;
    }
    public function ObtieneTicketsXDestinoUsu(){
        $comandoSql="select * from oprTicket where tipoDestino = 'usuario' and destino = ?";
        $params = array($this->destino);
        $arr = $this->objBLL->seleccionaDatosPar($comandoSql, $nReg, "i", $params);
        return $arr;
    }
    
}
?>

