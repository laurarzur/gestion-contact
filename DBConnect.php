<?php 

class DBConnect {

    private static $instance = null;

    /**
     * Renvoie une connexion à la base de donnée
     */
    public static function getPDO(): PDO 
    {
        if (self::$instance === null) {
            self::$instance = new PDO('mysql:host=localhost;dbname=cli;charset=utf8', 'root', '', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]); 
        }
        
        return self::$instance;
    }
}