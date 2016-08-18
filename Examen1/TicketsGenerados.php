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
            <a class="navbar-brand" href="#">Tickets Generados</a>
        </div>
        <div class="collapse navbar-collapse" id="barramini">
            <ul class="nav navbar-nav">
                <li>
                    <a href="RegistrarTicket.php">Registro</a>
                </li>
                <li class="active">
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
    <?php
    require_once 'Clases/Catalogos/ClsTickets.php';
    require_once 'Clases/Catalogos/ClsBitacora.php';

    $objConexion = new DAL();
    $conexionActual = $objConexion->getconexion();
    if (isset($conexionActual)) {

        $idUsuario = $_SESSION["idUsuario"];

        $bitacora = new ClsBitacora();
        $bitacora->setUsuario($idUsuario);
        $bitacora->setAccion("Consulta Generados");
        $nRow = $bitacora->insertaBitacora();

        $origen = $_SESSION["idUsuario"];
        $tickets = new ClsTickets();
        $tickets->setOrigen($origen);
        $arr = $tickets->obtieneTicketsXOrigen();
        echo'<table border="1" class="table">
                <thead>
            <tr style="background-color: white">
            <th>Id Ticket</th>
            <th>Asunto</th>
            <th>Estatus</th>
            <th>Origen</th>
            <th>Tipo Destino</th>
            <th>Destino</th>
            <th>Fecha</th>
            </tr>
            </thead>
<tbody>';
        foreach ($arr as $ticket) {
            $estatus = $ticket["estatus"];
            if ($estatus == "Registrado" || $estatus == "Abierto") {
                echo '<tr class="warning">';
            } elseif ($estatus == "Proceso") {
                echo '<tr class="active">';
            } elseif ($estatus == "Finalizado") {
                echo '<tr class="success">';
            } else {
                echo '<tr class="danger">';
            }
            echo '
<td>' . $ticket["idTicket"] . '</td>
<td>' . $ticket["asunto"] . '</td>
<td>' . $estatus . '</td>
<td>' . $ticket["origen"] . '</td>
<td>' . $ticket["tipoDestino"] . '</td>
<td>' . $ticket["destino"] . '</td>
<td>' . $ticket["fecha"] . '</td>
</tr>';
        }
        echo'</tbody></table>';
    }
    ?>
</div>

<?php
include 'pgGenerales/pie.php';
?>