<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Configuracao extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('FuncaoModel');
        $this->load->model('TipoModel');
    }

    public function index()
    {
        $this->load->model("ProdutoModel", "produto");
        $dados1['produtos'] = $this->produto->listar();

        $this->load->model("AdicionalModel", "adicional");
        $dados2['adicionais'] = $this->adicional->listar();

        $data = $dados1 + $dados2;

        $this->load->view("Configuracao/index", $data);
    }    

}
