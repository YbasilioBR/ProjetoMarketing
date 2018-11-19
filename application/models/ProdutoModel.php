<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdutoModel extends CI_Model{
        function __construct() {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->select("id_produto, nome, descricao, valor");        
	    $produtos = $this->db->get('produto')->result();
	    return $produtos;
    }

    public function inserir($data){  
        
        $this->db->set($data);
        $this->db->insert('produto');
    }

    public function alterar($data) {
        $this->db->where('id_produto', $data['id_produto']);
        $this->db->set($data);
        return $this->db->update('produto', $data);
    }

    public function excluir($id) {
        $this->db->where('id_produto', $id);
        $this->db->delete('produto'); 
    }

    public function selecionarCompleto($id_tipo,$id_area,$id_funcao,$id_relatorio){

        $this->db->select("id_produto, nome, descricao, valor");
        $this->db->where('id_tipo', $id_tipo );
        $this->db->where("id_area", $id_area);
        $this->db->where("id_funcao", $id_funcao);
        $this->db->where("id_relatorio", $id_relatorio);

        $produtos = $this->db->get('produto')->result();
        
	    return $produtos;
    }

    public function selecionarPorId($id_produto){

        $this->db->select("id_produto, nome, descricao, valor");
        $this->db->where('id_produto', $id_produto );
        $produtos = $this->db->get('produto')->result();
        
	    return $produtos;
    }


    
}
