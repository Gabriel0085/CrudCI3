<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe para comunicação com a view home.php
 * @author Gabriel Henrique Martins <gabriel.hmartins2@gmail.com>
 * @version 1.0
 */
class Home extends CI_Controller {
    
	/**
	 * Função que carrega a view table_alunos.php com os dados da model
	 * @return view
	 */
	public function ajax_carregar_aluno(){
		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido");
		}

		$this->load->model("alunos_model");

		$return = $this->alunos_model->get_alunos();

		$data = array(
			"alunos" => $return
		);

		$this->load->view("table_alunos.php", $data);
	}

	/**
	 * Função que ira carregar a view modal_aluno.php com os dados da model
	 * @return view
	 */
	public function ajax_modal_aluno(){
		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido");
		}
		if($this->input->get('alunoId') != ''){
			$this->load->model("alunos_model");
			$return = $this->alunos_model->get_aluno($this->input->get('alunoId'));
			$data = array(
				"aluno" => $return
			);

			$this->load->view("modal_aluno.php", $data);
		}
		else{
			$this->load->view("modal_aluno.php");
		}
	}

	/**
	 * Função que realizar o upload de uma imagem na pagina
	 * @return json
	 */
	public function ajax_import_image(){
		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido");
		}

		$config["upload_path"] = "./tmp/";
		$config["allowed_types"] = "png|jpg";
		$config["overwrite"] = TRUE;
		$this->load->library("upload", $config);

		$json = array();
		$json["status"] = 1;
		
		if(!$this->upload->do_upload("image_file")){
			$json["status"] = 0;
			$json["error"] = $this->upload->display_errors("","");
		}
		else{
			if($this->upload->data()["file_size"] <= 1024){
				$file_name = $this->upload->data()["file_name"];
				$json["img_path"] = base_url() . "tmp/" . $file_name;
			}
			else{
				$json["status"] = 0;
				$json["error"] = "Arquivo não deve ser maior que 1mb";
			}
		}

		echo json_encode($json);
	}
	
	/**
	 * Função de cadastro e edição de um aluno no banco
	 * @return json
	 */
	public function ajax_cadastrar_aluno(){
		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido");
		}

		//array de retorno para o ajax
		$json = array();
		//status da execução
		$json["status"] = 1;
		//erros da execução
		$json["error_list"] = array();

		$this->load->model("global_model");

		$data = $this->input->post();

		//verificação de possíveis erros
		if(empty($data["aluno_nome"])){
			$json["error_list"]["#aluno_nome"] = "Nome do aluno é obrigatório";
		}
		
		if(empty($data["aluno_endereco"])){
			$json["error_list"]["#aluno_endereco"] = "Endereço do aluno é obrigatório";
		}

		if(empty($data["aluno_img"])){
			$json["error_list"]["#aluno_img"] = "Foto do aluno é obrigatório";
		}
		
		if(!empty($json["error_list"])){
			$json["status"] = 0;
		}
		else{
			
			$file_name = basename($data["aluno_img"]);
			$old_path = getcwd() . "/tmp/" . $file_name;
			$new_path = getcwd() . "/public/images/alunos/" . $file_name;
			rename($old_path, $new_path);

			$data["aluno_img"] = "/public/images/alunos/" . $file_name;

			if(empty($data["aluno_id"])){
				$this->global_model->insert('alunos', $data);
			}
			else{
				$aluno_id = $data["aluno_id"];
				unset($data["aluno_id"]);
				$this->global_model->update('alunos', 'aluno_id', $aluno_id, $data);
			}
		}

		echo json_encode($json);
	}

	/**
	 * Função para exclusão de uma aluno
	 * 
	 */
	public function ajax_excluir_aluno(){
		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido");
		}
		
		$this->load->model("global_model");
		$this->global_model->delete('alunos', 'aluno_id', $this->input->post('alunoId'));
		
	}
}

?>