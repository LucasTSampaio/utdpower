<?php
	
	//Validação de mensagens na tela
	function validate_message(){
		//caso haja mensagem a ser mostrada, mostre-as.
		if(isset($_GET['error'])){
			@$alert_msg = $GLOBALS['dictionary'][$_GET['error']];
			$alert_icon = "fa fa-exclamation-triangle";
			$alert_class = "error";
		}elseif(isset($_GET['success'])){
			@$alert_msg = $GLOBALS['dictionary'][$_GET['success']];
			$alert_icon = "fa fa-check-square";
			$alert_class = "success";
		}else{
			return false;
		}

		//renderizando alert
		include_once $GLOBALS['project_path'].'/views/alert.html';
		
	}

	function validate_options(){
		if (!isset($_GET['option'])) {
			return false;
		}

		//Globalizando o objeto user
		global $user;

		//Incluindo as classes necessárias
		include_once $GLOBALS['project_path']."/models/class/Connect.class.php";
		include_once $GLOBALS['project_path']."/models/class/Manager.class.php";

		switch ($_GET['option']) {
			case 'admin_painel':
				
				include_once $GLOBALS['project_path']."/views/admin_painel.html";

				break;

			case 'list_users':
				//instanciar o objeto do tipo Manager
				$manager = new Manager;

				//Tables
				$tb['users'] = array();
				$tb['profiles'] = array();	
					
				//Relacionamento
				$rel['users.profile_id'] = "profiles.id_profile";

				//Realizando a busca
				$table_content = $manager->select_special($tb, $rel, NULL);

				//Titulos da Tabela
				$table_titles['user_photo'] = "Foto";
				$table_titles['user_name'] = "Nome";
				$table_titles['user_email'] = "Email";
				$table_titles['user_phone'] = "Telefone";
				$table_titles['user_cellphone'] = "Celular";
				$table_titles['profile_name'] = "Perfil";
				$table_titles['user_address'] = "Endereço";

				//Caminho das ações
				$delete_destiny = "controllers/delete_user.php";
				$update_destiny = "?option=update_user";

				//Liberação das ações
				$delete = true;
				$update = true;

				//filtro das ações
				$filter = "id_user";

				//Incluindo a tabela
				include_once $GLOBALS['project_path']."/views/list_common.html";

				break;
			case 'add_user':
				
				//Trazendo os perfis
				$manager = new Manager;

				$profiles = $manager->select_common("profiles", null, null);

				include_once $GLOBALS['project_path']."/views/forms/add_user.html";

				break;

			case 'update_user':

				$manager = new Manager;
				$filter['id_user'] = base64_decode($_GET['filter']);

				$tb['users'] = array();
				$tb['profiles'] = array();
				$rel['users.profile_id'] = "profiles.id_profile"; 

				//Realizando a busca do usuário selecionando
				$user_p = $manager->select_special($tb, $rel, $filter, "LIMIT 1");
				
				//Eliminando uma camada do array	
				$user_p = $user_p[0];

				//Chamando os perfis
				$profiles = $manager->select_common("profiles",null, null);

				//Incluindo os arquivos necessários
				include_once $GLOBALS['project_path']."/views/forms/update_user.html";

				break;

			case 'add_course':
			
				//Trazendo os perfis
				$manager = new Manager;

				//$teachers = $manager->select_common("teachers", null, null);

				include_once $GLOBALS['project_path']."/views/forms/add_course.html";

				break;		

			case 'list_courses':
				//instanciar o objeto do tipo Manager
				$manager = new Manager;

				//Realizando a busca
				$table_content = $manager->select_common("courses", NULL, NULL);

				//Titulos da Tabela
				$table_titles['course_name'] = "Nome";
				$table_titles['course_date_in'] = "Início";
				$table_titles['course_date_end'] = "Término";
				$table_titles['course_workload'] = "Carga horária";
				$table_titles['course_schedule'] = "Cronograma";

				//Caminho das ações
				$delete_destiny = "controllers/delete_course.php";
				$update_destiny = "?option=update_course";

				//Liberação das ações
				$delete = true;
				$update = true;

				//filtro das ações
				$filter = "id_course";

				//Incluindo a tabela
				include_once $GLOBALS['project_path']."/views/list_common.html";

				break;

			case 'update_course':
				$manager = new Manager;
				$filter['id_course'] = base64_decode($_GET['filter']);
				

				/*$tb['users'] = array();
				$tb['profiles'] = array();
				$rel['users.profile_id'] = "profiles.id_profile"; 
*/
				//Realizando a busca do usuário selecionando
				$course = $manager->select_common("courses", NULL, $filter);
				
				//Eliminando uma camada do array	
				$course = $course[0];
				

				//Incluindo os arquivos necessários
				include_once $GLOBALS['project_path']."/views/forms/update_course.html";

				break;

			default:
				# code...
				break;
		}
	}
	

?>