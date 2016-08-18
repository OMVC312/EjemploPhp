<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION["usuario"])) {
    header("location:RegistrarTicket.php");
}
include 'pgGenerales/encabezado.php';
?>

<!--<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" value="" class="navbar-toggle" data-toggle="collapse" 
                    data-target="#barramini">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Login</a>
        </div>
        <div class="collapse navbar-collapse" id="barramini">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">Registro</a>
                </li>
                <li>
                    <a href="#">Generados</a>
                </li>
                <li>
                    <a href="#">Asignados</a>
                </li>
                <li >
                    <a href="#">Historial</a>
                </li>
                <li>
                    <a href="#">Bitacora</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Acceso</a>
                </li>
            </ul>
        </div>
    </div>
</nav>-->


<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="text-center">Login</h1>
            </div>
            <div class="modal-body">
                <form class="form col-md-12 center-block" 
                      name="frmInicio" method="post" action="pgLogin.php">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Usuario" 
                               name="txtUsuario" id="txtUsr"
                               />
                        <div id="mensaje1" class="errores">Escribe tu nombre de usuario</div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" placeholder="Password"
                               name="txtPassword"/>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block">Acceso</button>
                        <!--<span class="pull-right"><a href="#">Registro</a></span><span><a href="#">Necesita Ayuda?</a></span>-->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                </div>	
            </div>
        </div>
    </div>
</div>


<?php
include 'pgGenerales/pie.php';
?>
