<?php

require_once 'class.phpmailer.php';
require_once "Clases/Datos/BLL.php";


class ClsEmail {

    public function __construct() {
        $this->objBLL = new BLL();
    }
    private $objBLL;
    public function getObjBLL(){
        return $this->objBLL;
    }
    public function setObjBLL($value = NULL){
        $this->objBLL=$value;
    }
    
    private $idUsuario;
    private $idDepto;
    private $idArea;
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($value =NULL){
        $this->idUsuario=$value;
    }
    
    public function getIdDepto(){
        return $this->idDepto;
    }
    public function setIdDepto($value =NULL){
        $this->idDepto=$value;
    }
    public function getIdArea(){
        return $this->idArea;
    }
    public function setIdArea($value =NULL){
        $this->idArea=$value;
    }
    
    public function  obtieneCorreoUsu(){
        $comandoSql = "select * from ctlUsuarios where idUsuarios=?";
        $params = array($this->idUsuario);
        $arr = $this->objBLL->seleccionaDatosPar($comandoSql, $nReg, "i", $params);
        return $arr;
    }
    
    public function  obtieneCorreoDepto(){
        $comandoSql = "select * from ctlDepartamento where idDepartamento=?";
        $params = array($this->idDepto);
        $arr = $this->objBLL->seleccionaDatosPar($comandoSql, $nReg, "i", $params);
        return $arr;
    }
    public function  obtieneCorreoArea(){
        $comandoSql = "select * from ctlArea where idArea=?";
        $params = array($this->idArea);
        $arr = $this->objBLL->seleccionaDatosPar($comandoSql, $nReg, "i", $params);
        return $arr;
    }
    
    public function BodyMail($subject, $name, $text) {
        return "<table style='boder:2px outset #084773;"
                . "border-collapse:collapse; font-size: 9pt;>"
                . "<tr><td style= 'border 2px outset #084773';"
                . "padding: 5px; text-align: center;'>"
                . "</td></tr>"
                . "<tr><td width='700' style='border: 2px outset #084773'; padding: 5px;>"
                . "<center>$subject</center></td></tr>"
                . "<tr><td width = '700' style=border:2px outset #084773'; padding: 5px;>"
                . "<p><b>Estimado (a):$name</b></p>$text<br>"
                . "<p><b>Le agradecemos por usar nuestro portal</b></p>"
                . "</td></tr></table>";
    }

    public function SendMail($send, $subject, $name, $text, $attach = NULL) {
        $from = "omvc.874@gmail.com";
        $password = "MonA8743.";

        //Declaracion del objeto de correo
        $mail = new PHPMailer();

        //configurando el destinatario. un addAddress por cada destinatario
        $mail->AddAddress($send, "Nombre Completo");

        //Para mandar con copia y con copia oculta
        //$mail->AddBCC("correo");
        //$mail->AddCC("correo");
        //Configurando la cuenta de donde el correo es enviado
        $mail->From = $from;
        $mail->FromName = "Olga Maria Villalva Cervantes";

        //Configurando los datos del contenido del correo
        $mail->Subject = $subject;
        $mail->Body = $this->BodyMail($subject, $name, $text);

        //Configuracion del servidor de correo
        $mail->IsHTML(true);
        if ($attach)
            $mail->AddAttachment($attach, $file);
        $mail->IsSMTP();

        //$mail->SMTPDebug = 2;

        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Username = $from;
        $mail->Password = $password;

        if ($mail->Send())
            echo 'ok';
        else
            echo 'Error' . $mail->ErrorInfo;

        //Se verifica que se haya enviado el correo con el metodo
        //return $mail->Send();
    }

}
?>

