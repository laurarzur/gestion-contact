<?php 

class DBConnect {

    public static function getPDO(): PDO 
    {
        $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]); 
        
        return $pdo;
    }
}