<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TipoUsuario_model extends CI_Model
{

    public function listar_tipo_usuario()
    {
        $this->db->select('pk_tipo_usuario, tipo')
            ->from('tipo_usuario');
        return $this->db->get()->result();
    }

    public function select_tipo_usuario($idTp)
    {
        $this->db->select('pk_tipo_usuario, tipo')
            ->from('tipo_usuario')
            ->where_in('pk_tipo_usuario', $idTp);
        return $this->db->get()->result();
    }

    public function insert_tipo_usuario($tipo)
    {
        $this->db->set('tipo',  strtoupper($tipo))
            ->insert('tipo_usuario');
        return $this->db->insert_id();
    }

    public function update_tipo_usuario($idTp, $tipo)
    {
        $this->db->set('tipo',  strtoupper($tipo))
            ->where('id', $idTp)
            ->update('tipo_usuario');
        return $this->db->affected_rows();
    }

    public function delete_tipo_usuario($idTp)
    {
        $this->db->where('pk_tipo_usuario', $idTp)
            ->delete('tipo_usuario');
        return $this->db->affected_rows();
    }
}
