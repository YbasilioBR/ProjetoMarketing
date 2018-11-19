<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('ProdutoModel');
    }

    public function index()
    {
       $texto = "Você está usando o controller produtos";
       $dados = array("mensagem" => $texto);
       $this->load->view("produto/principal", $dados);
       $this->load->view('Home');
    }

    public function listar_produto()
    {
        $this->load->model("ProdutoModel", "produto");
        $dados['resultado'] = $this->produto->listar();
        $this->load->view("produto/index", $dados);
    }

    public function inserir_produto()
    {

        $this->load->view("produto/inserir");

        $descricao = $this->input->post('descricao');
        $valor = $this->input->post('valor');

        $data = array('descricao' => $descricao, 'valor' => $valor);

        if ($this->input->post('add')) {
            $this->ProdutoModel->inserir($data);
            echo "Records Saved Successfully";
        }
    }

    public function carregarProduto()
    {
        $id_tipo = $this->input->get('tipo');
        $id_area = $this->input->get('area');
        $id_funcao = $this->input->get('funcao');
        $id_relatorio = $this->input->get('relatorio');

        $this->load->model("ProdutoModel", "produto");
        $dados['produtos'] = $this->produto->selecionarCompleto($id_tipo,$id_area,$id_funcao,$id_relatorio);

        $this->load->view("produto/show", $dados);

    }

    public function SelecionarCompra()
    {
        $id_produto = $this->input->get('id_produto');

        $this->load->model("ProdutoModel", "produto");
        $dados['produtos'] = $this->produto->selecionarPorId($id_produto);

        $this->load->view("Compra/Index", $dados);

    }

    public function SelecionarCompraId($id_produto = null)
    {
       // $id_produto = $this->input->get('id_produto');

        $this->load->model("ProdutoModel", "produto");
        $dados['produtos'] = $this->produto->selecionarPorId($id_produto);

        $this->load->view("Compra/Index", $dados);

    }

    public function alterar_produto()
    {

        $id_produto = $this->input->post('id_produto');
        $descricao = $this->input->post('descricao');
        $valor = $this->input->post('valor');

        $data = array('id_produto' => $id_produto, 'descricao' => $descricao, 'valor' => $valor);

        if ($this->input->post('alterar')) {
            $this->ProdutoModel->alterar($data);
            echo "Records Updated Successfully";
        }
    }

    public function deletar_produto()
    {

        $idProduto = $this->input->get('Getdelete');

        $this->load->model("ProdutoModel", "produto");

        if ($this->produto->excluir($idProduto)) {
            echo "Records deleted Successfully";
        }

    }

    public function selecionarAdicional(){

        $id_produto = $this->input->post('id_produto');
        $this->load->model("ProdutoModel", "produto");
        $dados1['produtos'] = $this->produto->selecionarPorId($id_produto);

        $dados2['valor_adicional'] = $this->input->post('valor_add');

        $adicionais = $this->input->post('check[]');
        $lenght = sizeof($adicionais);

        $id_adicionais = array(); 

        for ($i = 0; $i < $lenght; $i++)
        {
            array_push($id_adicionais, $adicionais[$i]);
        }

        $dados3["id_adicionais"] = $id_adicionais;


        $data = $dados1 + $dados2 + $dados3;

        $this->load->view("Compra/adicional", $data);
    }

}
