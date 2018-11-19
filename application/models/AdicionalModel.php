<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdicionalModel extends CI_Model{
        function __construct() {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->select("id_adicional, nome, valor_adicional");        
	    $adicionais = $this->db->get('adicional')->result();
	    return $adicionais;
    }

    public function inserir($data){  
        
        $this->db->set($data);
        $this->db->insert('ADICIONAL_COMPRA');
    }
    
}
