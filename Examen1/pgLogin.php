<?php

require_once 'Clases/Catalogos/ClsUsuarios.php';
require_once 'Clases/Catalogos/ClsBitacora.php';
require_once 'Clases/Datos/BLL.php';
require_once 'Clases/Datos/DAL.php';

$usuario = $_POST["txtUsuario"];
$password = $_POST["txtPassword"];
echo $usuario;

if (isset($usuario)) {

    $objConexion = new DAL();
    $conexionActual = $objConexion->getconexion();
    if (isset($conexionActual))
        echo 'Abierto';
    else
        echo 'Error';

    $usuarios = new ClsUsuarios();
    $bitacora = new ClsBitacora();

    $usuarios->setUsuario($usuario);
    $usuarios->setPassword($password);
    $arr = $usuarios->validaUsuarios();
    print_r($arr);
    if ($arr[0]["usuario"] == $usuario) {
        session_start();
        $idUsuario = $arr[0]["idUsuarios"];
        echo $idUsuario;
        $_SESSION["idUsuario"] = $idUsuario;
        $_SESSION["usuario"] = $usuario;
        $_SESSION["area"] = $arr[0]["area"];
        $_SESSION["depto"] = $arr[0]["departamento"];
        $_SESSION["nombre"] = $arr[0]["nombreUsu"];

        $bitacora->setUsuario($idUsuario);
        $bitacora->setAccion("Login");
        $nRow = $bitacora->insertaBitacora();
        if ($nRow != 1) {
            header("location:Home.php");
        } else {
            header("location:Bitacora.php");
        }
    } else {
        header("location:index.php");
    }
}
?>

