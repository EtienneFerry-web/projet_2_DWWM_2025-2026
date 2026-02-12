<?php

    /**
    * @author All
    * 16/01/2026
    * Version 0.1
    */

    class Connect {

		protected $_db;

		public function __construct(){
			try{

				$this->_db	= new PDO(
					"mysql:host=".$_ENV['DB_HOST'].";port=".$_ENV['DB_PORT'].";dbname=".$_ENV['DB_DATABASE'],
					$_ENV['DB_USERNAME'],
					$_ENV['DB_PASSWORD'],
					array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
				);

				$this->_db->exec("SET CHARACTER SET utf8");

				$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException$e) {
				echo "Échec : " . $e->getMessage();
			}
		}
	}
