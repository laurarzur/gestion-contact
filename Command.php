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

    public function create(string $name, string $email, string $phoneNumber) : void
    {
        $contact = $this->manager->create($name, $email, $phoneNumber); 
        echo "Nouveau contact : " . $contact->toString();
    } 

    public function modify(int $id, string $name, string $email, string $phoneNumber) : void
    {
        $contact = $this->manager->modify($id, $name, $email, $phoneNumber); 
        echo "Contact modifié : " . $contact->toString();
    } 

    public function delete(int $id) : void
    {
        $this->manager->delete($id); 
        echo "Contact " . $id . " supprimé \n";
    }

    public function help(): void {
        echo "help : affiche cette aide\n";
        echo "list : liste les contacts\n";
        echo "create [nom], [email], [telephone] : crée un contact\n";
        echo "modify [id], [nom], [email], [telephone] : modifie un contact\n";
        echo "delete [id] : supprime un contact\n";
        echo "quit : quitte le programme\n";
        echo "\n";
        echo "Attention à la syntaxe des commandes, les espaces, virgules et majuscules sont importantes.\n";
    }
}