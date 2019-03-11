<?php

	//Incluindo os arquivos necessários
    include_once 'models/config.php';
    include_once 'models/dictionary.php';
	include_once 'models/class/User.class.php';
	include_once 'controllers/validate.php';

	//Testando se existe sessões
	session_start();

	if(!isset($_SESSION[md5("user_data")])) {
			header("location: $project_index?error=access_denied");
	}

	$user = $_SESSION[md5("user_data")];	

	//Título da Página
	$page_title = "Administração - ".$user->name;

	//Função gerenciadora de conteudos
	function page_content(){
		validate_options();
	}

	include_once 'views/template.html';

?>