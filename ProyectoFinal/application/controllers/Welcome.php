<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model("usuarios_model");
        $this->load->model("poliza_model");
        $this->load->model("partesdaniadas_model");
        $this->load->model("combos_model");
        $this->load->model("siniestro_model");
        $this->load->helper("url");
        $this->load->database("default");
    }

    public function index() {
        $this->load->view('Login');
    }

    public function pgLogin() {
        $usuario = $this->input->post("txtUsuario");
        $password = $this->input->post("txtPassword");

        if (isset($usuario)) {

            $this->usuarios_model->setUsuario($usuario);
            $this->usuarios_model->setPassword($password);
            $arr = $this->usuarios_model->ValidaUsuario();
            if ($arr->usuario == $usuario) {
                session_start();
                $idUsuario = $arr->idUsuario;
                $tipoUsu = $arr->tipoUsu;
                $_SESSION["idUsuario"] = $idUsuario;
                $_SESSION["usuario"] = $usuario;
                $_SESSION["nombre"] = $arr->nombre;
                $_SESSION["tipoUsu"] = $tipoUsu;
                $_SESSION["correo"] = $arr->correo;

                $this->load->view('pgRedirect/pgLogin');
            } else {
                $this->load->view('pgRedirect/pgLogout');
            }
        }
    }

    public function pgLogout() {
        session_start();
        if (!isset($_SESSION["usuario"])) {
            $this->load->view('pgRedirect/pgLogout');
        }

        unset($_SESSION["idUsuario"]);
        unset($_SESSION["usuario"]);
        unset($_SESSION["nombre"]);
        unset($_SESSION["tipoUsu"]);
        unset($_SESSION["correo"]);
        $this->load->view('pgRedirect/pgLogout');
    }

    public function bienvenido() {
        session_start();
        $datos['menu'] = $_SESSION["tipoUsu"];
        $datos['menu2'] = "Home";

        $this->load->view('pgGeneral/encabezado');
        $this->load->view('pgGeneral/menu', $datos);
        $this->load->view('Home', $datos);
        $this->load->view('pgGeneral/pie');
    }

    public function nuevaPoliza() {
        session_start();
        $arrAseg = $this->combos_model->ObtenerAseguradoras();
        $datos["arrAseg"] = $arrAseg;

        $datos['menu'] = $_SESSION["tipoUsu"];
        $datos['menu2'] = "NPoliza";

        $this->load->view('pgGeneral/encabezado');
        $this->load->view('pgGeneral/menu', $datos);
        $this->load->view('NuevaPoliza', $datos);
        $this->load->view('pgGeneral/pie');
    }

    public function pgRegistrarPoliza() {
        $this->poliza_model->setNombre($this->input->post("txtNombre"));
        $this->poliza_model->setCorreo($this->input->post("txtCorreo"));
        $this->poliza_model->setTelefono($this->input->post("txtTelefono"));
        $this->poliza_model->setDireccion($this->input->post("txtDireccion"));
        $this->poliza_model->setAseguradora($this->input->post("dpnAseguradora"));
        $this->poliza_model->setMarca($this->input->post("txtMarca"));
        $this->poliza_model->setModelo($this->input->post("txtModelo"));
        $this->poliza_model->setColor($this->input->post("txtColor"));
        $this->poliza_model->setAnio($this->input->post("txtAnio"));
        $this->poliza_model->setPlacas($this->input->post("txtPlacas"));

        $id = $this->poliza_model->InsertaPoliza();
        if ($id != 0) {
            $this->load->view('pgRedirect/pgConsultaPoliza');
        }
        $datos["id"] = $id;
        $this->load->view("Mensaje", $datos);
    }

    public function ConsultaPoliza() {
        session_start();
        $resultado = $this->poliza_model->ObtenerTodo();
        $datos["polizas"] = $resultado;

        $datos['menu'] = $_SESSION["tipoUsu"];
        $datos['menu2'] = "CPoliza";

        $this->load->view('pgGeneral/encabezado');
        $this->load->view('pgGeneral/menu', $datos);
        $this->load->view('ConsultaPoliza', $datos);
        $this->load->view('pgGeneral/pie');
    }

    public function EditarPoliza() {
        $idPoliza = $this->input->post("txtIdPoliza");
        $this->poliza_model->setIdPoliza($idPoliza);
        $resultado = $this->poliza_model->ObtenerPorId();
        $datos["poliza"] = $resultado;
        $datos["idPoliza"] = $idPoliza;

        $datos["arrAseg"] = $this->combos_model->ObtenerAseguradoras();

        session_start();
        $datos['menu'] = $_SESSION['tipoUsu'];
        $datos['menu2'] = "EPoliza";

        $this->load->view("pgGeneral/encabezado");
        $this->load->view("pgGeneral/menu", $datos);
        $this->load->view("EditarPoliza", $datos);
        $this->load->view("pgGeneral/pie");
    }

    public function pgActualizarPoliza() {
        $this->poliza_model->setNombre($this->input->post("txtNombre"));
        $this->poliza_model->setCorreo($this->input->post("txtCorreo"));
        $this->poliza_model->setTelefono($this->input->post("txtTelefono"));
        $this->poliza_model->setDireccion($this->input->post("txtDireccion"));
        $this->poliza_model->setAseguradora($this->input->post("dpnAseguradora"));
        $this->poliza_model->setMarca($this->input->post("txtMarca"));
        $this->poliza_model->setModelo($this->input->post("txtModelo"));
        $this->poliza_model->setColor($this->input->post("txtColor"));
        $this->poliza_model->setAnio($this->input->post("txtAnio"));
        $this->poliza_model->setPlacas($this->input->post("txtPlacas"));
        $this->poliza_model->setIdPoliza($this->input->post("txtIdPoliza"));

        $this->poliza_model->ModificaPoliza();
        $this->load->view('pgRedirect/pgConsultaPoliza');
    }

    public function NuevoSiniestro() {
        session_start();
        $datos['menu'] = $_SESSION["tipoUsu"];
        $datos['menu2'] = "NSiniestro";

        $this->load->view('pgGeneral/encabezado');
        $this->load->view('pgGeneral/menu', $datos);
        $this->load->view('NuevoSiniestro');
        $this->load->view('pgGeneral/pie');
    }

    public function pgRegistrarSiniestro() {
        session_start();
        $ajustador = $_SESSION["idUsuario"];
        $poliza = $this->input->post("txtPoliza");
        $responsable = $this->input->post("dpnResponsable");
        $costoAprox = $this->input->post("txtCostoAprox");
        $observaciones = $this->input->post("txtObservaciones");
        $this->siniestro_model->setPoliza($poliza);
        $this->siniestro_model->setAjustador($ajustador);
        $this->siniestro_model->setResponsable($responsable);
        $this->siniestro_model->setCostoAprox($costoAprox);
        $this->siniestro_model->setObservaciones($observaciones);
        $id = $this->siniestro_model->InsertaSiniestro();
        if ($id != 0) {

            $this->poliza_model->setIdPoliza($poliza);
            $polizaDatos = $this->poliza_model->ObtenerPorId();
            $nombrePoliza = $polizaDatos->nombre;
            $correoPoliza = $polizaDatos->correo;
            $marcaPoliza = $polizaDatos->marca;
            $modeloPoliza = $polizaDatos->modelo;
            $colorPoliza = $polizaDatos->color;
            $anioPoliza = $polizaDatos->anio;
            $placasPoliza = $polizaDatos->placas;
            
            $subject = "Siniestro registrado a la poliza $poliza";
            
            $text = "Estimado usuario $nombrePoliza. Se registro un siniestro al carro "
                    . "con la marca $marcaPoliza, el modelo $modeloPoliza, el color "
                    . "$colorPoliza, con el año $anioPoliza y las placas $placasPoliza "
                    . "correspondiente al número de poliza $poliza. El ajustador "
                    . "asignado tiene el id $ajustador. El responsable del accidente "
                    . "es $responsable. Las observaciones del ajustador son "
                    . "'$observaciones'. El costo aproximado es $$costoAprox. "
                    . "Comuniquese a las oficinas para más información.";

		$this->load->library("email");
 
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'omvc.874@gmail.com',
			'smtp_pass' => 'MonA8743.',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);    
 
		$this->email->initialize($configGmail);
 
		$this->email->from("Aseguradora CUBE");
		$this->email->to($correoPoliza);
		$this->email->subject($subject);
		$this->email->message($text);
		$this->email->send();
            
            $datos["idPoliza"] = $poliza;
            $datos["idSiniestro"] = $id;
            $this->load->view('pgRedirect/pgNuevaParteDaniada', $datos);
        }
    }

    public function ConsultaSiniestro() {
        session_start();
        $idPoliza = $this->input->post("txtIdPoliza");

        if ($idPoliza != "") {
            $this->siniestro_model->setPoliza($idPoliza);
            $resultado = $this->siniestro_model->ObtenerPorPoliza();
        } else {
            $resultado = $this->siniestro_model->ObtenerTodo();
        }
        $datos["siniestros"] = $resultado;

        $datos['menu'] = $_SESSION["tipoUsu"];
        $datos['menu2'] = "CSiniestro";

        $this->load->view('pgGeneral/encabezado');
        $this->load->view('pgGeneral/menu', $datos);
        $this->load->view('ConsultaSiniestro', $datos);
        $this->load->view('pgGeneral/pie');
    }

    public function EditarEstatusSiniestro() {
        $this->siniestro_model->setIdSiniestro($this->input->post("txtIdSiniestro"));
        $this->siniestro_model->setEstatus($this->input->post("dpnEstatus"));
        $this->siniestro_model->ActualizaEstatus();
        $this->load->view('pgRedirect/pgConsultaSiniestro');
    }

    public function NuevaParteDaniada() {
        session_start();
        $idSiniestro = $this->input->post("txtIdSiniestro");
        $idPoliza = $this->input->post("txtIdPoliza");
        $datos['menu'] = $_SESSION["tipoUsu"];
        $datos['menu2'] = "NParteDaniada";

        $datos['idSiniestro'] = $idSiniestro;
        $datos['idPoliza'] = $idPoliza;
        $datos['partes'] = $this->combos_model->ObtenerPartes();

        $this->partesdaniadas_model->setSiniestro($idSiniestro);
        $datos['partesDanios'] = $this->partesdaniadas_model->ObtenerPorSiniestro();

        $this->load->view('pgGeneral/encabezado');
        $this->load->view('pgGeneral/menu', $datos);
        $this->load->view('NuevaParteDaniada', $datos);
        $this->load->view('pgGeneral/pie');
    }

    public function pgNuevaParteDaniada() {
        session_start();
        $idPoliza = $this->input->post("txtIdPoliza");
        $idSiniestro = $this->input->post("txtIdSiniestro");
        $this->partesdaniadas_model->setParte($this->input->post("dpnParte"));
        $this->partesdaniadas_model->setSiniestro($idSiniestro);
        $this->partesdaniadas_model->setPoliza($idPoliza);
        $this->partesdaniadas_model->setTipoDanio($this->input->post("txtTipoDanio"));
        $this->partesdaniadas_model->setNivel($this->input->post("dpnNivel"));
        $this->partesdaniadas_model->setObservaciones($this->input->post("txtObservaciones"));

        $id = $this->partesdaniadas_model->InsertaDaniadas();
        if ($id != 0) {
            $datos["idPoliza"] = $idPoliza;
            $datos["idSiniestro"] = $idSiniestro;
            $this->load->view('pgRedirect/pgNuevaParteDaniada', $datos);
        }
    }

    public function Taller() {
        session_start();
        $idPoliza = $this->input->post("txtIdPoliza");
        $idSiniestro = $this->input->post("txtIdSiniestro");
        $this->partesdaniadas_model->setSiniestro($idSiniestro);
        $this->partesdaniadas_model->setPoliza($idPoliza);
        if ($idPoliza != "") {
            $datos['partesDanios'] = $this->partesdaniadas_model->ObtenerPorPoliza();
        } else if ($idSiniestro != "") {
            $datos['partesDanios'] = $this->partesdaniadas_model->ObtenerPorSiniestro();
        } else {
            $datos['partesDanios'] = $this->partesdaniadas_model->ObtenerTodo();
        }

        $datos['menu'] = $_SESSION["tipoUsu"];
        $datos['menu2'] = "Taller";

        $this->load->view('pgGeneral/encabezado');
        $this->load->view('pgGeneral/menu', $datos);
        $this->load->view('Taller', $datos);
        $this->load->view('pgGeneral/pie');
    }

    public function EditarParte() {
        $this->partesdaniadas_model->setEstatus($this->input->post("estatus"));
        $this->partesdaniadas_model->setCosto($this->input->post("txtCosto"));
        $this->partesdaniadas_model->setIdPartesDaniadas($this->input->post("txtIdDaniadas"));
        $this->partesdaniadas_model->ModificaDaniadas();

        $this->load->view('pgRedirect/pgTaller');
    }

}
