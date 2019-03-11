<?php  


	class Course{

		# Atributos da classe
		private $data = array();

		# Método Mágico Set, recebendo os valores 
		public function __set($key, $value){
			$this->data[$key] = $value;
 		}

 		# Método Mágico Get, mostrando os valores
		public function __get($key){
			return $this->data[$key];
		}

	}


?>