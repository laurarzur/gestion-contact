<?php 

require_once('Command.php');

$command = new Command();

while (true) {
    $line = readline("Entrez votre commande : ");
    echo "Vous avez saisi : $line\n";
    if ($line === "list") {
        $command->list();
    }
}