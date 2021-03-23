<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
  public function __construct()
  {
    setlocale(LC_ALL, 'pt_BR.UTF8');
    mb_internal_encoding('UTF8');
    mb_regex_encoding('UTF8');
    date_default_timezone_set('America/Sao_Paulo');
  }

  public function is_duplicated($field, $value, $id = null)
  {
    if (!empty($id)) {
      $this->db->where("u.pk_usuario <>", $id);
    }

    $query = $this->db->from("usuarios u")
      
      ->join('tipo_usuario tu', 'tu.pk_tipo_usuario = u.fk_tipo_usuario', 'left')
      ->join('pessoa p', ' p.fk_usuario = u.pk_usuario', 'left')
      ->where($field, $value);

    return $query->get()->result();
  }

  public $column_search = array("usu_nome", "usu_celular", "usu_ehadministrador", "usu_estahativo");
  public $column_order = array("usu_nome", "usu_celular", "usu_ehadministrador", "usu_estahativo");

  private function _get_datatable()
  {
    $search = null;

    if ($this->input->post("search")) {
      $search = $this->input->post("search")["value"];
    }

    $order_column = null;
    $order_dir = null;
    $order = $this->input->post("order");

    if (isset($order)) {
      $order_column = $order[0]["column"];
      $order_dir = $order[0]["dir"];
    }

    $this->db->select('pk_usuario, usu_login, usu_senha, usu_nome, usu_sexo, usu_endereco, usu_telefone
                      , usu_celular, usu_email, usu_ehadministrador, usu_estahativo, usu_data_nascimento
                      , usu_dataadmissao, usu_data_cadastro, usu_data_atualizacao')
      ->from('usuarios');

    if (isset($search)) {
      $first = true;
      foreach ($this->column_search as $field) {
        if ($first) {
          $this->db->group_start();
          $this->db->like($field, $search);
          $first = false;
        } else {
          $this->db->or_like($field, $search);
        }
      }

      if (!$first) {
        $this->db->group_end();
      }
    }

    if (isset($order)) {

      $this->db->order_by($this->column_order[$order_column], $order_dir);
    }
  }

  public function get_datatable()
  {
    $length = $this->input->post("length");

    $start = $this->input->post("start");

    $this->_get_datatable();

    if (isset($length) && $length != -1) {
      $this->db->limit($length, $start);
    }

    return $this->db->get()->result();
  }

  public function records_filtered()
  {
    $this->_get_datatable();

    return $this->db->get()->num_rows();
  }

  public function records_total()
  {
    $this->db->from("usuarios");
    return $this->db->count_all_results();
  }

  public function get_data($id, $select = null)
  {
    if (!empty($select)) {
      $this->db->select($select);
    }

    $this->db->select('u.pk_usuario,  u.usu_nome, u.usu_data_nascimento, u.usu_email, u.usu_celular, u.photoURL, u.usu_estahativo, u.usu_senha
                      , u.usu_data_atualizacao, u.usu_data_cadastro
                      , p.pk_pessoa, p.pes_nome
                      , tu.pk_tipo_usuario, tu.tipo')
      ->from('usuarios u')
      // ->join('nivel_acesso na', 'na.fk_usuario = u.pk_usuario', 'left')
      ->join('tipo_usuario tu', 'tu.pk_tipo_usuario = u.fk_tipo_usuario', 'left')
      ->join('pessoa p', ' p.fk_usuario = u.pk_usuario', 'left')
      ->where('u.pk_usuario', $id);

    return $this->db->get()->result();
  }

  public function autoUsuario($nome)
  {
    $this->db->select('pk_usuario,  nome, data_nascimento, email, status, senha, data_atualizacao, data_cadastro')
      ->from('usuarios')
      ->like('nome', $nome);

    return $this->db->get()->result();
  }

  public function selectUsuarios()
  {
    $this->db->select('pk_usuario,  nome, data_nascimento, email, status, senha, data_atualizacao, data_cadastro')
      ->from('usuarios');

    return $this->db->get()->result();
  }

  public function consultarUsuario($id)
  {
    $this->db->select('pk_usuario, nome, data_nascimento, email, status, senha, data_atualizacao, data_cadastro')
      ->from('usuarios')
      ->where('pk_usuario', $id);

    return $this->db->get()->result();
  }

  public function minhaConta()
  {
    $this->db->select('u.pk_usuario, u.usu_login, u.usu_nome, u.usu_sexo, u.usu_endereco, u.usu_telefone, u.usu_celular, u.usu_email
                      , u.usu_estahativo, u.photoURL, DATE_FORMAT(u.usu_data_nascimento, "%d/%m/%Y") usu_data_nascimento, u.usu_dataadmissao
                      , p.pk_pessoa, p.pes_nome, p.sexo, p.cpf, p.fk_estado_civil  
                      , e.pk_endereco, e.fk_logradouro, e.end_uf, e.end_cidade, e.end_bairro, e.end_cep, e.end_logradouro, e.end_numero, e.end_complemento, e.end_referencia
                      , l.CEP, id_logradouro, l.tipo, l.descricao endereco, l.id_cidade, l.UF, l.complemento, l.descricao_sem_numero
                      , l.descricao_cidade, l.codigo_cidade_ibge, l.descricao_bairro')
      ->from('usuarios u')
      ->join('tipo_usuario tu', 'tu.pk_tipo_usuario = u.fk_tipo_usuario', 'left')
      ->join('pessoa p', ' p.fk_usuario = u.pk_usuario', 'left')
      ->join('endereco e', ' e.fk_pessoa = p.pk_pessoa', 'left')
      ->join('logradouro l', ' l.id_logradouro = e.fk_logradouro', 'left')
      ->where('pk_usuario', $this->session->userdata("usuario")[0]->pk_usuario);

    return $this->db->get()->result();
  }

  public function consultausuario($dados = null)
  {

    if ($dados !== null) {

      extract($dados);

      $this->db->select('pk_usuario,  nome, data_nascimento, email, status, senha, data_atualizacao, data_cadastro')
        ->from('usuarios');

      if (!empty($dados['nome'])) {
        $this->db->like('nome', $dados['nome']);
      }

      if (!empty($dados['email'])) {
        $this->db->where('email', $dados['email']);
      }

      $query = $this->db->get();

      if ($query->num_rows() >= 1) {

        return $query->result();
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function autenticar($dados)
  {
    $this->db->query('SET lc_time_names = "pt_br"');
    $this->db->select('u.pk_usuario, u.usu_login, u.usu_senha, u.usu_nome, u.usu_sexo, u.usu_endereco, u.usu_telefone, u.usu_celular
                      , u.usu_email, u.usu_estahativo, u.usu_dataadmissao
                      p.pk_pessoa')
      ->from('usuarios u')
      ->join('pessoa p', 'p.fk_usuario = u.pk_usuario', 'left')
      ->where($dados);

    return $this->db->get()->result();
  }

  public function selectUsuarioAcesso($id)
  {
    $this->db->select('pk_usuario, usu_login, usu_senha, fk_pessoa, usu_endereco, usu_telefone, usu_celular, usu_email
                      , usu_ehadministrador, usu_estahativo, usu_data_nascimento, usu_dataadmissao')
      ->from('usuarios')
      ->where('u.pk_usuario', $id)
      ->where('u.data_acesso IS NOT NULL')
      ->where('u.status', '1');

    return $this->db->get()->result();
  }

  public function user_all()
  {
    $this->db->select('
          u.pk_usuario, u.nome
          ');

    $res = $this->db->get('usuarios as u');

    return $res;
  }


  public function insertUsuario($dados)
  {
    $this->db->set('usu_nome', strtoupper($dados['nome']))
      ->set('usu_data_nascimento', data_br_to_us($dados['data_nascimento']))
      ->set('usu_email', strtoupper($dados['email']))
      ->set('usu_celular', numeroTel($dados['celular']))
      ->set('usu_telefone', numeroTel($dados['telefone']))
      ->set('usu_login', $dados['login'])
      ->set('usu_senha', $dados['senha'])
      ->set('usu_data_cadastro', date('Y-m-d H:i:s'))
      ->update('usuarios');

    return $this->db->insert_id();
  }

  public function insertUsuarioSocial($dados)
  {

    $this->db->set('usu_nome', strtoupper($dados->displayName))
      ->set('identifier', $dados->identifier)
      ->set('usu_email', strtoupper($dados->email))
      ->set('usu_celular', $dados->phone)
      ->set('usu_login', $dados->email)
      ->set('profileURL', $dados->profileURL)
      ->set('photoURL', $dados->photoURL)
      ->set('usu_data_cadastro', date('Y-m-d H:i:s'))
      ->insert('usuarios');

    return $this->db->insert_id();
  }

  public function updateUsuario($dados)
  {
    $this->db->set('usu_nome', strtoupper($dados['nome']))
      ->set('usu_data_nascimento', data_br_to_us($dados['data_nascimento']))
      ->set('usu_email', strtoupper($dados['email']))
      ->set('usu_celular', numeroTel($dados['celular']))
      ->set('usu_telefone', numeroTel($dados['telefone']))
      ->set('usu_login', $dados['login'])
      ->set('usu_senha', $dados['senha'])
      ->set('usu_data_cadastro', date('Y-m-d H:i:s'))
      ->where('pk_usuario', $dados['pk_usuario'])
      ->update('usuarios');

    return $this->db->affected_rows();
  }

  public function insertFotoUsuario($foto)
  {
    $this->db->set('foto', "public/images/fotos/" . $foto)
      ->insert('usuarios');

    return $this->db->insert_id();
  }

  public function updateFotoUsuario($foto, $pk_usuario)
  {
    $this->db->set('foto', "public/images/fotos/" . $foto)
      ->where('pk_usuario', $pk_usuario)
      ->update('usuarios');

    return $this->db->affected_rows();
  }


  public function updateUsuarioAcesso($id)
  {
    $this->db->set('data_acesso', date('Y-m-d H:i:s'))
      ->where('pk_usuario', $id)
      ->update('usuarios');

    return $this->db->affected_rows();
  }

  public function updateUsuarioStatus($id, $status)
  {
    $this->db->set('status', $status)
      ->where('pk_usuario', $id)
      ->update('usuarios');

    return $this->db->affected_rows();
  }

  public function updateMinhaContaUsuario($dados)
  {
    $this->db->set('usu_nome', strtoupper($dados['nome']))
      ->set('usu_data_nascimento', data_br_to_us($dados['data_nasc']))
      ->set('usu_email', strtoupper($dados['email']))
      ->set('usu_celular', numeroTel($dados['celular']))
      ->set('usu_telefone', numeroTel($dados['telefone']))
      ->set('usu_login', $dados['login'])
      ->set('usu_data_atualizacao', date('Y-m-d H:i:s'))
      ->where('pk_usuario', $dados['pk_usuario'])
      ->update('usuarios');

    return $this->db->affected_rows();
  }

  public function updateTelefoneEmail($dados)
  {
    $this->db->set('usu_telefone', $dados['telefone'])
      ->set('usu_email', $dados['email'])
      ->set('usu_data_atualizacao', date('Y-m-d H:i:s'))
      ->where('pk_usuario', $dados['pk_usuario'])
      ->update('usuarios');

    return $this->db->affected_rows();
  }

  public function deleteUsuario($idlogin)
  {
    $this->db->where('pk_usuario', $idlogin)
      ->delete('usuarios');

    return $this->db->affected_rows();
  }
}
