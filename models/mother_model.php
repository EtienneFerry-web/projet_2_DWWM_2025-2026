<?php
class Connect {
    protected $_db;

    public function __construct(){
        try {
            // Configuration spécifique à MAMP Mac :
            // Host: localhost, Port: 8889, User: root, Pass: root
            $this->_db = new PDO(
                "mysql:host=localhost;dbname=GiveMeFive;port=8889", 
                "root", 
                "root", 
                array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
            );

            // Résolution de l'erreur SQLSTATE[42000] (ONLY_FULL_GROUP_BY)
            $this->_db->exec("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
            
            $this->_db->exec("SET CHARACTER SET utf8");
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            // On utilise die() pour arrêter le script proprement en cas d'erreur
            die("Échec de connexion à la base de données : " . $e->getMessage());
        }
    }
}