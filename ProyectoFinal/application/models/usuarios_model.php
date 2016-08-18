<?php 
if (!defined('BASEPATH'))
    exit("Acceso no permitido");

class Usuarios_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    private $idUsuario;
    private $nombre;
    private $edad;
    private $usuario;
    private $password;
    private $tipoUsu;
    private $correo;
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($value =NULL){
        $this->idUsuario=$value;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($value =NULL){
        $this->nombre=$value;
    }
    
    public function getEdad(){
        return $this->edad;
    }
    public function setEdad($value =NULL){
        $this->edad=$value;
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
    
    public function getTipoUsuario(){
        return $this->tipoUsu;
    }
    public function setTipoUsuario($value =NULL){
        $this->tipoUsu=$value;
    }
    
    public function getCorreo(){
        return $this->correo;
    }
    public function setCorreo($value =NULL){
        $this->correo=$value;
    }
    
    public function ValidaUsuario(){
        $this->db->from("usuarios usr");
        $this->db->where("usr.usuario", $this->usuario);
        $this->db->where("usr.pass", $this->password);
        $query = $this->db->get();
        return $query->row();
    }
}
?>

