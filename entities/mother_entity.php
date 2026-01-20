<?php
	class Entity {

		protected int $_id;
		protected string $_prefixe = '';

		/**
		* Hydratation de l'objet en utilisant les setters
		*/
		public function hydrate(array $arrData){
			foreach($arrData as $key=>$value){
				// nom de la méthode
				$strMethodName = "set".ucfirst(str_replace($this->_prefixe, '', $key));
				if (method_exists($this, $strMethodName)){
					$this->$strMethodName($value);
				}
			}
		}

		/**
		* Récupération de l'identifiant
		* @return int l'identifiant de l'objet
		*/
		public function getId():int{
			return $this->_id;
		}
		/**
		*ID update
		* @param int new ID
		*/
		public function setId(int $intId){
			$this->_id = $intId;
		}
		
		// Method
		protected function clean(string $strText){
			$strText	= trim($strText);
			$strText	= str_replace("<script>", "", $strText);
			$strText	= str_replace("</script>", "", $strText);
			return $strText;
		}
				
		
		
		
	}
