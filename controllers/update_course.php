<?php

	include_once '_helpers.php';


	do_includes();
	do_session();

	//Receber os dados do formulário
	$data = $_POST;


	$data['course_date_in'] = do_date($data['course_date_in']);
	$data['course_date_end'] = do_date($data['course_date_end']);

/*	$data['user_password'] = do_password($data['user_password']); 
	$data['user_birth'] = do_date($data['user_birth']); 
*/

	//Objeto do tipo Manager
	$manager = new Manager;
	//Inserindo no BD
	$manager->update_common("courses", $data, array("id_course" => $data['id_course']));


	//Redirecionando
	header("location: $project_index/".$user->profile_page."?option=list_courses&success=update_success");

	//var_dump($data);
	# Enviando os dados pro banco de dados
	//insert("users",$user,NULL);


?>