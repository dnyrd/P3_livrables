<?php

require_once "dbconnect.php";
require_once "contact.php";
require_once "contactmanager.php";
require_once "command.php";

/* ==========================
   APPLICATION CLI
   ========================== */

echo "=== Application CLI Contacts ===\n";
echo "Commandes disponibles :\n";
echo " aide\n";
echo " list\n";
echo " detail {id}\n";
echo " create {name}, {email}, {phone number} \n";
echo " delete {id}\n";
echo " quitter\n\n";

$command = new Command();

while (true) {
    $input = trim(readline('> '));

    if ($input === 'quitter') {
        echo "👋 Au revoir\n";
        exit;
    }

    if ($input === 'aide') {
        echo "\nCommandes disponibles :\n";
        echo " aide                                    → afficher l'aide\n";
        echo " list                                    → afficher tous les contacts\n";
        echo " detail {id}                             → afficher un contact\n";
        echo " create {name}, {email}, {phone number}  → créer un contact\n";
        echo " delete {id}                             → supprimer un contact\n";
        echo " quitter                                 → quitter l’application\n\n";
        continue;
    }

    if ($input === 'list') {
        $command->list();
        continue;
    }

    if (preg_match('/^detail\s+(\d+)$/', $input, $matches)) {
        $command->detail((int)$matches[1]);
        continue;
    }

    if (preg_match('/^create (.*), (.*), (.*)$/', $input, $matches)) {
        $command->create((string)$matches[1],(string)$matches[2], (string)$matches[3]);
        continue;
    }

    if (preg_match('/^delete\s+(\d+)$/', $input, $matches)) {
        $command->delete((int)$matches[1]);
        continue;
    }

    echo "❌ Commande inconnue. Tapez 'aide' pour voir les commandes.\n";
}
