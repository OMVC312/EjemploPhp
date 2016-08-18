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
            <a class="navbar-brand" href="#">Seguimiento Ticket</a>
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
    <form class="form-horizontal" method="POST" action="pgModificaE.php">
        <div class="col-xs-7">
            <label><?php echo 'Asunto: '. $_POST["txtAsunto"]; ?></label><br>
            <label>Estatus</label>
            <select name="dpnEstatus" class="form-control">
                <option><?php echo  $_POST["txtEstatus"]; ?></option>
                <option>Abierto</option>
                <option>Proceso</option>
                <option>Finalizado</option>
                <option>Cerrado</option>
            </select><br>
            <label>Observaciones</label>
            <textarea name="txtObservaciones" class="form-control" rows="4" cols="50"></textarea><br>
            <input type="hidden" name="txtIdTicket" value="<?php echo $_POST["txtIdTicket"]; ?>" />
            <input type="submit" class="btn btn-primary" value="Seguimiento Ticket" name="btnSeguimientoTicket" />
        </div>
    </form>
</div>

<?php
include 'pgGenerales/pie.php';
?>

