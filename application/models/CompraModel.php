<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompraModel extends CI_Model{
        function __construct() {
        parent::__construct();
    }

    public function inserir($data){  
        
        $this->db->insert('compra', $data);
        return true;
    }

    public function inserirAdicional($data){  
        
        $this->db->insert('compra', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

}