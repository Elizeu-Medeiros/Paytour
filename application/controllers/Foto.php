<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fotos extends CI_Controller
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
        $this->load->helper('url');
        // $this->load->model('Fotos_model', 'fotos');
        $this->load->model('Usuarios_model', 'usuarios');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function ajax_import_image()
    {

        if (!$this->input->is_ajax_request()) {
            exit("Nenhum acesso de script direto permitido!");
        }

        $config["upload_path"] = "./tmp/";
        $config["allowed_types"] = "gif|png|jpg|jpeg";
        $config["overwrite"] = TRUE;

        $this->load->library("upload", $config);

        $json = array();
        $json["status"] = 1;

        if (!$this->upload->do_upload("image_file")) {
            $json["status"] = 0;
            $json["error"] = $this->upload->display_errors("", "");
            echo json_encode($json);
        } else {
            if ($this->upload->data()["file_size"] <= 1024) {
                //$file_name = $this->upload->data()["file_name"];
                $this->do_upload();
            } else {
                $json["status"] = 0;
                $json["error"] = "Arquivo não deve ser maior que 1 MB!";
                echo json_encode($json);
            }
        }
        //echo json_encode($json);
    }

    function do_upload()
    {

        $json = array();
        $json["status"] = 1;
        $pk_usuario = $this->input->post('id');

        $config['upload_path'] = './public/images/fotos'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (!empty($_FILES['image_file']['name'])) {
            if ($this->upload->do_upload('image_file')) {
                $gbr = $this->upload->data();
                //Compress Image
                $this->_create_thumbs($gbr['file_name']);

                if (empty($pk_usuario)) {
                    $pk_usuario =  $this->usuarios->insertFotoUsuario($gbr['file_name']);
                } else {
                    $this->usuarios->updateFotoUsuario($gbr['file_name'], $pk_usuario);
                }

                $this->session->set_flashdata('msg', '<div class="alert alert-info">Foto salva com Successo.</div>');
                $file_name = $this->upload->data()["file_name"];
                $json["foto"] = base_url() . "public/images/fotos/large/" . $file_name;
                $json["pk_usuario"] = $pk_usuario;
            } else {
                $json["status"] = 0;
                $json["error"] = $this->upload->display_errors("", "");
            }
        } else {
            $json["status"] = 0;
            $json["error"] = "a imagem está vazia ou o tipo de imagem não é permitido";
        }
        echo json_encode($json);
    }

    function _create_thumbs($file_name)
    {
        // Image resizing config
        $config = array(
            // Large Image
            array(
                'image_library' => 'GD2',
                'source_image'  => './public/images/fotos/' . $file_name,
                'maintain_ratio' => FALSE,
                'x_axis'         => 700,
                'y_axis'        => 467,
                'new_image'     => './public/images/fotos/large/' . $file_name
            ),
            // Medium Image
            array(
                'image_library' => 'GD2',
                'source_image'  => './public/images/fotos/' . $file_name,
                'maintain_ratio' => FALSE,
                'x_axis'         => 600,
                'y_axis'        => 400,
                'new_image'     => './public/images/fotos/medium/' . $file_name
            ),
            // Small Image
            array(
                'image_library' => 'GD2',
                'source_image'  => './public/images/fotos/' . $file_name,
                'maintain_ratio' => FALSE,
                'x_axis'         => 100,
                'y_axis'        => 67,
                'new_image'     => './public/images/fotos/small/' . $file_name
            )
        );

        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item) {
            $this->image_lib->initialize($item);
            if (!$this->image_lib->resize()) {
                return false;
            }
            $this->image_lib->clear();
        }
    }
}
