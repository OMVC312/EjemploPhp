<?php
if (!defined('BASEPATH'))
    exit("Acceso no permitido");

class Poliza_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    private $idPoliza;
    private $nombre;
    private $correo;
    private $telefono;
    private $direccion;
    private $aseguradora;
    private $marca;
    private $modelo;
    private $color;
    private $anio;
    private $placas;
    
    public function getIdPoliza(){
        return $this->idPoliza;
    }
    public function setIdPoliza($value =NULL){
        $this->idPoliza=$value;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($value =NULL){
        $this->nombre=$value;
    }
    
    public function getCorreo(){
        return $this->correo;
    }
    public function setCorreo($value =NULL){
        $this->correo=$value;
    }
    
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($value =NULL){
        $this->telefono=$value;
    }
    
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($value =NULL){
        $this->direccion=$value;
    }
    
    public function getAseguradora(){
        return $this->aseguradora;
    }
    public function setAseguradora($value =NULL){
        $this->aseguradora=$value;
    }
    
    public function getMarca(){
        return $this->marca;
    }
    public function setMarca($value =NULL){
        $this->marca=$value;
    }
    
    public function getModelo(){
        return $this->modelo;
    }
    public function setModelo($value =NULL){
        $this->modelo=$value;
    }
    
    public function getColor(){
        return $this->color;
    }
    public function setColor($value =NULL){
        $this->color=$value;
    }
    
    public function getAnio(){
        return $this->anio;
    }
    public function setAnio($value =NULL){
        $this->anio=$value;
    }
    
    public function getPlacas(){
        return $this->placas;
    }
    public function setPlacas($value =NULL){
        $this->placas=$value;
    }
    
    public function InsertaPoliza(){
        $data = array(
            'nombre' => $this->nombre,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'aseguradora' => $this->aseguradora,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'color' => $this->color,
            'anio' => $this->anio,
            'placas' => $this->placas
        );
        $this->db->insert('Poliza', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function ModificaPoliza(){
        $data = array(
            'nombre' => $this->nombre,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'aseguradora' => $this->aseguradora,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'color' => $this->color,
            'anio' => $this->anio,
            'placas' => $this->placas
        );
        $this->db->where("Poliza.idPoliza", $this->idPoliza);
        $this->db->update("Poliza", $data);
    }
    
    public function ObtenerCorreo(){
        $this->db->select("correo");
        $this->db->from("Poliza pol");
        $this->db->where("pol.idPoliza", $this->idPoliza);
        $query = $this->db->get();
        return $query->row();
    }

        public function ObtenerTodo(){
        $this->db->from("Poliza");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function ObtenerPorId(){
        $this->db->from("Poliza pol");
        $this->db->where("pol.idPoliza", $this->idPoliza);
        $query = $this->db->get();
        return $query->row();
    }
}
?>

