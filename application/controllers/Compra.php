<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Compra extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('CompraModel');
        $this->load->model('AdicionalModel');
    }

    public function InserirCompra()
    {

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $id_produto = $this->input->post('id_produto');
        $valor = $this->input->post('valor');

        $data = array('nome' => $nome, 'email' => $email, 'id_produto' => $id_produto, 'valor' => $valor);

        if($this->CompraModel->inserir($data)){
            $data['alert'] = 'success';
        }else{
            $data['alert'] = 'failed';
        }
        
        $this->load->view('Home', $data);

    }

    public function InserirCompraAdicional()
    {

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $id_produto = $this->input->post('id_produto');
        $valor = $this->input->post('valor');
        $adicionais = $this->input->post('id_adicionais[]');
        $lenght = sizeof($adicionais);

        $id_adicionais = array(); 

        for ($i = 0; $i < $lenght; $i++)
        {
            array_push($id_adicionais, $adicionais[$i]);
        }

        $data = array('nome' => $nome, 'email' => $email, 'id_produto' => $id_produto, 'valor' => $valor);

        $id_compra = $this->CompraModel->inserirAdicional($data);        

        foreach($id_adicionais as $id_adicional){

            $data = array('id_compra' => $id_compra, 'id_adicional' => $id_adicional);
            
            $this->AdicionalModel->inserir($data);

        }
        
       
        $this->load->view('Home', $data);
    }


}