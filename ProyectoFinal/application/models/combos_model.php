<?php
if (!defined('BASEPATH'))
    exit("Acceso no permitido");

class Combos_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function ObtenerAseguradoras(){
        $this->db->from("Aseguradora");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function ObtenerPartes(){
        $this->db->from("Partes");
        $query = $this->db->get();
        return $query->result();
    }
}
?>