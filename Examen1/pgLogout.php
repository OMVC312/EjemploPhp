<?php

require_once 'Clases/Catalogos/ClsBitacora.php';
session_start();
if (!isset($_SESSION["usuario"])) {
    echo 'no hay sesion';
    header("location:index.php");
}

$idUsuario = $_SESSION["idUsuario"];

$bitacora = new ClsBitacora();
$bitacora->setUsuario($idUsuario);
$bitacora->setAccion("Logout");
$nRow = $bitacora->insertaBitacora();

if ($nRow != 0) {
    unset($_SESSION["idUsuario"]);
    unset($_SESSION["usuario"]);
    unset($_SESSION["area"]);
    unset($_SESSION["depto"]);
    unset($_SESSION["nombre"]);

    header("location: index.php");
}
 else {
     header("location:Home.php");
}
?>
