<?php
if (!defined('BASEPATH'))
    exit("Acceso no permitido");

class Partesdaniadas_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
 
    private $idPartesDaniadas;
    private $parte;
    private $siniestro;
    private $poliza;
    private $tipoDanio;
    private $nivel;
    private $estatus;
    private $costo;
    private $observaciones;
    
    public function getIdPartesDaniadas(){
        return $this->idPartesDaniadas;
    }
    public function setIdPartesDaniadas($value =NULL){
        $this->idPartesDaniadas=$value;
    }
    
    public function getParte(){
        return $this->parte;
    }
    public function setParte($value =NULL){
        $this->parte=$value;
    }
    
    public function getSiniestro(){
        return $this->siniestro;
    }
    public function setSiniestro($value =NULL){
        $this->siniestro=$value;
    }
    
    public function getPoliza(){
        return $this->poliza;
    }
    public function setPoliza($value =NULL){
        $this->poliza=$value;
    }
    
    public function getTipoDanio(){
        return $this->tipoDanio;
    }
    public function setTipoDanio($value =NULL){
        $this->tipoDanio=$value;
    }
    
    public function getNivel(){
        return $this->nivel;
    }
    public function setNivel($value =NULL){
        $this->nivel=$value;
    }
    
    public function getEstatus(){
        return $this->estatus;
    }
    public function setEstatus($value =NULL){
        $this->estatus=$value;
    }
    
    public function getCosto(){
        return $this->costo;
    }
    public function setCosto($value =NULL){
        $this->costo=$value;
    }

    public function getObservaciones(){
        return $this->observaciones;
    }
    public function setObservaciones($value =NULL){
        $this->observaciones=$value;
    }
    
    public function InsertaDaniadas(){
        $data = array(
            'parte' => $this->parte,
            'siniestro' => $this->siniestro,
            'poliza' => $this->poliza,
            'tipoDanio' => $this->tipoDanio,
            'nivel' => $this->nivel,
            'observaciones' => $this->observaciones
        );
        $this->db->insert('partesDaniadas', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function ModificaDaniadas(){
        $data = array(
            'estatus' => $this->estatus,
            'costo' => $this->costo,
        );
        $this->db->where('partesDaniadas.idPartesDaniadas', $this->idPartesDaniadas);
        $this->db->update('partesDaniadas', $data);
    }
    
    public function ObtenerTodo(){
        $this->db->from("partesDaniadas");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function ObtenerPorId(){
        $this->db->from("partesDaniadas");
        $this->db->where('idPartesDaniadas', $this->idPartesDaniadas);
        $query = $this->db->get();
        return $query->Row();
    }

        public function ObtenerPorSiniestro(){
        $this->db->from("partesDaniadas");
        $this->db->where('siniestro', $this->siniestro);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function ObtenerPorPoliza(){
        $this->db->from("partesDaniadas");
        $this->db->where('poliza', $this->poliza);
        $query = $this->db->get();
        return $query->result();
    }
}
?>