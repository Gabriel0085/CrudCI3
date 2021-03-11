<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe responsável pelo login
 * @author Gabriel Henrique Martins <gabriel.hmartins2@gmail.com>
 * @version 1.0
 */
class Login extends CI_Controller {
    
	/**
	 * Contrutor - apenas carrega a sessão
	 */
	public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

	/**
	 * index - fará a verificação se o usuário já esta logado ou não
	 * 
	 * @return view
	 */
    public function index(){
        $this->load->model("users_model");
		
		//caso tenha o id do usuário carregado em sessão redireciona para a home
		if($this->session->userdata("usuario_id")){
			//atributos da página, como scripst e arqs css
			$data = [
				"styles" => [
				],

				"scripts" => [
					"sweetalert.js",
					"util.js",
					"home.js", 
				],
				"user_id" => $this->session->userdata("usuario_id")
			];
			$this->template->show("home.php", $data);
		}
		else{
			$data = array(
				"scripts" => array(
					"util.js",
					"login.js" 
				)
			);
			$this->template->show("login.php", $data);
		}
    }

	/**
	 * Destroi a sessão do usuário, o obrigando a fazer login novamente
	 * 
	 * @return view
	 */
	public function logoff(){
		$this->session->sess_destroy();
		header("Location: " . base_url());
	}

	/**
	 * verificação de login
	 * 
	 * @return json
	 */
    public function ajax_login(){

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = [
			'status' => 1,
			'error_list' => []
		];

		$login = $this->input->post("usuario_login");
		$senha = $this->input->post("usuario_senha");
		
		if (empty($login)) {
			$json["status"] = 0;
			$json["error_list"]["#usuario_login"] = "Usuário não pode ser vazio!";
		} 
		else {
			$this->load->model("users_model");
			$result = $this->users_model->get_user_data($login);
			
			if ($result) {
				$usuario_id = $result->usuario_id;
				//A senha no banco esta criptografada
				$senha_hash = $result->usuario_senha;
				
				//Descriptografia da senha para verificação
				if (password_verify($senha, $senha_hash)) {
					$this->session->set_userdata("usuario_id", $usuario_id);
				} 
				else {
					$json["status"] = 0;
				}
			} 
			else {
				$json["status"] = 0;
			}
			if ($json["status"] == 0) {
				$json["error_list"]["#btn_login"] = "Usuário e/ou senha incorretos!";
			}
		}
		echo json_encode($json);
	}
}

?>