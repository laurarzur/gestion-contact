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

    /**
     * Enregistre un contact dans la base de données et le renvoie
     */
    public function create(string $name, string $email, string $phoneNumber) : Contact
    {
        $query = $this->pdo->prepare("INSERT INTO contact (name, email, phone_number) VALUES (:name, :email, :phoneNumber);"); 
        $query->bindParam(":name", $name, PDO::PARAM_STR); 
        $query->bindParam(":email", $email, PDO::PARAM_STR); 
        $query->bindParam(":phoneNumber", $phoneNumber, PDO::PARAM_STR); 
        $query->execute(); 

        $id = $this->pdo->lastInsertId();

        $contact = $this->findById($id);
        return $contact;
    } 

    /**
     * Supprime un contact de la base de données à partir de son id
     */
    public function delete(int $id) : void
    {
        $query = $this->pdo->prepare("DELETE FROM contact WHERE id = :id;"); 
        $query->bindParam(":id", $id, PDO::PARAM_INT); 
        $query->execute();
    } 

    /**
     * Modifie un contact dans la base de données
     */
    public function modify(int $id, string $name, string $email, string $phoneNumber) : Contact 
    {
        $query = $this->pdo->prepare("UPDATE contact SET name = :name, email = :email, phone_number = :phoneNumber WHERE id = :id;"); 
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->bindParam(":name", $name, PDO::PARAM_STR); 
        $query->bindParam(":email", $email, PDO::PARAM_STR); 
        $query->bindParam(":phoneNumber", $phoneNumber, PDO::PARAM_STR); 
        $query->execute(); 

        $contact = $this->findById($id);
        return $contact;
    }
}