<?php

/**
 * Model genérica para execução de métodos padrões
 * @author Gabriel Henrique Martins <gabriel.hmartins2@gmail.com>
 * @version 1.0
 */
class Global_model extends CI_Model {

    /**
     * Construtor - carrega a base de dados do sistema
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Função de inserção
     * @param tabela = Nome da tabela do banco
     * @param data   = dados que se deseja inserir 
     */
    public function insert($tabela, $data){
        $this->db->insert($tabela, $data);
    }

    /**
     * Função de inserção
     * @param tabela         = Nome da tabela do banco
     * @param chave_primaria = chave primaria da tabela em questão
     * @param id             = id chave da tabela
     * @param data           = dados que se deseja inserir 
     */
   public function update($tabela, $chave_primaria, $id, $data){
        $this->db->where($chave_primaria, $id);
        $this->db->update($tabela, $data);
    }
    
    /**
     * Função de inserção
     * @param tabela         = Nome da tabela do banco
     * @param chave_primaria = chave primaria da tabela em questão
     * @param id             = id chave da tabela
     */
    public function delete($tabela, $chave_primaria, $id){
        $this->db->where($chave_primaria, $id);
        $this->db->delete($tabela);
   }
}

?>