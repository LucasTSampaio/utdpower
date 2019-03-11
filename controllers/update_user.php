<?php  

	include_once '_helpers.php';
	do_includes();	
	do_session();

	# receber os dados do formulario
	$data = $_POST;

	# Formatando os campos necessários
	if($data['user_password'] != ""){
		$data['user_password'] = do_password($data['user_password']);		
	}else{
		unset($data['user_password']);
	}

	$data['user_birth'] = do_date($data['user_birth']);

	# Testando se existe uma imagem pro usuário
	if($_FILES['user_photo']['name'] == ""){
		unset($data['user_photo']);
	}else{
		$data['user_photo'] = date('YmdHis').'_'.$_FILES['user_photo']['name'];
	}

	# Criar o objeto do tipo manager
	$manager = new Manager;
	$manager->update_common("users",$data,array("id_user"=>$data['id_user']));

	# Fazendo o uplad da imagem
	do_upload($GLOBALS['project_path']."/views/profile_images/",$_FILES['user_photo']['tmp_name'],$_FILES['user_photo']['name']);

	########################################################################
	if($data['id_user'] == $user->id_user){	

		# Atualizando os dados na sessão
		session_destroy();

		$tb['users'] = [];
		$tb['profiles'] = [];
		$rel['users.profile_id'] = "profiles.id_profile";

		$log = $manager->select_special($tb,$rel,array("id_user"=>$data['id_user']));

		# Removendo a senha da sessão
		unset($log[0]['user_password']);

		# Criando o objeto do tipo User
		$user = new User($log[0]['user_name'],$log[0]['user_email']);

		# Setando o restante dos atributos graças ao metódo mágico __set
		foreach ($log[0] as $key => $value){
			$user->$key = $value;
		}

		# Criando a sessão
		session_start();

		$_SESSION[md5("user_data")] = $user;
	}
	
	####################################################################### 
	# Redirecionamento
	header("location: $project_index/".$user->profile_page."?option=list_users&success=update_success");

?>