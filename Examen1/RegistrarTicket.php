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
            <a class="navbar-brand" href="#">Registrar Ticket</a>
        </div>
        <div class="collapse navbar-collapse" id="barramini">
            <ul class="nav navbar-nav">
                <li class="active">
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
    <form class="form-horizontal" method="POST" action="pgRegistrar.php">
        <div class="col-xs-7">
            <label>Asunto</label>
            <textarea name="txtAsunto" class="form-control" placeholder="Describe el problema" rows="4" cols="50"></textarea><br>
            <label>Tipo de destino</label>
            <select name="dpnTipoDestino" class="form-control">
                <option>Selecciona una opción</option>
                <option>Area</option>
                <option>Departamento</option>
                <option>Usuario</option>
            </select><br>
            <label>Destino</label>
            <input type="text" class="form-control" name="txtDestino" value="" placeholder="Escribe el id de a quien va dirigido"/><br>
            <input type="submit" class="btn btn-primary" value="Registrar Ticket" name="btnRegistrarTicket" />
        </div>
    </form>
</div>

<?php
include 'pgGenerales/pie.php';
?>
