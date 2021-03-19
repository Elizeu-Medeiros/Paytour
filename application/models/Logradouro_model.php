<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logradouro_model extends CI_Model
{

    public function autocompleteCEP($cep, $cidade_id)
    {
        $this->db->select('CEP value, id_logradouro, tipo, descricao, id_cidade, UF, complemento, descricao_sem_numero, descricao_cidade, codigo_cidade_ibge, descricao_bairro')
            ->from('logradouro')
            ->where('id_cidade', $cidade_id)
            ->like('CEP', $cep);

        return $this->db->get();
    }

    public function autocompleteBairro($bairro, $cidade_id)
    {
        $this->db->select('CEP, id_logradouro, tipo, descricao, id_cidade, UF, complemento, descricao_sem_numero, descricao_cidade
                        , codigo_cidade_ibge, descricao_bairro value')
            ->from('logradouro')
            ->where('id_cidade', $cidade_id)
            ->like('descricao_bairro', $bairro)
            ->limit(1);

        return $this->db->get();
    }

    public function is_duplicated($field, $value, $id = null)
    {
        if (!empty($id)) {
            $this->db->where("id_logradouro <>", $id);
        }

        $this->db->from("logradouro");
        $this->db->where($field, $value);

        return $this->db->get()->num_rows() > 0;
    }

    public function selectWhere($field, $value, $id = null)
    {
        if (!empty($id)) {
            $this->db->where("id_logradouro <>", $id);
        }

        $this->db->from("logradouro");
        $this->db->where($field, $value);

        return $this->db->get()->result();
    }

    public function listLogradouros()
    {
        $this->db->select('CEP, id_logradouro, tipo, descricao, id_cidade, UF, complemento, descricao_sem_numero, descricao_cidade, codigo_cidade_ibge, descricao_bairro')
            ->from('logradouro');

        return $this->db->get()->result();
    }

    public function selectLogradouroId($id)
    {
        $this->db->select('CEP, id_logradouro, tipo, descricao, id_cidade, UF, complemento, descricao_sem_numero, descricao_cidade, codigo_cidade_ibge, descricao_bairro')
            ->from('logradouro')
            ->where('id_logradouro', $id);

        return $this->db->get()->result();
    }

    public function insertLogradouro($dados)
    {
        $this->db->insert('logradouro', $dados);

        return $this->db->insert_id();
    }

    public function updateCidade($dados)
    {

        $this->db->where('id_logradouro', $dados["id_logradouro"]);
        $this->db->update('logradouro', $dados);

        return $this->db->affected_rows();
    }
}
