<?php
abstract class DALAbs{
    #MANEJO DE PROPIEDADES
    protected $servidor;
    protected $bd;
    protected $usuario;
    protected $password;
    protected $conexion;
    
    #PROPIEDADES
    public abstract function getServidor();
    public abstract function setServidor($value=NULL);
    public abstract function getBD();
    public abstract function setBD($value=NULL);
    public abstract function getUsuario();
    public abstract function setUsuario($value=NULL);
    public abstract function getPassword();
    public abstract function setPassword($value=NULL);
    
    public abstract function getConexion();
    
    #MÉTODOS PARA LA APERTURA Y CIERRE DE LA CONEXIÓN
    public abstract function openCnn();
    public abstract function closeCnn();
}
?>

