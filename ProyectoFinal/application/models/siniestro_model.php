<?php
if (!defined('BASEPATH'))
    exit("Acceso no permitido");

class Siniestro_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    private $idSiniestro;
    private $poliza;
    private $ajustador;
    private $responsable;
    private $costoAprox;
    private $observaciones;
    private $estatus;
    private $fechaAccidente;
    
    public function getIdSiniestro(){
        return $this->idSiniestro;
    }
    public function setIdSiniestro($value =NULL){
        $this->idSiniestro=$value;
    }
    
    public function getPoliza(){
        return $this->poliza;
    }
    public function setPoliza($value =NULL){
        $this->poliza=$value;
    }
    
    public function getAjustador(){
        return $this->ajustador;
    }
    public function setAjustador($value =NULL){
        $this->ajustador=$value;
    }
    
    public function getResponsable(){
        return $this->responsable;
    }
    public function setResponsable($value =NULL){
        $this->responsable=$value;
    }
    
    public function getCostoAprox(){
        return $this->costoAprox;
    }
    public function setCostoAprox($value =NULL){
        $this->costoAprox=$value;
    }
    
    public function getObservaciones(){
        return $this->observaciones;
    }
    public function setObservaciones($value =NULL){
        $this->observaciones=$value;
    }
    
    public function getEstatus(){
        return $this->estatus;
    }
    public function setEstatus($value =NULL){
        $this->estatus=$value;
    }
    
    public function getFechaAccidente(){
        return $this->fechaAccidente;
    }
    public function setFechaAccidente($value =NULL){
        $this->fechaAccidente=$value;
    }
    
    public function InsertaSiniestro(){
        $data = array(
            'poliza' => $this->poliza,
            'ajustador' => $this->ajustador,
            'responsable' => $this->responsable,
            'costoAprox' => $this->costoAprox,
            'observaciones' => $this->observaciones,
        );
        $this->db->insert('Siniestro', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function ActualizaEstatus(){
        $data = array(
            'estatus' => $this->estatus
        );
        $this->db->where("Siniestro.idSiniestro", $this->idSiniestro);
        $this->db->update("Siniestro", $data);
    }


    public function ObtenerTodo(){
        $comandoSql = "select * from Siniestro where estatus != 'Finalizado'";
        $query = $this->db->query($comandoSql);
        return $query->result();
    }
    
    public function ObtenerPorId(){
        $this->db->from("Siniestro");
        $this->db->where('idSiniestro', $this->idPoliza);
        $query = $this->db->get();
        return $query->Row();
    }
    
    public function ObtenerPorPoliza(){
        $this->db->from("Siniestro");
        $this->db->where('poliza', $this->poliza);
        $query = $this->db->get();
        return $query->result();
    }
}
?>