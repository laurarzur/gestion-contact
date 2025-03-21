<?php 

require_once('DBConnect.php');
require_once('Contact.php');

class ContactManager {

    private $pdo; 

    public function __construct()
    {
        $this->pdo = DBConnect::getPDO();
    }
    
    /**
     * Renvoie la liste des contacts
     */
    public function findAll() : array 
    {
        $query = $this->pdo->query("SELECT * from contact;"); 
        $contacts = [];

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $contacts[] = Contact::fromDatabaseRow($row);
        }
        
        return $contacts;
    }

    /**
     * Renvoie un contact à partir de son id
     */
    public function findById(int $id) : ?Contact
    {
        $query = $this->pdo->prepare("SELECT * FROM contact WHERE id = :id;");
        $query->bindParam(":id", $id, PDO::PARAM_INT); 
        $query->execute(); 
        $contact = $query->fetch();

        if (!$contact) {
            return null;
        }

        $contact = Contact::fromDatabaseRow($contact);
        return $contact;
    }
}