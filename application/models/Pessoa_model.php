<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pessoa_model extends CI_Model
{
  public function __construct()
  {
    setlocale(LC_ALL, 'pt_BR.UTF8');
    mb_internal_encoding('UTF8');
    mb_regex_encoding('UTF8');
    date_default_timezone_set('America/Sao_Paulo');
  }

  public function selectCurriculum( $id )
  {

    $this->db->from("pessoa");
    $this->db->where('pk_pessoa', $id);

    return $this->db->get()->result();
  }

  public function is_duplicated($field, $value, $id = null)
  {
    if (!empty($id)) {
      $this->db->where("pk_pessoa <>", $id);
    }

    $this->db->from("pessoa");
    $this->db->where($field, $value);

    return $this->db->get()->num_rows() > 0;
  }

  public function get_data($id, $select = null)
  {
    if (!empty($select)) {
      $this->db->select($select);
    }

    $this->db->select('u.pk_pessoa,  u.nome, u.data_nascimento, u.email, u.celular, u.foto, u.status, u.senha
                      , u.data_atualizacao, u.data_cadastro, tu.pk_tipo_usuario, tu.tipo')
      ->from('pessoa')
      ->join('tipo_usuario tu', 'tu.pk_tipo_usuario = u.fk_tipo_usuario', 'left')
      ->where('u.pk_pessoa', $id);

    return $this->db->get()->result()[0];
  }

  public function pessoaSession()
  {
    $this->db->select('p.pk_pessoa, p.pes_nome, u.usu_email, u.usu_telefone, p.cargo, p.escolaridade, p.obs, p.curriculum')
      ->from('pessoa p')
      ->join('usuarios u', 'u.pk_usuario = p.fk_usuario', 'left')
      ->where('u.pk_usuario', $this->session->userdata("usuario")[0]->pk_usuario);

    return $this->db->get()->result()[0];
  }

  public function autoUsuario($nome)
  {
    $this->db->select('pk_pessoa,  pes_nome')
      ->from('pessoa')
      ->like('nome', $nome);

    return $this->db->get()->result();
  }

  public function selectPessoa()
  {
    $this->db->select('pk_pessoa,  pes_nome')
      ->from('pessoa');

    return $this->db->get()->result();
  }

  public function selectPessoaId($id)
  {
    $this->db->select('pk_pessoa, pes_nome, fk_usuario')
      ->from('pessoa')
      ->where('pk_pessoa', $id);

    return $this->db->get()->result();
  }

  public function insertPessoa($dados)
  {
    $this->db->set('pes_nome', strtoupper($dados['nome_completo']))
      ->set('fk_usuario', $dados['pk_usuario'])
      ->set('sexo', $dados['sexo'])
      ->set('cpf', $dados['cpf'])
      ->set('fk_estado_civil', $dados['estado_civil'])
      ->insert('pessoa');

    return $this->db->insert_id();
  }

  public function insertCurriculum($dados)
  {
    $this->db->set('curriculum', $dados['curriculum'])
      ->set('fk_usuario', $dados['pk_usuario'])
      ->insert('pessoa');

    return $this->db->insert_id();
  }
  
  public function insertPessoaDados($dados)
  {
    $this->db->set('pes_nome', strtoupper($dados['nome_completo']))
      ->set('fk_usuario', $dados['pk_usuario'])
      ->set('cargo', strtoupper($dados["cargo"]))
      ->set('escolaridade', strtoupper($dados["escolaridade"]))
      ->set('obs', strtoupper($dados["obs"]))
      ->insert('pessoa');

    return $this->db->insert_id();
  }


  public function updatePessoa($data)
  {
    $this->db->set('pes_nome', strtoupper($data["nome_completo"]))
      ->set('sexo',  strtoupper($data["sexo"]))
      ->set('cpf', $data["cpf"])
      ->set('fk_estado_civil', $data["estado_civil"])
      ->where('pk_pessoa', $data["pk_pessoa"])
      ->update('pessoa');

    return $this->db->affected_rows();
  }

  public function updatePessoaDados($data)
  {

    $this->db->set('pes_nome', strtoupper($data["nome_completo"]))
      ->set('cargo', strtoupper($data["cargo"]))
      ->set('escolaridade', strtoupper($data["escolaridade"]))
      ->set('obs', strtoupper($data["obs"]))
      ->where('pk_pessoa', $data["pk_pessoa"])
      ->update('pessoa'); 

    return $this->db->affected_rows();
  }

  public function updateCurriculum($data)
  {

    $this->db->set('curriculum', $data["curriculum"])
      ->where('pk_pessoa', $data["pk_pessoa"])
      ->update('pessoa');
      
    return $this->db->affected_rows();
  }

  public function apagarCurriculum($id)
  {

    $this->db->set('curriculum', '')
      ->where('pk_pessoa', $id)
      ->update('pessoa');
      
    return $this->db->affected_rows();
  }

}
