<?php

require_once 'Clases/Catalogos/ClsTickets.php';
require_once 'Clases/Catalogos/ClsBitacora.php';
require_once 'Clases/Catalogos/ClsSeguimiento.php';
require_once 'pgGenerales/ClsEmail.php';
require_once 'Clases/Datos/BLL.php';
require_once 'Clases/Datos/DAL.php';

$asunto = $_POST["txtAsunto"];
$tipoDestino = $_POST["dpnTipoDestino"];
$destino = $_POST["txtDestino"];
session_start();
$origen = $_SESSION["idUsuario"];
$name = $_SESSION["nombre"];


if (isset($destino)) {

            $objConexion = new DAL();
            $conexionActual = $objConexion->getconexion();
            if (isset($conexionActual))
                echo 'Abierto';
            else
                echo 'Error';

            $ticket = new ClsTickets();

            $ticket->setAsunto($asunto);
            $ticket->setOrigen($origen);
            $ticket->setTipoDestino($tipoDestino);
            $ticket->setDestino($destino);
            echo 'Se va a insertar';
            $nRowT = $ticket->insertaTicket();
            //Verifica el resultado de Ticket
            if ($nRowT != 0) {
                echo 'Si se pudo insertar';
                $bitacora = new ClsBitacora();
                $bitacora->setUsuario($origen);
                $bitacora->setAccion("Registro");
                $nRow = $bitacora->insertaBitacora();
                //Verifica el resultado de bitacora
                if ($nRow != 0) {
                    echo 'Si se pudo guardar en bitacora';
                    $seguimiento = new ClsSeguimiento();
                    $seguimiento->setTicket($nRowT);
                    $seguimiento->setUsuario($origen);
                    $seguimiento->setObservaciones($asunto);
                    $nRowS = $seguimiento->insertaSeguimientoNew();
                    //Verifica el resultado de seguimiento
                    if ($nRowS != 0) {
                        echo 'Si se guardo en seguimiento';

                        $email = new ClsEmail();
                        $email->setIdUsuario($origen);
                        $arrPrin = $email->obtieneCorreoUsu();
                        $name2 = "";
                        $arr = "";
                        if ($tipoDestino == "Area") {
                            $email->setIdArea($destino);
                            $arr = $email->obtieneCorreoArea();
                            $name2 = $arr[0]["nombreA"];
                            $correo = $arr[0]["correoA"];
                        } elseif ($tipoDestino == "Departamento") {
                            $email->setIdDepto($destino);
                            $arr = $email->obtieneCorreoDepto();
                            print_r($arr2);
                            $name2 = $arr[0]["nombreDep"];
                            $correo = $arr[0]["correoDep"];
                        } elseif ($tipoDestino == "Usuario") {
                            $email->setIdUsuario($destino);
                            $arr = $email->obtieneCorreoUsu();
                            $name2 = $arr[0]["nombreUsu"];
                            $correo = $arr[0]["correoUsu"];
                        }

                        $subject = "Registro de ticket por $name a $name2";

                        $text = "Estimado usuario $name. Realiz&oacute; un registro de un ticket "
                                . "con id = $nRowT. Correspondiente al $tipoDestino $name2. "
                                . "El asunto del ticket fue: '$asunto'"
                                . "Se resolvera cuando antes el problema.";

                        $text2 = "Se registr&oacute; un ticket con el id = $nRowT asignado al "
                                . "$tipoDestino $name2 y generado por $name. "
                                . "El asunto del ticket fue: '$asunto'. "
                                . "Favor de responder cuando antes.";

                        $email->SendMail($arrPrin[0]["correoUsu"], $subject, $name, $text);
                        $email->SendMail($correo, $subject, $name2, $text2);
                        header("location:TicketsGenerados.php");
                    } else {
                        echo $nRowS;
                        header("refresh:5; url=Historial.php");
                    }
                } else {
                    echo $nRow;
                    header("refresh:5; url=Bitacora.php");
                }
            } else {
                echo 'No se pudo insertar' . $nRowT;
                header("refresh:5; url=RegistrarTicket.php");
            }
        }

