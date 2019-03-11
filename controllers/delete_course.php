<?php

	include_once '_helpers.php';
	do_includes();
	do_session();

	//Receber os dados do formulário
	$data = $_POST;

	//Recebendo o filtro
	$filter['id_course'] = $_POST['filter'];

	$manager = new Manager;

	//Inserindo no BD
	$manager->delete_common("courses", $filter, NULL);

	//Redirecionando
	header("location: $project_index/".$user->profile_page."?option=list_courses&success=delete_success");


?>