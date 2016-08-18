<?php
session_start();
if (isset($_SESSION["usuario"])) {
    header("location:index.php/Welcome/bienvenido");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Aseguradora - Examen Final</title>
        <link href="../../../../php/ProyectoFinal/Diseño/style.css" rel="stylesheet" type="text/css"/>
        <script src="../../../../php/ProyectoFinal/Diseño/Scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../../../../php/ProyectoFinal/Diseño/Scripts/bootstrap.min.js" type="text/javascript"></script>
        <link href="../../../../php/ProyectoFinal/Diseño/Content/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="text-center">Login</h1>
                    </div>
                    <div class="modal-body">
                        <form class="form col-md-12 center-block" 
                              name="frmInicio" method="post" action="index.php/Welcome/pgLogin">
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
        <script src="../../../../php/ProyectoFinal/Diseño/Scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../../../../php/ProyectoFinal/Diseño/Scripts/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>