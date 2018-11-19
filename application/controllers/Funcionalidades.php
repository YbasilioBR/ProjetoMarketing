<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Funcionalidades extends CI_Controller
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
        $this->load->model("FuncaoModel", "funcao");
        $dados1['funcoes'] = $this->funcao->listar();

        $this->load->model("TipoModel", "tipo");
        $dados2['tipos'] = $this->tipo->listar();

        $this->load->model("AreaModel", "area");
        $dados3['areas'] = $this->area->listar();

        $this->load->model("RelatorioModel", "relatorio");
        $dados4['relatorios'] = $this->relatorio->listar();
        
        $data = $dados1 + $dados2 + $dados3 + $dados4;

        $this->load->view("Funcionalidades/index", $data);
    }    

}
