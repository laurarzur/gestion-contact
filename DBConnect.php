<?php 

class DBConnect {

    /**
     * Renvoie une connexion à la base de donnée
     */
    public static function getPDO(): PDO 
    {
        $pdo = new PDO('mysql:host=localhost;dbname=cli;charset=utf8', 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]); 
        
        return $pdo;
    }
}