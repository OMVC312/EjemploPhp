<?php
if (!isset($_SESSION["usuario"])) {
    header("location:index");
}
if($menu == 2){
    if ($menu2 == "NSiniestro"){
        header("location: bienvenido");
    }
}
if($menu == 3){
    if ($menu2 == "NPoliza"){
        header("location: bienvenido");
    }
    if ($menu2 == "CPoliza"){
        header("location: bienvenido");
    }
    if ($menu2 == "Taller"){
        header("location: bienvenido");
    }
}
?>
<body>
    <div id="theme-wrapper">
        <header class="navbar" id="header-navbar">
            <div class="container">
                <a href="index-2.html" id="logo" class="navbar-brand">
                    <img src="../../../../php/ProyectoFinal/Diseño/Content/img/logo.png" alt="" class="normal-logo logo-white" />
                    <img src="../../../../php/ProyectoFinal/Diseño/Content/img/logo-black.png" alt="" class="normal-logo logo-black" />
                    <img src="../../../../php/ProyectoFinal/Diseño/Content/img/logo-small.png" alt="" class="small-logo hidden-xs hidden-sm hidden" />
                </a>
                <div class="clearfix">
                    <button class="navbar-toggle" data-toggle="collapse" type="button" data-target="#barramini">
                        <span class="sr-only"></span>
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="barramini">
                        <ul class="nav navbar-nav">
                            <?php
                            if ($menu == 1) {
                                    echo '<li>
                                <a href="nuevaPoliza">
                                    <i class="fa fa-user"></i>
                                    <span>Nueva Poliza</span>
                                </a>
                            </li>
                            <li>
                                <a href="ConsultaPoliza">
                                    <i class="fa fa-list"></i>
                                    <span>Consulta Poliza</span>
                                </a>
                            </li>
                            <li>
                                <a href="NuevoSiniestro">
                                    <i class="fa fa-pencil-square-o"></i>
                                    <span>Nuevo Siniestro</span>
                                </a>
                            </li>
                            <li>
                                <a href="ConsultaSiniestro">
                                    <i class="fa fa-bars"></i>
                                    <span>Consulta Siniestro</span>
                                </a>
                            </li>
                            <li>
                                <a href="Taller">
                                    <i class="fa fa-car"></i>
                                    <span>Taller</span>
                                </a>
                            </li>';
                                
                            } else if ($menu == 2){
                                    echo '<li>
                                <a href="nuevaPoliza">
                                    <i class="fa fa-user"></i>
                                    <span>Nueva Poliza</span>
                                </a>
                            </li>
                            <li>
                                <a href="ConsultaPoliza">
                                    <i class="fa fa-list"></i>
                                    <span>Consulta Poliza</span>
                                </a>
                            </li>
                            <li>
                                <a href="ConsultaSiniestro">
                                    <i class="fa fa-bars"></i>
                                    <span>Consulta Siniestro</span>
                                </a>
                            </li>
                            <li>
                                <a href="Taller">
                                    <i class="fa fa-car"></i>
                                    <span>Taller</span>
                                </a>
                            </li>';
                            } else if ($menu == 3) {
                                echo '<li><a href="NuevoSiniestro">
                                    <i class="fa fa-pencil-square-o"></i>
                                    <span>Nuevo Siniestro</span></a></li><li>
                                <a href="ConsultaSiniestro">
                                    <i class="fa fa-bars"></i>
                                    <span>Consulta Siniestro</span>
                                </a>
                            </li>';
                            }
                            ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown profile-dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs"><?php echo $_SESSION["nombre"] ?></span> <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="" onclick="window.print()"><span class="glyphicon glyphicon-print"></span> Imprimir</a>
                                    </li>
                                    <li>
                                        <a href="bienvenido"><span class="glyphicon glyphicon-home"></span> Home</a>
                                    </li>
                                    <li>
                                        <a href="pgLogout"><span class="glyphicon glyphicon-log-out"></span> Salir</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="hidden-xxs">
                                <a class="btn" href="pgLogout">
                                    <i class="glyphicon glyphicon-log-out"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>