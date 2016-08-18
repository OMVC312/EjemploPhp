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
            <a class="navbar-brand" href="#">Tickets Asignados</a>
        </div>
        <div class="collapse navbar-collapse" id="barramini">
            <ul class="nav navbar-nav">
                <li>
                    <a href="RegistrarTicket.php">Registro</a>
                </li>
                <li>
                    <a href="TicketsGenerados.php">Generados</a>
                </li>
                <li class="active">
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
            $area = $_SESSION["area"];
            $depto = $_SESSION["depto"];

            $bitacora = new ClsBitacora();
            $bitacora->setUsuario($idUsuario);
            $bitacora->setAccion("Consulta Asignados");
            $nRow = $bitacora->insertaBitacora();

            $origen = $_SESSION["idUsuario"];
            $tickets = new ClsTickets();
            $tickets->setDestino($area);
            $tickets->setTipoDestino("area");
            $arrArea = $tickets->ObtieneTicketsXDestinoArea();
            
            $tickets->setDestino($depto);
            $tickets->setTipoDestino("departamento");
            $arrDepto = $tickets->ObtieneTicketsXDestinoDepto();
            
            $tickets->setDestino($origen);
            $tickets->setTipoDestino("usuario");
            $arrUsu = $tickets->ObtieneTicketsXDestinoUsu();
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
            <th></th></tr></thead><tbody>';
            foreach ($arrArea as $ticket) {
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
                echo '<form action="SegimientoTicket.php" method="POST">
<td><input type="text" name="txtIdTicket" width="30" value="' . $ticket["idTicket"] . '" /></td>
<td><input type="text" name="txtAsunto" value="' . $ticket["asunto"] . '" /></td>
<td><input type="text" name="txtEstatus" value="' . $estatus . '"/></td>
<td>' . $ticket["origen"] . '</td>
<td>' . $ticket["tipoDestino"] . '</td>
<td>' . $ticket["destino"] . '</td>
<td>' . $ticket["fecha"] . '</td>
    <td><input class="btn btn-default btn-lg btn-block" type="submit" 
    value="Seguimiento" name="btnSeguimiento" /></td>
</tr></form>';
            }
            
            foreach ($arrDepto as $ticket) {
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
                echo '<form action="SegimientoTicket.php" method="POST">
<td><input type="text" name="txtIdTicket" width="30" value="' . $ticket["idTicket"] . '" /></td>
<td><input type="text" name="txtAsunto" value="' . $ticket["asunto"] . '" /></td>
<td><input type="text" name="txtEstatus" value="' . $estatus . '"/></td>
<td>' . $ticket["origen"] . '</td>
<td>' . $ticket["tipoDestino"] . '</td>
<td>' . $ticket["destino"] . '</td>
<td>' . $ticket["fecha"] . '</td>
    <td><input class="btn btn-default btn-lg btn-block" type="submit" 
    value="Seguimiento" name="btnSeguimiento" /></td>
</tr></form>';
            }
            
            foreach ($arrUsu as $ticket) {
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
                echo '<form action="SegimientoTicket.php" method="POST">
<td><input type="text" name="txtIdTicket" width="10" value="' . $ticket["idTicket"] . '" /></td>
<td><input type="text" name="txtAsunto" value="' . $ticket["asunto"] . '" /></td>
<td><input type="text" name="txtEstatus" value="' . $estatus . '"/></td>
<td>' . $ticket["origen"] . '</td>
<td>' . $ticket["tipoDestino"] . '</td>
<td>' . $ticket["destino"] . '</td>
<td>' . $ticket["fecha"] . '</td>
    <td><input class="btn btn-default btn-lg btn-block" type="submit" 
    value="Seguimiento" name="btnSeguimiento" /></td>
</tr></form>';
            }
            
            echo'</tbody></table>';
        }
        ?>
    
</div>

<?php
include 'pgGenerales/pie.php';
?>

