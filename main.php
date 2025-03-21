<?php 

require_once('Command.php');

$command = new Command();

while (true) {
    $line = readline("Entrez votre commande (help, list, detail, create, modify, delete, quit) : ");
    echo "Vous avez saisi : $line\n";

    if ($line === "list") {
        $command->list();
    }

    if (preg_match("/^detail (.*)$/", $line, $matches)) {
        $command->detail((int)$matches[1]);
    }

    if (preg_match("/^create (.*), (.*), (.*)$/", $line, $matches)) {
        $command->create($matches[1], $matches[2], $matches[3]); 
    } 

    if (preg_match("/^delete (.*)$/", $line, $matches)) {
        $command->delete((int)$matches[1]); 
    } 

    if (preg_match("/^modify (.*), (.*), (.*), (.*)$/", $line, $matches)) {
        $command->modify($matches[1], $matches[2], $matches[3], $matches[4]); 
    } 

    if ($line == "help") {
        $command->help();
    }

    if ($line == "quit") { 
        echo "Fermeture du programme \n";
        break;
    }
}