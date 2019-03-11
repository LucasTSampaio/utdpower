<?php  


	/**
	*  Este arquivo é responsável pelas configurações iniciais do sistema.
	*
	* @author: Anthony Jefferson
	* @date: February, 06, 2019
	* @package: SoftwareUtd
	* @version: 1.0
	* @see: secitece.ce.gov.br
	*
	**/ 

	ini_set("display_errors", 1);
	error_reporting(E_ALL | E_PARSE | E_WARNING);

	/**
	* @var $project_name 
	* Responsável pelo nome do diretório do projeto
	**/
	$project_name = "/project/";

	# Variável de ROTA da URL do projeto
	$project_index = "http://".$_SERVER['SERVER_NAME'].$project_name;

	# Variável de ROTA do CAMINHO do projeto
	$project_path = $_SERVER['DOCUMENT_ROOT'].$project_name;

	# GLOBALIZANDO AS ROTAS
	$GLOBALS['project_index'] = $project_index;
	$GLOBALS['project_path'] = $project_path;

	

?>