<?php 

require_once('ContactManager.php');

class Command {

    private $manager; 

    public function __construct() 
    {
        $this->manager = new ContactManager();
    }

    public function list() : void 
    {
        echo "Liste des contacts : \n";
        echo "id, nom, email, telephone\n";
        $contacts = $this->manager->findAll();
        foreach($contacts as $contact) {
            echo $contact->toString();
        }
    }
}