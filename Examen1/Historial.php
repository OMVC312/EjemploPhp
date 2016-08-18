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
            <a class="navbar-brand" href="#">Historial de Seguimiento</a>
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
                <li class="active">
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
    <form class="form-horizontal" method="POST" action="">
        <div class="col-xs-7">
            <label>Id Ticket</label>
            <input type="text" class="form-control" name="txtIdTicket" value="" placeholder="Escribe el id del ticket"/><br>
            <input type="submit" class="btn btn-primary" value="Buscar Historial" name="btnBuscarHistorial" /><br><br><br>
        </div>
    </form>
    <?php
    require_once 'Clases/Catalogos/ClsSeguimiento.php';
    require_once 'Clases/Catalogos/ClsBitacora.php';

    $objConexion = new DAL();
    $conexionActual = $objConexion->getconexion();
    if (isset($conexionActual)) {

        $idUsuario = $_SESSION["idUsuario"];

        $bitacora = new ClsBitacora();
        $bitacora->setUsuario($idUsuario);
        $bitacora->setAccion("Historial Seguimiento todos");

        $seguimiento = new ClsSeguimiento();
        $arr = $seguimiento->obtenerSeguimiento();
        
        if(isset($_POST["txtIdTicket"])){
            $idTicket = $_POST["txtIdTicket"];
            $seguimiento->setTicket($idTicket);
            $arr = $seguimiento->obtieneSeguimientoTicket();
            $bitacora->setAccion("Historial Seguimiento $idTicket");
        }
        
        $nRow = $bitacora->insertaBitacora();
        if($nRow == 0){
            echo "No se inserto en bitacora: $nRow, ". $bitacora->getUsuario().", ".$bitacora->getAccion();
        }
        
        echo'<table border="1" class="table">
                <thead>
            <tr style="background-color: white">
            <th>Id Seguimiento</th>
            <th>Ticket</th>
            <th>Estatus</th>
            <th>Usuario</th>
            <th>Observaciones</th>
            <th>Fecha</th>
            </tr>
            </thead>
<tbody>';
        foreach ($arr as $ticket) {
            echo '<tr style="background-color: white">
<td>' . $ticket["idSeguimiento"] . '</td>
<td>' . $ticket["ticket"] . '</td>
<td>' . $ticket["estatus"] . '</td>
<td>' . $ticket["usuario"] . '</td>
<td>' . $ticket["observaciones"] . '</td>
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