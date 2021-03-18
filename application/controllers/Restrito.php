<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restrito extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//Load URL helper
		$this->load->helper('url');

		//$this->load->library("session");
		//if (!$this->session->userdata("usuario")) {
		//	redirect("logoff");
		//}

		$this->load->library("tema");
		date_default_timezone_set('America/Sao_Paulo');
	}

	public function index()
	{
		$usuario = $this->session->userdata('usuario')[0];

		$data = array(
			"styles" => array(),
			"empresa" => "Paytour",
			"title" => "Gerenciador de Vagas",
			"descricao" => "Painel de controler e gerencador de vagas",
			"pagina" => "Painel de Controler",
			"logo" => base_url("assets/images/logo.png"),
			"logo2" => base_url("assets/images/paytour.png"),
			"menu" => "dashboard",
			"usuario" => $usuario,
			//  "style" => array("assets-for-demo/vertical-nav.css"),
			"scripts" => array(),

		);


		$this->tema->show("membro/home.php", $data);
	}


	public function meuPerfil()
	{
		$usuario = $this->session->userdata('usuario')[0];

		$this->load->model('EstadoCivil_model', 'estadoCivil');
		$this->load->model('TipoUsuario_model', 'tpUsuario');
		$this->load->model('Usuarios_model', 'usuarios');

		$estadoCivil = $this->estadoCivil->listar_estado_civl();
		$tipo_usuario = $this->tpUsuario->listar_tipo_usuario();
		$minhaConta = $this->usuarios->minhaConta();

		$data = array(
			"styles" => array(),
			"empresa" => "Paytour",
			"title" => "Perfil de Usuário",
			"descricao" => "Perfil do usuário...",
			"pagina" => "Meu Perfil",
			"logo" => base_url("assets/images/logo.png"),
			"logo2" => base_url("assets/images/paytour.png"),
			"menu" => "person",
			"estadoCivil" => $estadoCivil,
			"tipo_usuario" => $tipo_usuario,
			"minhaConta" => $minhaConta,
			"usuario" => $usuario,
			"scripts" => array(
				"plugins/jquery.mask.min.js",
				"upload-img.js",
				"util.js",
				"autocomplete.js",
				"usuarios.js"
			),
		);

		$this->tema->show("membro/meuperfil.php", $data);
	}

	public function curriculum()
	{

		$data = array(
			"styles" => array(),
			"empresa" => "Psi Pro",
			"title" => "Perfil de Usuário",
			"descricao" => "Perfil do usuário...",
			"pagina" => "Meu Perfil",
			"logo" => base_url("assets/img/logo.jpg"),
			"menu" => "person",
		
			"scripts" => array(
				"plugins/jquery.mask.min.js",
				"upload-img.js",
				"util.js",
				"autocomplete.js",
				"usuarios.js"
			),
		);

		$this->tema->show("membro/curriculum.php", $data);
	}


	//Usuário logado edita sua conta
	public function minhaConta()
	{
		$this->load->model('Usuarios_model', 'usuarios');

		$usuario = $this->session->userdata('usuario')[0];

		$minhaConta = $this->usuarios->minhaConta();
		$data = array(
			"styles" => array(),
			"empresa" => "Psi Pro",
			"title" => "Minhas Sessões",
			"descricao" => "Sesseõs agendadas",
			"pagina" => "Minha Conta",
			"logo" => base_url("assets/img/logo.jpg"),
			"menu" => "person",
			"usuario" => $usuario,
			"minhaConta" => $minhaConta,
			"scripts" => array(
				"plugins/sweetalert2.js",
				"util.js",
				"minha-conta.js"
			),
		);

		$this->template->show("admin/minha_conta_view.php", $data);
	}

}
