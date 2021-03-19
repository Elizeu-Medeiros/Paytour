<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cidade_model extends CI_Model
{

    public function autocompleteCidade($cidade, $uf)
    {
        $this->db->select('id_cidade, descricao value')
            ->from('cidade')
            ->where('UF', $uf)
            ->like('descricao', $cidade);

        return $this->db->get()->result();
    }

    public function is_duplicated($field, $value, $id = null)
    {
        if (!empty($id)) {
            $this->db->where("id_cidade <>", $id);
        }

        $this->db->from("cidade");
        $this->db->where($field, $value);

        return $this->db->get()->num_rows() > 0;
    }

    public function selectWhere($field, $value, $id = null)
    {
        if (!empty($id)) {
            $this->db->where("id_cidade <>", $id);
        }

        $this->db->from("cidade");
        $this->db->where($field, $value);

        return $this->db->get()->result();
    }

    public function listCidades()
    {
        $this->db->select('id_cidade, descricao, uf, codigo_ibge, ddd')
            ->from('cidade');

        return $this->db->get()->result();
    }

    public function selectCidadeId($id)
    {
        $this->db->select('id_cidade, descricao, uf, codigo_ibge, ddd')
            ->from('cidade')
            ->where('id_cidade', $id);

        return $this->db->get()->result();
    }

    public function insertCidade($dados)
    {
        $this->db->insert('cidade', $dados);

        return $this->db->insert_id();
    }

    public function updateCidade($dados)
    {

        $this->db->where('id_cidade', $dados)
            ->update('cidade', $dados);

        return $this->db->affected_rows();
    }
}
