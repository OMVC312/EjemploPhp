<?php

require_once 'Clases/Catalogos/ClsTickets.php';
require_once 'Clases/Catalogos/ClsBitacora.php';
require_once 'Clases/Catalogos/ClsSeguimiento.php';
require_once 'pgGenerales/ClsEmail.php';
require_once 'Clases/Datos/BLL.php';
require_once 'Clases/Datos/DAL.php';

$estatus = $_POST["dpnEstatus"];
$idTicket = $_POST["txtIdTicket"];
$observaciones = $_POST["txtObservaciones"];
//echo "$estatus, $idTicket, $observaciones";
session_start();
$idUsuario = $_SESSION["idUsuario"];
$name = $_SESSION["nombre"];
$area = $_SESSION["area"];
$depto = $_SESSION["depto"];

$objConexion = new DAL();
$conexionActual = $objConexion->getconexion();
if (isset($conexionActual))
    echo 'Abierto';
else
    echo 'Error';

$ticket = new ClsTickets();

$ticket->setEstatus($estatus);
$ticket->setIdTicket($idTicket);
$arrTic = $ticket->obtineTicket();

$tipoDestino = $arrTic[0]["tipoDestino"];
$destino = $arrTic[0]["destino"];

if ($tipoDestino == "Area" && $destino != $area) {
    header("location:TicketsAsignados.php");
} elseif ($tipoDestino == "Departamento" && $destino != $depto) {
    header("location:TicketsAsignados.php");
} elseif ($tipoDestino == "Usuario" && $destino != $idUsuario) {
    header("location:TicketsAsignados.php");
}
$nRowT = $ticket->modificaEstatus();

$origen = $arrTic[0]["origen"];
$bitacora = new ClsBitacora();
$bitacora->setUsuario($idUsuario);
$bitacora->setAccion("Seguimiento");
$nRow = $bitacora->insertaBitacora();
//Verifica el resultado de bitacora
if ($nRow != 0) {
    echo 'Si se pudo guardar en bitacora';
    $seguimiento = new ClsSeguimiento();
    $seguimiento->setTicket($idTicket);
    $seguimiento->setUsuario($idUsuario);
    $seguimiento->setObservaciones($observaciones);
    $seguimiento->setEstatus($estatus);
    $nRowS = $seguimiento->insertaSeguimientoOld();
    //Verifica el resultado de seguimiento
    if ($nRowS != 0) {
        echo 'Si se guardo en seguimiento';

        $email = new ClsEmail();
        $email->setIdUsuario($idUsuario);
        $arr = $email->obtieneCorreoUsu();
        $email->setIdUsuario($origen);
        $arr2 = $email->obtieneCorreoUsu();
        $name2 = $arr2[0]["nombreUsu"];
        $correo = $arr2[0]["correoUsu"];

        $subject = "Modificación del estatus de ticket $idTicket por $name a $name2";

        $text = "Realiz&oacute; una seguimiento al ticket $idTicket. "
                . "Generado por $name2. El nuevo estatus es $estatus. "
                . "Las observaciones fueron '$observaciones'.";

        $text2 = "Estimad@ $name2. $name realiz&oacute; un seguimiento al ticket "
                . "$idTicket que genero usted. El nuevo estatus es $estatus."
                . "Las observaciones fueron '$observaciones.'";

        $email->SendMail($arr[0]["correoUsu"], $subject, $name, $text);
        $email->SendMail($correo, $subject, $name2, $text2);
        header("location:TicketsAsignados.php");
    } else {
        //echo $nRowS;
        header("location:Historial.php");
    }
} else {
    //echo $nRow;
    header("location:Bitacora.php");
}
?>

