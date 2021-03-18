<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		//Load URL helper
		//$this->load->helper('url');

		date_default_timezone_set('America/Sao_Paulo');
	}

	public function index(){

		$data = array(
            "styles" => array(),
            "empresa" => "Paytour",
            "pagina" => "Login",
            "logo" => base_url("assets/img/logo.jpg"),
            "menu" => "login",
            //"submenu" => "",
            "style" => array("assets-for-demo/vertical-nav.css"),
            "scripts" => array(
                "login.js"
            ),

        );
        $this->template2->show("login.php", $data);

	}

	//Remove todas as sessões e redireciona para tela de login
	public function logoff()
	{
		$this->session->sess_destroy();
		header("Location: " . base_url("login"));
	}

	//Lista todos os usuários cadastrados
	public function ajax_list_user()
	{

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$users = $this->usuarios->get_datatable();

		$data = array();
		foreach ($users as $user) {

			$row = array();
			//	$foto = ($user->foto != "") ? $user->foto : "public/images/default-150x150.png"; //se não tiver imagem no banco, add imagem padrão
			//	$row[] = '<img src="' . base_url($foto) . '" class="rounded mx-auto d-block" style="max-height: 50px">';
			$row[] = $user->usu_nome;
			$zap = '<a href="http://wa.me/55' . $user->usu_celular . '" target="_Blank"> <img src="' . base_url('assets/img/whatsapp-logo-icone.png') . '" style="max-height: 30px; max-height: 30px"></a>';
			$row[] = ($user->usu_celular != 0) ? $zap : "";
			$row[] = $user->usu_ehadministrador;
			$row[] = ($user->usu_estahativo == "s") ? '<img src="' . base_url("assets/img/ativo.png") . '" style="max-height: 30px;" >' : '<img src="' . base_url("public/images/inativo.png") . '" style="max-height: 30px;" >';

			$row[] = '<div style="display: inline-block;">
						<button class="btn btn-primary btn-edit-user"
							user_id="' . $user->pk_usuario . '">
							<i class="fa fa-edit"></i>
						</button>
						<button class="btn btn-danger btn-del-user"
							user_id="' . $user->pk_usuario . '">
							<i class="fa fa-times"></i>
						</button>
					</div>';

			$data[] = $row;
		}

		$json = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->usuarios->records_total(),
			"recordsFiltered" => $this->usuarios->records_filtered(),
			"data" => $data,
		);

		echo json_encode($json);
	}

	//Usuário edita sua conta
	public function ajax_save_user()
	{
		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$data = $this->input->post();

		if (empty($data["nome"])) {
			$json["error_list"]["#nome"] = "Nome Completo é obrigatório!";
		}

		if (empty($data["email"])) {
			$json["error_list"]["#email"] = "E-mail é obrigatório!";
		} else {
			if ($this->usuarios->is_duplicated("usu_email", $data["email"])) {
				$json["error_list"]["#email"] = "E-mail já existente!";
			}
		}

		if (empty($data["password"])) {
			$json["error_list"]["#password"] = "Senha é obrigatório!";
		} else {
			if ($data["password"] != $data["password"]) {
				$json["error_list"]["#password"] = "";
				$json["error_list"]["#password"] = "Senha não conferem!";
			}
		}

		if (!empty($json["error_list"])) {
			$json["status"] = 0;
		} else {
			//criptografa senha
			$data["senha"] = password_hash($data["senha"], PASSWORD_DEFAULT);

			unset($data["senha_confirm"]);

			if ($data["pk_usuario"]) {
				$resultado = $this->usuarios->updateMinhaContaUsuario($data);
			}
		}
		echo json_encode($json);
	}

	//Usuário logado edita sua conta
	public function minha_conta()
	{
		$minhaConta = $this->usuarios->minhaConta();
		$data = array(
			"styles" => array(),
			"empresa" => "Psi Pro",
			"pagina" => "Minha Conta",
			"logo" => base_url("assets/img/logo.jpg"),
			"menu" => "person",
			//"submenu" => "",
			"minhaConta" => $minhaConta,
			"scripts" => array(
				"plugins/sweetalert2.js",
				"util.js",
				"minha-conta.js"
			),
		);

		$this->template->show("admin/minha_conta_view.php", $data);
	}

	//Usuário edita sua conta
	public function ajax_save_minha_conta()
	{
		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$data = $this->input->post();

		if (empty($data["nome"])) {
			$json["error_list"]["#nome"] = "Nome Completo é obrigatório!";
		}

		if (empty($data["email"])) {
			$json["error_list"]["#email"] = "E-mail é obrigatório!";
		} else {
			if ($this->usuarios->is_duplicated("usu_email", $data["email"], $data["pk_usuario"])) {
				$json["error_list"]["#email"] = "E-mail já existente!";
			}
		}

		if (empty($data["senha"])) {
			$json["error_list"]["#senha"] = "Senha é obrigatório!";
		} else {
			if ($data["senha"] != $data["senha_confirm"]) {
				$json["error_list"]["#senha"] = "";
				$json["error_list"]["#senha_confirm"] = "Senha não conferem!";
			}
		}

		if (!empty($json["error_list"])) {
			$json["status"] = 0;
		} else {
			//criptografa senha
			$data["senha"] = password_hash($data["senha"], PASSWORD_DEFAULT);

			unset($data["senha_confirm"]);

			if ($data["pk_usuario"]) {
				$resultado = $this->usuarios->updateMinhaContaUsuario($data);

				if (!$resultado) {
					$json["status"] = 0;
				}
			}
		}
		echo json_encode($json);
	}
}