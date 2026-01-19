<?php
	class Entity {

		protected int $_id;
		protected string $_prefixe = '';

		/**
		* Hydrate Object by using setters
		*/
		public function hydrate(array $arrData){
			foreach($arrData as $key=>$value){
				//Method 
				$strMethodName = "set".ucfirst(str_replace($this->_prefixe, '', $key));
				if (method_exists($this, $strMethodName)){
					$this->$strMethodName($value); 
				}
			}

		}

		/**
		* ID recover
		* @return int Object Id
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