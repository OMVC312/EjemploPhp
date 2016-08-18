<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
include 'pgGenerales/encabezado.php';
require_once 'Clases/Catalogos/ClsBitacora.php';
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
            <a class="navbar-brand" href="#">Bitacora</a>
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
                <li>
                    <a href="Historial.php">Historial</a>
                </li>
                <li class="active">
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
    <?php
    require_once 'Clases/Catalogos/ClsBitacora.php';

    $objConexion = new DAL();
    $conexionActual = $objConexion->getconexion();
    if (isset($conexionActual)) {

        $idUsuario = $_SESSION["idUsuario"];

        $bitacora = new ClsBitacora();
        $arr = $bitacora->obtenerBitacoraDesc();
        
        echo'<table border="1" class="table">
                <thead>
            <tr style="background-color: white">
            <th>Id Bitacora</th>
            <th>Usuario</th>
            <th>Accion</th>
            <th>Fecha</th>
            </tr>
            </thead>
<tbody>';
        foreach ($arr as $acciones) {
            echo '<tr style="background-color: white">
<td>' . $acciones["idBitacciones"] . '</td>
<td>' . $acciones["usuario"] . '</td>
<td>' . $acciones["accion"] . '</td>
<td>' . $acciones["fecha"] . '</td>
</tr>';
        }
        echo'</tbody></table>';
    }
    ?>
</div>

<?php
include 'pgGenerales/pie.php';
?>