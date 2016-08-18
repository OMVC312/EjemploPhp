<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
include 'pgGenerales/encabezado.php';
?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!--BARRA DE NAVEGACION CUANDO SE RECORTA EL ESPACIO-->
        <div class="navbar-header">
            <button type="button" value="" class="navbar-toggle" data-toggle="collapse" 
                    data-target="#barramini">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Home</a>
        </div>
        <div class="collapse navbar-collapse" id="barramini">
            <ul class="nav navbar-nav">
                <li>
                    <a href="RegistrarTicket.php">Registro</a>
                </li>
                <li>
                    <a href="TicketsGenerados.php">Generados</a>
                </li>
                <li>
                    <a href="TicketsAsignados.php">Asignados</a>
                </li>
                <li >
                    <a href="Historial.php">Historial</a>
                </li>
                <li>
                    <a href="Bitacora.php">Bitacora</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="" onclick="window.print()"><span class="glyphicon glyphicon-print"></span> Imprimir</a>
                </li>
                <li>
                    <a href="Home.php"><span class="glyphicon glyphicon-home"></span> Home</a>
                </li>
                <li>
                    <a href="pgLogout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="h1">Bienvenid@: ¡<?php echo $_SESSION["nombre"]; ?>!</h1>
    <h1 class="h1">Area: <?php
    require_once 'pgGenerales/ClsEmail.php';
    $idArea = $_SESSION["area"]; 
    $idDepto = $_SESSION["depto"];
    $email = new ClsEmail();
    $email->setIdArea($idArea);
    $email->setIdDepto($idDepto);
    $arrA = $email->obtieneCorreoArea();
    $arrD = $email->obtieneCorreoDepto();
    $area = $arrA[0]["nombreA"];
    $depto = $arrD[0]["nombreDep"];
    echo $area;
    ?></h1>
    <h1 class="h1">Departamento: <?php echo $depto ?></h1>
</div>

<?php
include 'pgGenerales/pie.php';
?>

