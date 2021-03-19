<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load URL helper
		$this->load->helper('url');

		$this->load->library("session");
		if (!$this->session->userdata("usuario")) {
			redirect("logoff");
		}

		$this->load->helper('conversor_helper');
		//  $this->load->model("Menu_model", "menu");
		$this->load->model('Usuarios_model', 'usuarios');
		$this->load->model('TipoUsuario_model', 'tpUsuario');
		$this->load->model('Pessoa_model', 'pessoa');
		$this->load->model('Endereco_model', 'endereco');

		$this->load->library("tema");

		date_default_timezone_set('America/Sao_Paulo');
	}


	public function index()
	{
		$tipo_usuario = $this->tpUsuario->listar_tipo_usuario();

		$data = array(
			"styles" => array(),
			"empresa" => "Psi Pro",
			"title" => "Psic Pro",
			"descricao" => "Psic Pro",
			"pagina" => "Usuários",
			"logo" => base_url("assets/img/logo.jpg"),
			"menu" => "person",
			"tipo_usuario" => $tipo_usuario,
			"styles" =>  array(
				//"bootstrap-datepicker.css",
			),
			"scripts" => array(
				"plugins/jquery.dataTables.min.js",
				"plugins/jquery.dataTables.min.js",

				"plugins/sweetalert2.js",
				"util.js",
				"usuarios.js"
			),
		);

		$this->tema->show("membro/perfil.php", $data);
	}

	public function ajax_minha_conta()
    {
        if (!$this->input->is_ajax_request()) {
           exit("Nenhum acesso de script direto permitido!");
        }

		$json = array();

		$minhaConta = $this->usuarios->minhaConta()[0];
		
		$json["input"]["pk_pessoa"] = $minhaConta->pk_pessoa;
		$json["input"]["pk_endereco"] = $minhaConta->pk_endereco;
		$json["input"]["nome"] = $minhaConta->usu_nome;
		$json["input"]["login"] = $minhaConta->usu_login;
		$json["input"]["telefone"] = $minhaConta->usu_telefone;
		$json["input"]["celular"] = $minhaConta->usu_celular;
		$json["input"]["email"] = $minhaConta->usu_email;
		$json["input"]["photoURL"] = $minhaConta->photoURL;
		$json["input"]["data_nasc"] = $minhaConta->usu_data_nascimento;
	
		$json["input"]["nome_completo"] = $minhaConta->pes_nome;
		$json["input"]["sexo"] = $minhaConta->sexo;
		$json["input"]["cpf"] = $minhaConta->cpf;
		$json["input"]["estado_civil"] = $minhaConta->fk_estado_civil;
	
		$json["input"]["uf"] = $minhaConta->end_uf;
		$json["input"]["cidade"] = $minhaConta->end_cidade;
		$json["input"]["bairro"] = $minhaConta->end_bairro;
		$json["input"]["cep"] = $minhaConta->end_cep;
		$json["input"]["logradouro_id"] = $minhaConta->fk_logradouro;
		$json["input"]["endereco"] = $minhaConta->end_logradouro;
		$json["input"]["numero"] = $minhaConta->end_numero;
		$json["input"]["complemento"] = $minhaConta->end_complemento;

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
			$data["senha"] = password_hash($data["password"], PASSWORD_DEFAULT);

			unset($data["senha_confirm"]);


			$this->usuarios->insertUsuario($data);
		}
		echo json_encode($json);
	}

	//Usuário logado edita sua conta
	public function minha_conta()
	{
	//	$minhaConta = $this->usuarios->minhaConta();

		$data = array(
			"styles" => array(),
			"empresa" => "Psi Pro",
			"pagina" => "Minha Conta",
			"logo" => base_url("assets/img/logo.jpg"),
			"menu" => "person",
			//"submenu" => "",
	//		"minhaConta" => $minhaConta,
			"scripts" => array(
				"plugins/sweetalert2.js",
				"util.js",
				"uploadImg.js",
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
		$json["pk_pessoa"] = "";
		$json["pk_endereco"] = "";
		$json["error_list"] = array();

		$data = $this->input->post();
		$data["pk_usuario"] = $this->session->userdata("usuario")[0]->pk_usuario;

		if (empty($data["nome"])) {
			$json["error_list"]["#nome"] = "Nome é obrigatório!";
		}

		if (empty($data["nome_completo"])) {
			$json["error_list"]["#nome_completo"] = "Nome completo é obrigatório!";
		}

		if (empty($data["cpf"])) {
			$json["error_list"]["#cpf"] = "Cpf é obrigatório!";
		}else{
			$this->load->helper('validar');
			if(!validaCPF($data["cpf"])){
				$json["error_list"]["#cpf"] = "Cpf inválido!";
			}
		}

		if (empty($data["email"])) {
			$json["error_list"]["#email"] = "E-mail é obrigatório!";
		} else {
			if ($this->usuarios->is_duplicated("usu_email", $data["email"], $data["pk_usuario"])) {
				//$json["error_list"]["#email"] = "E-mail já existente!";
			}
		}

		if (!empty($json["error_list"])) {
			$json["status"] = 0;
		} else {
			if ($this->usuarios->updateMinhaContaUsuario($data)) {
				$json["status"] = 1;
			}

			if (empty($data["pk_pessoa"])) {
				$json["pk_pessoa"] = $this->pessoa->insertPessoa($data);
				$json["status"] = 1;
			} else {
				$this->pessoa->updatePessoa($data);
				$json["status"] = 1;
			}

			if (empty($data["pk_endereco"])) {
				$json["pk_endereco"] = $this->endereco->insertEndereco($data);
			} else {
				$this->endereco->updateEndereco($data);
			}
		}
		echo json_encode($json);
	}
}
