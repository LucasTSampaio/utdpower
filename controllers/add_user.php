<?php

	include_once '_helpers.php';


	do_includes();
	do_session();

	//Receber os dados do formulário
	$data = $_POST;

	//Formatando os campos necessários
	$data['user_password'] = do_password($data['user_password']); 
	$data['user_birth'] = do_date($data['user_birth']); 

	//
	if ($_FILES['user_photo']['name'] == "") {
		$data['user_photo'] = "user.png";
	} else {
		$data['user_photo'] = date('YmdHis').'_'.$_FILES['user_photo']['name'];
	}

	//Objeto do tipo Manager
	$manager = new Manager;
	//Inserindo no BD
	$manager->insert_common("users", $data, NULL);


	//Fazendo o upload da imagem
	do_upload($GLOBALS['project_path']."/views/profile_images/", $_FILES['user_photo']['tmp_name'],$_FILES['user_photo']['name']);

	//Redirecionando
	header("location: $project_index/".$user->profile_page."?option=list_users&success=insert_success");

	var_dump($data);
	# Enviando os dados pro banco de dados
	//insert("users",$user,NULL);


?>