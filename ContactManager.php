<?php 

require_once('DBConnect.php');

class ContactManager {

    /**
     * Renvoie la liste des contacts
     */
    public function findAll() : array 
    {
        $pdo = DBConnect::getPDO();
        $results = $pdo->query("SELECT * from contact"); 
        $contacts = $results->fetchAll();

        return $contacts;
    }
}