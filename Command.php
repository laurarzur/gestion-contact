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

    public function detail(int $id) : void
    {
        $contact = $this->manager->findById($id);

        if (!$contact) {
            echo "Ce contact n'existe pas \n";
            return;
        }
        echo $contact->toString();
    }
}