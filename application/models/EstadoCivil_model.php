<?php

defined('BASEPATH') or exit('No direct script access allowed');

class EstadoCivil_model extends CI_Model
{

    public function listar_estado_civl()
    {
        $this->db->select('pk_estado_civil, estado_civil')
            ->from('estado_civil');
            
        return $this->db->get()->result();
    }

    public function select_tipo_usuario($id)
    {
        $this->db->select('pk_estado_civil, estado_civil')
            ->from('estado_civil')
            ->where_in('pk_estado_civil', $id);

        return $this->db->get()->result();
    }
   
}
