<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AutoComplete extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        if (!$this->session->userdata("usuario")) {
            redirect("logoff");
        }

        $this->load->model('Cidade_model', 'cidade');
        $this->load->model('Logradouro_model', 'logradouro');
    }

    public function CEP()
    {
        if (($this->input->get('term')) and ($this->input->get("cidade_id"))) {
            $resultado = $this->logradouro->autocompleteCEP($this->input->get('term'), $this->input->get("cidade_id"));
            
            if ($resultado->num_rows()) {
                echo json_encode($resultado->result());
            }
        }
    }

    public function cidade()
    {
        if (($this->input->get('term')) and ($this->input->get("uf"))) {
            $resultado = $this->cidade->autocompleteCidade($this->input->get('term'), $this->input->get("uf"));
            echo json_encode($resultado);
        }
    }

    public function bairro()
    {
        if (($this->input->get('term')) and ($this->input->get("cidade_id"))) {
            $resultado = $this->logradouro->autocompleteBairro($this->input->get('term'), $this->input->get("cidade_id"));

            if ($resultado->num_rows()) {
                echo json_encode($resultado->result());
            }
        }
    }

    public function autoProjetoId()
    {
        if ($this->input->get('id')) {
            $resultado = $this->projeto->autoProjetoId($this->input->get('id'));
            echo json_encode($resultado);
        }
    }

    public function dados()
    {
        if ($this->input->get('term')) {
            $resultado = $this->dados->autoDados($this->input->get('term'));
            echo json_encode($resultado);
        }
    }

    public function programa()
    {
        if ($this->input->get('term')) {
            $resultado = $this->programa->autoPrograma($this->input->get('term'));
            echo json_encode($resultado);
        }
    }

    public function dimensao()
    {
        if ($this->input->get('term')) {
            $resultado = $this->dimensao->autoDimensao($this->input->get('term'));
            echo json_encode($resultado);
        }
    }

    public function expressao()
    {
        if ($this->input->get('id')) {
            $resultado = $this->expressao->autoExpressao($this->input->get('id'));
            echo json_encode($resultado);
        }
    }

    public function tematicaAspecto()
    {
        if ($this->input->get('id')) {
            $resultado = $this->dimensao->tematicaAspecto($this->input->get('id'));
            echo json_encode($resultado);
        }
    }

    public function autoVinculoIndicador()
    {
        if ($this->input->get('term')) {
            $resultado = $this->indicador->autoVinculoIndicador();
            echo json_encode($resultado);
        }
    }
}
