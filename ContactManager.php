<?php 

require_once('DBConnect.php');
require_once('Contact.php');

class ContactManager {

    /**
     * Renvoie la liste des contacts
     */
    public function findAll() : array 
    {
        $pdo = DBConnect::getPDO();
        $results = $pdo->query("SELECT * from contact"); 
        $contacts = [];

        while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
            $contacts[] = Contact::fromDatabaseRow($row);
        }
        
        return $contacts;
    }
}