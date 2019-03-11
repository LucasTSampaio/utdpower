<?php

	include_once '_helpers.php';

	do_includes();
	do_session();

	//Receber os dados do formulário
	$data = $_POST;


	$data['course_date_in'] = do_date($data['course_date_in']);
	$data['course_date_end'] = do_date($data['course_date_end']);

	//Formatando os campos necessários
	//$data['user_password'] = do_password($data['user_password']); 
	//$data['user_birth'] = do_date($data['user_birth']); 

	//
	/*
	if ($_FILES['user_photo']['name'] == "") {
		$data['user_photo'] = "user.png";
	} else {
		$data['user_photo'] = date('YmdHis').'_'.$_FILES['user_photo']['name'];
	}
	*/

	//Objeto do tipo Manager
	$manager = new Manager;
	//Inserindo no BD
	$res = $manager->insert_common("courses", $data, NULL);

	if ($res) {
		header("location: $project_index/".$user->profile_page."/?option=list_courses$success=insert_success");
	} else {
		header("location: $project_index/".$user->profile_page."/?option=list_courses$error=insert_error");
	}

	//Fazendo o upload da imagem
	//do_upload($GLOBALS['project_path']."/views/profile_images/", $_FILES['user_photo']['tmp_name'],$_FILES['user_photo']['name']);

	# Enviando os dados pro banco de dados
	//insert("users",$user,NULL);


?>