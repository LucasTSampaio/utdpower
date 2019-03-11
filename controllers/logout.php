<?php

	//Incluindo os arquivos necessários
	include_once dirname(__DIR__)."/models/config.php";
	include_once $project_path."/models/class/Connect.class.php";
	include_once $project_path."/models/class/Manager.class.php";
	include_once $project_path."/models/class/User.class.php";

	//Iniciando a session
	session_start();			

	if(!isset($_SESSION[md5("user_data")])) {
		header("location: $project_index?error=access_denied");
	} else {

		//Recuperando os dados da sessão
		$user = $_SESSION[md5("user_data")];

		//FIltro de busca
		$filter['id_user'] = $user->id_user;


		//Alterando o ultimo acesso do usuário
		$manager = new Manager;
		$manager->update_common("users", array("user_last_access" => date("Y-m-d H:i:s")), $filter);

		session_destroy();

		header("location: $project_index?success=ending_session");
	}

?>