<?php

/**
 * Model para consultar na tabelas 'usuarios'
 * @author Gabriel Henrique Martins <gabriel.hmartins2@gmail.com>
 * @version 1.0
 */
class Users_model extends CI_Model {

    /**
     * Nome da tabela e chave principal da mesma
    */
    private $tabela         = 'usuarios';
    private $chave_primaria = 'usuario_id';

    /**
     * construtor carrega a base de dados que será utilizada
    */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retorna dados de um usuário baseado em seu login
     * @param usuario_login = nome de login do usuario
     * @return array ou null
    */
    public function get_user_data($usuario_login) {
        $this->db
            ->select("*")
            ->from($this->tabela)
            ->where("usuario_login", $usuario_login);

        $result = $this->db->get();

        if($result->num_rows() > 0){
            return $result->row();
        }
        else{
            return NULL;
        }
    }
}

?>