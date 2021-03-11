<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Rotas padrão
 */
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/**
 * Rotas de Login
 */
$route['login-ajax'] = 'Login/ajax_login';
$route['exit'] = 'Login/logoff';


/**
 * Rotas da página principal
 */
$route['home/carregar-aluno']  = 'Home/ajax_carregar_aluno';
$route['home/modal-aluno']     = 'Home/ajax_modal_aluno';
$route['home/import-image']    = 'Home/ajax_import_image';
$route['home/cadastrar-aluno'] = 'Home/ajax_cadastrar_aluno';
$route['home/excluir-aluno']   = 'Home/ajax_excluir_aluno';
