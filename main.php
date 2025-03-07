<?php 

require_once('ContactManager.php');

$manager = new ContactManager();

while (true) {
    $line = readline("Entrez votre commande : ");
    echo "Vous avez saisi : $line\n";
    if ($line === "list") {
        echo "Liste des contacts : \n";
        echo "id, nom, email, telephone\n";
        $contacts = $manager->findAll();
        foreach($contacts as $contact) {
            echo $contact->toString();
        }
    }
}