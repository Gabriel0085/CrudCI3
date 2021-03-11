<?php

/**
 * Model para consultar na tabelas 'alunos'
 * @author Gabriel Henrique Martins <gabriel.hmartins2@gmail.com>
 * @version 1.0
 */
class Alunos_model extends CI_Model {

    /**
     * Nome da tabela e chave principal da mesma
    */
    private $tabela         = 'alunos';
    private $chave_primaria = 'aluno_id';

    /**
     * Construtor, carrega a base de dados da aplicação
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * funçao que retorna todos os alunos da tabela
     * @return array or null
     */
    public function get_alunos() {
        $this->db
            ->select("*")
            ->from($this->tabela);

        $result = $this->db->get();

        if($result->num_rows() > 0){
            return $result->result();
        }
        else{
            return NULL;
        }
    }

    /**
     * funçao que retorna apenas um registro da tabela com base em um id
     * @param id = id da linha que se deseja obter
     * @return array or null
     */
    public function get_aluno($id){
        $this->db->select("*");
        $this->db->from($this->tabela);
        $this->db->where($this->chave_primaria, $id);
        $result = $this->db->get();
        return $result->row();
    }
}

?>