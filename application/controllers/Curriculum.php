<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Curriculum extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->library("session");
		if (!$this->session->userdata("usuario")) {
			redirect("logoff");
		} else {
			$this->usuario = $this->session->userdata('usuario')[0];
		}

		$this->load->model('Pessoa_model', 'pessoa');
		$this->load->model('Usuarios_model', 'user');

		$this->load->library("tema");
		date_default_timezone_set('America/Sao_Paulo');
	}

	public function pessoaCurriculum()
	{
		if (!$this->input->is_ajax_request()) {
			//exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();

		$pessoa = $this->pessoa->pessoaSession();

		$json["input"]["pk_pessoa"] = $pessoa->pk_pessoa;
		$json["input"]["nome_completo"] = $pessoa->pes_nome;
		$json["input"]["email"] = $pessoa->usu_email;
		$json["input"]["telefone"] = $pessoa->usu_telefone;
		$json["input"]["cargo"] = $pessoa->cargo;
		$json["input"]["escolaridade"] = $pessoa->escolaridade;
		$json["input"]["obs"] = $pessoa->obs;
		$json["div"]["preview"] = $pessoa->curriculum;

		echo json_encode($json);
	}

	//Usuário edita sua conta
	public function ajax_save_dados()
	{
		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["pk_pessoa"] = "";
		$json["error_list"] = array();

		$data = $this->input->post();
		$data["pk_usuario"] = $this->session->userdata("usuario")[0]->pk_usuario; //id  do usuário na sessão

		if (empty($data["nome_completo"])) {
			$json["error_list"]["#nome_completo"] = "Nome é obrigatório!";
		}

		if (empty($data["email"])) {
			$json["error_list"]["#email"] = "E-mail é obrigatório!";
		} //else {
		//	if ($this->usuarios->is_duplicated("usu_email", $data["email"], $data["pk_usuario"])) {
		//$json["error_list"]["#email"] = "E-mail já existente!";
		//	}
		//	}

		if (empty($data["telefone"])) {
			$json["error_list"]["#telefone"] = "Telefone é obrigatório!";
		}

		if (empty($data["cargo"])) {
			$json["error_list"]["#cargo"] = "Digite o cargo pretendido!";
		}

		if (empty($data["escolaridade"])) {
			$json["error_list"]["#escolaridade"] = "Selecione sua escolaridade";
		}

		if (!empty($json["error_list"])) {
			$json["status"] = 0;
		} else {
			if ($this->user->updateTelefoneEmail($data)) {
				$json["status"] = 1;
			}

			if (empty($data["pk_pessoa"])) {
				$data["pk_pessoa"] = $this->pessoa->insertPessoaDados($data);
				$json["pk_pessoa"] = $data["pk_pessoa"];
				$json["status"] = 1;
			} else {
				$this->pessoa->updatePessoaDados($data);
				$json["status"] = 1;
			}
		}
		echo json_encode($json);
	}

	public function ajax_enviar_doc()
	{

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$config["upload_path"] = "curriculos/";
		$config["allowed_types"] = "doc|docx|pdf";
		$config["overwrite"] = TRUE;
		$config['max_size'] = "1024";
		$config['encrypt_name'] = TRUE;

		$this->load->library("upload", $config);

		$json = array();
		$json["status"] = 1;

		$data["pk_usuario"] = $this->session->userdata("usuario")[0]->pk_usuario; //id  do usuário na sessão

		$this->upload->initialize($config);

		if (!empty($_FILES['file']['name'])) {

			if ($this->upload->do_upload('file')) {
				$data["curriculum"] = $this->upload->data()['file_name'];

				if (!empty($this->input->post('pk_pessoa'))) {
					$pessoa = $this->pessoa->selectCurriculum($this->input->post('pk_pessoa'));
					
					$data['pk_pessoa'] = $this->input->post('pk_pessoa');
					
					if($pessoa[0]->curriculum != $data["curriculum"]){
						if($this->pessoa->updateCurriculum($data)){
							unlink(FCPATH . 'curriculos\\' . $pessoa[0]->curriculum);
						}
					}
				} else {
					$json["pk_pessoa"] =  $this->pessoa->insertCurriculum($data);
				}
			} else {
				$json["status"] = 0;
				$json["error"] = $this->upload->display_errors("", "");
			}
		} else {
			$json["status"] = 0;
			$json["error"] = "O arquivo está vazia ou o tipo de documento não é permitido";
		}
		echo json_encode($json);
	}

	public function ajax_remover_doc()
	{
		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;

		$id = $this->input->post("pk_pessoa");

		($pessoa = $this->pessoa->selectCurriculum($id)) ? $doc = $pessoa[0]->curriculum : $doc = "";

		if ($this->pessoa->apagarCurriculum($id)) {
			unlink(FCPATH . 'curriculos\\' . $doc);
			$json["status"] = 1;
		}

		echo json_encode($json);
	}
}