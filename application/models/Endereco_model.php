<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Endereco_model extends CI_Model
{

    public function listEnderecos()
    {
        $this->db->select('pk_endereco, fk_pessoa, fk_logradouro, end_numero, end_complemento')
            ->from('endereco');

        return $this->db->get()->result();
    }

    public function selectEnderecoId($id)
    {
        $this->db->select('pk_endereco, fk_pessoa, fk_logradouro, end_numero, end_complemento')
            ->from('endereco')
            ->where_in('pk_endereco', $id);

        return $this->db->get()->result();
    }

    public function insertEndereco($dados)
    {
        $this->db->set('fk_pessoa', $dados['pk_pessoa'])
            ->set('fk_logradouro', $dados['logradouro_id'])
            ->set('end_uf', strtoupper($dados['uf']))
            ->set('end_cidade', strtoupper($dados['cidade']))
            ->set('end_bairro', strtoupper($dados['bairro']))
            ->set('end_cep', $dados['cep'])
            ->set('end_logradouro', strtoupper($dados['endereco']))
            ->set('end_numero', $dados['numero'])
            ->set('end_complemento', strtoupper($dados['complemento']))
            ->insert('endereco');

        return $this->db->insert_id();
    }

    public function updateEndereco($dados)
    {
        $this->db->set('fk_pessoa', $dados['pk_pessoa'])
            ->set('fk_logradouro', $dados['logradouro_id'])
            ->set('end_uf', strtoupper($dados['uf']))
            ->set('end_cidade', strtoupper($dados['cidade']))
            ->set('end_bairro', strtoupper($dados['bairro']))
            ->set('end_cep', $dados['cep'])
            ->set('end_logradouro', strtoupper($dados['endereco']))
            ->set('end_numero', $dados['numero'])
            ->set('end_complemento', strtoupper($dados['complemento']))
            ->where('pk_endereco', $dados['pk_endereco'])
            ->update('endereco');

        return $this->db->affected_rows();
    }
}
